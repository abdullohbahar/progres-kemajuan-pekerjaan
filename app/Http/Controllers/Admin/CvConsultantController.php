<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CvConsultant;
use Illuminate\Http\Request;
use DataTables;

class CvConsultantController extends Controller
{
    private $active = 'cv-consultant';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $query = CvConsultant::orderBy('name', 'asc')->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('admin.cv-consultant.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'active' => $this->active,
        ];

        return view('admin.cv-consultant.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CvConsultant $cvConsultant)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:cv_consultants',
            'phone_number' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Nama Perusahaan Harus Diisi',
            'name.unique' => 'Nama Perusahaan Sudah dipakai',
            'phone_number.required' => 'Nomor HP Harus Diisi',
            'address.required' => 'Alamat Perusahaan Harus Diisi',
        ]);

        $cvConsultant->create($validateData);

        return redirect()->back()->with('success', 'Berhasil menambah data CV Konsultan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CvConsultant $cvConsultant)
    {
        $data = [
            'active' => $this->active,
            'data' => $cvConsultant,
        ];

        return view('admin.cv-consultant.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CvConsultant $cvConsultant)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'Nama Perusahaan Harus Diisi',
            'phone_number.required' => 'Nomor HP Harus Diisi',
            'address.required' => 'Alamat Perusahaan Harus Diisi',
        ]);

        if ($cvConsultant->name != $request->name) {
            $request->validate([
                'name' => 'unique:cv_consultants'
            ], [
                'name.unique' => 'Nama Perusahaan sudah dipakai'
            ]);
        }

        $cvConsultant->update($validateData);

        return to_route('cv-consultant.index')->with('success', 'Berhasi mengubah data CV Konsultan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CvConsultant $cvConsultant)
    {
        $delete = $cvConsultant->delete();

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil menghapus data CV Konsultan'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal menghapus data CV Konsultan'
            ]);
        }
    }
}
