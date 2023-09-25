<?php

namespace App\Http\Controllers\Admin;

use Exception;
use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\ActingCommitmentMarker;

// PPK
class ActingCommitmentMarkerController extends Controller
{
    private $active = 'ppk';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = ActingCommitmentMarker::with('user')->orderBy('name', 'asc')->get();

            // return $query;
            return Datatables::of($query)
                ->addColumn('username', function ($item) {
                    return $item->user?->username;
                })
                ->rawColumns(['username'])
                ->make();
        }

        $data = [
            'active' => $this->active
        ];

        return view('admin.acting-commitment-marker.index', $data);
    }

    public function store(Request $request, ActingCommitmentMarker $actingCommitmentMarker)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'nip' => 'required',
            'position' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ], [
            'name.required' => 'nama konsultan harus diisi',
            'phone_number.required' => 'Nomor hp harus diisi',
            'nip.required' => 'NIP harus diisi',
            'position.required' => 'Jabatan harus diisi',
            'username.required' => 'username harus diisi',
            'username.unique' => 'username sudah dipakai',
            'password.required' => 'password harus diisi',
        ]);

        try {
            DB::beginTransaction();

            $userData = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'Acting Commitment Marker'
            ];

            $user = User::create($userData);

            $actingCommitmentMarkerData = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'nip' => $request->nip,
                'position' => $request->position,
                'user_id' => $user->id,
            ];

            $actingCommitmentMarker->create($actingCommitmentMarkerData);

            DB::commit();

            return redirect()->back()->with('success', 'Berhasil Menambah Data PPK');
        } catch (Exception $e) {
            Log::critical($e);

            DB::rollBack();

            return redirect()->back()->with('failed', 'Gagal Menambah Data PPK');
        }
    }

    public function edit(ActingCommitmentMarker $actingCommitmentMarker)
    {
        $data = [
            'active' => $this->active,
            'data' => $actingCommitmentMarker,
        ];

        return view('admin.acting-commitment-marker.edit', $data);
    }

    public function update(Request $request, ActingCommitmentMarker $actingCommitmentMarker)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'nip' => 'required',
            'position' => 'required',
            'username' => 'required',
        ], [
            'name.required' => 'nama konsultan harus diisi',
            'phone_number.required' => 'Nomor hp harus diisi',
            'nip.required' => 'NIP harus diisi',
            'position.required' => 'Jabatan harus diisi',
            'username.required' => 'username harus diisi',
        ]);

        // lakukan pengecekan apakah username sama dengan yang lama atau tidak
        // jika tidak sama maka lakukan validasi unique
        if ($request->username != $actingCommitmentMarker->user->username) {
            $request->validate([
                'username' => 'unique:users',
            ], [
                'username.unique' => 'username sudah dipakai',
            ]);
        }

        try {
            DB::beginTransaction();

            $userData = [
                'username' => $request->username,
            ];

            // lakukan pengecekan apakah password kosong atau tidak jika tidak kosong maka lakukan hash / update
            if ($request->password) {
                $userData['password'] = Hash::make($request->password);
            }

            User::where('id', $actingCommitmentMarker->user->id)->update($userData);

            $actingCommitmentMarkerData = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'nip' => $request->nip,
                'position' => $request->position,
            ];

            $actingCommitmentMarker->update($actingCommitmentMarkerData);

            DB::commit();

            return to_route('acting-commitment-marker.index')->with('success', 'Berhasil Mengubah Data Pengawas Lapangan');
        } catch (Exception $e) {
            Log::critical($e);

            DB::rollBack();

            return to_route('acting-commitment-marker.index')->with('failed', 'Gagal Mengubah Data Pengawas Lapangan');
        }
    }

    public function destroy(ActingCommitmentMarker $actingCommitmentMarker)
    {
        $delete = $actingCommitmentMarker->delete();

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Data PPK',
                'data' => $delete,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Data PPK',
                'data' => $delete,

            ]);
        }
    }
}
