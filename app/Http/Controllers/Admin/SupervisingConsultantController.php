<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CvConsultant;
use App\Models\SupervisingConsultant;
use Illuminate\Http\Request;
use DataTables;

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

            $query = SupervisingConsultant::with('cvConsultant')->orderBy('name', 'asc')->get();

            // return $query;
            return Datatables::of($query)
                ->addColumn('cv', function ($item) {
                    return $item->cvConsultant?->name;
                })
                ->rawColumns(['cv'])
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SupervisingConsultant $supervisingConsultant)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'cv_consultant_id' => 'required',
            'position' => 'required',
        ], [
            'name.required' => 'nama konsultan pengawas harus diisi',
            'phone_number.required' => 'Nomor hp pengawas harus diisi',
            'cv_consultant_id.required' => 'Perusahaan pengawas harus diisi',
            'position.required' => 'Jabatan pengawas harus diisi',
        ]);

        $supervisingConsultant->create($validateData);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Pengawas Lapangan');
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
        $validateData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'cv_consultant_id' => 'required',
            'position' => 'required',
        ], [
            'name.required' => 'nama konsultan pengawas harus diisi',
            'phone_number.required' => 'Nomor hp pengawas harus diisi',
            'cv_consultant_id.required' => 'Perusahaan pengawas harus diisi',
            'position.required' => 'Jabatan pengawas harus diisi',
        ]);

        $supervisingConsultant->update($validateData);

        return to_route('supervising-consultant.index')->with('success', 'Berhasi mengubah data Konsultan Pengawas');
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
