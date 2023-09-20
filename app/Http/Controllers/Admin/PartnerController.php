<?php

namespace App\Http\Controllers\Admin;

use Exception;
use DataTables;
use App\Models\User;
use App\Models\Partner;
use App\Models\CvConsultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
    private $active = 'partner';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = Partner::with(['cvConsultant', 'user'])->orderBy('name', 'asc')->get();

            // return $query;
            return Datatables::of($query)
                ->addColumn('cv', function ($item) {
                    return $item->cvConsultant?->name;
                })
                ->addColumn('username', function ($item) {
                    return $item->user?->username;
                })
                ->rawColumns(['cv', 'username'])
                ->make();
        }

        $cvConsultants = CvConsultant::get();

        $data = [
            'active' => $this->active,
            'cvConsultants' => $cvConsultants
        ];

        return view('admin.partner.index', $data);
    }

    public function store(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'cv_consultant_id' => 'required',
            'position' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
        ], [
            'name.required' => 'nama konsultan pengawas harus diisi',
            'phone_number.required' => 'Nomor hp pengawas harus diisi',
            'cv_consultant_id.required' => 'Perusahaan pengawas harus diisi',
            'position.required' => 'Jabatan pengawas harus diisi',
            'username.required' => 'username harus diisi',
            'username.unique' => 'username sudah dipakai',
            'password.required' => 'password harus diisi',
        ]);

        try {
            DB::beginTransaction();

            $userData = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => 'Partner'
            ];

            $user = User::create($userData);

            $partnerData = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'cv_consultant_id' => $request->cv_consultant_id,
                'position' => $request->position,
                'user_id' => $user->id,
            ];

            $partner->create($partnerData);

            DB::commit();

            return redirect()->back()->with('success', 'Berhasil Menambah Data Rekanan');
        } catch (Exception $e) {
            Log::critical($e);

            DB::rollBack();

            return redirect()->back()->with('failed', 'Gagal Menambah Data Rekanan');
        }
    }

    public function edit(Partner $partner)
    {
        $cvConsultants = CvConsultant::get();

        $data = [
            'active' => $this->active,
            'data' => $partner,
            'cvConsultants' => $cvConsultants
        ];

        return view('admin.partner.edit', $data);
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'cv_consultant_id' => 'required',
            'position' => 'required',
            'username' => 'required',
        ], [
            'name.required' => 'nama konsultan pengawas harus diisi',
            'phone_number.required' => 'Nomor hp pengawas harus diisi',
            'cv_consultant_id.required' => 'Perusahaan pengawas harus diisi',
            'position.required' => 'Jabatan pengawas harus diisi',
            'username.required' => 'username harus diisi',
        ]);

        // lakukan pengecekan apakah username sama dengan yang lama atau tidak
        // jika tidak sama maka lakukan validasi unique
        if ($request->username != $partner->user->username) {
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

            User::where('id', $partner->user->id)->update($userData);

            $partnerData = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'cv_consultant_id' => $request->cv_consultant_id,
                'position' => $request->position,
            ];

            $partner->update($partnerData);

            DB::commit();

            return to_route('partner.index')->with('success', 'Berhasil Mengubah Data Rekanan');
        } catch (Exception $e) {
            Log::critical($e);

            DB::rollBack();

            return to_route('partner.index')->with('failed', 'Gagal Mengubah Data Rekanan');
        }
    }

    public function destroy(Partner $partner)
    {
        $delete = $partner->delete();

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Data Rekanan (Penyedia Jasa)'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Data Rekanan (Penyedia Jasa)'
            ]);
        }
    }
}
