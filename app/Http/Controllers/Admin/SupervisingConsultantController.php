<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CvConsultant;
use App\Models\SupervisingConsultant;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class SupervisingConsultantController extends Controller
{
    private $active = 'supervising-consultant';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = SupervisingConsultant::with(['cvConsultant', 'user'])->orderBy('name', 'asc')->get();

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

        return view('admin.supervising-consultant.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SupervisingConsultant $supervisingConsultant)
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
                'role' => 'Supervising Consultant'
            ];

            $user = User::create($userData);


            $supervisingConsultantData = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'cv_consultant_id' => $request->cv_consultant_id,
                'position' => $request->position,
                'user_id' => $user->id,
            ];


            $supervisingConsultant->create($supervisingConsultantData);

            DB::commit();

            return redirect()->back()->with('success', 'Berhasil Menambah Data Pengawas Lapangan');
        } catch (Exception $e) {
            Log::critical($e);

            DB::rollBack();

            return redirect()->back()->with('failed', 'Gagal Menambah Data Pengawas Lapangan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SupervisingConsultant $supervisingConsultant)
    {
        $cvConsultants = CvConsultant::get();

        $data = [
            'active' => $this->active,
            'data' => $supervisingConsultant,
            'cvConsultants' => $cvConsultants
        ];

        return view('admin.supervising-consultant.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupervisingConsultant $supervisingConsultant)
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
        if ($request->username != $supervisingConsultant->user->username) {
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

            User::where('id', $supervisingConsultant->user->id)->update($userData);

            $supervisingConsultantData = [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'cv_consultant_id' => $request->cv_consultant_id,
                'position' => $request->position,
            ];

            $supervisingConsultant->update($supervisingConsultantData);

            DB::commit();

            return to_route('supervising-consultant.index')->with('success', 'Berhasil mengubah data Konsultan Pengawas');
        } catch (Exception $e) {
            Log::critical($e);

            DB::rollBack();

            return to_route('supervising-consultant.index')->with('failed', 'Gagal mengubah data Konsultan Pengawas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupervisingConsultant $supervisingConsultant)
    {
        $delete = $supervisingConsultant->delete();

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Data Konsultan Pengawas'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Data Konsultan Pengawas'
            ]);
        }
    }
}
