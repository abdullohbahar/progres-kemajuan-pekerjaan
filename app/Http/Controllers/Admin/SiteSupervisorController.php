<?php

namespace App\Http\Controllers\Admin;

use Exception;
use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SiteSupervisor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SiteSupervisorController extends Controller
{
    private $active = 'site-supervisor';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = SiteSupervisor::with('user')->orderBy('name', 'asc')->get();

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

        return view('admin.site-supervisor.index', $data);
    }

    public function store(Request $request, SiteSupervisor $siteSupervisor)
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
                'role' => 'Site Supervisor'
            ];

            $user = User::create($userData);

            $siteSupervisorData = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'nip' => $request->nip,
                'position' => $request->position,
                'user_id' => $user->id,
            ];

            $siteSupervisor->create($siteSupervisorData);

            DB::commit();

            return redirect()->back()->with('success', 'Berhasil Menambah Data Pengawas Lapangan');
        } catch (Exception $e) {
            Log::critical($e);

            DB::rollBack();

            return redirect()->back()->with('failed', 'Gagal Menambah Data Pengawas Lapangan');
        }

        // $siteSupervisor->create($validateData);

        // return redirect()->back()->with('success', 'Berhasil Menambah Data Pengawas Lapangan');
    }

    public function edit(SiteSupervisor $siteSupervisor)
    {
        $data = [
            'active' => $this->active,
            'data' => $siteSupervisor,
        ];

        return view('admin.site-supervisor.edit', $data);
    }

    public function update(Request $request, SiteSupervisor $siteSupervisor)
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
        if ($request->username != $siteSupervisor->user->username) {
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

            User::where('id', $siteSupervisor->user->id)->update($userData);

            $siteSupervisorData = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'nip' => $request->nip,
                'position' => $request->position,
            ];

            $siteSupervisor->update($siteSupervisorData);

            DB::commit();

            return to_route('site-supervisor.index')->with('success', 'Berhasil Mengubah Data Pengawas Lapangan');
        } catch (Exception $e) {
            Log::critical($e);

            DB::rollBack();

            return to_route('site-supervisor.index')->with('failed', 'Gagal Mengubah Data Pengawas Lapangan');
        }
    }

    public function destroy(SiteSupervisor $siteSupervisor)
    {
        $delete = $siteSupervisor->delete();

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Data Pengawas Lapangan'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Data Pengawas Lapangan',
            ]);
        }
    }
}
