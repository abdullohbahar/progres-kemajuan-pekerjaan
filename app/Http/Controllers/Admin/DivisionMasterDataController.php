<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DivisionMasterData;
use Illuminate\Http\Request;
use DataTables;

class DivisionMasterDataController extends Controller
{
    private $active = 'division';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = DivisionMasterData::orderBy('name', 'asc')->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('admin.division.index', $data);
    }

    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'name' => 'required|unique:division_master_data'
        ], [
            'name.required' => 'Nama Divisi harus diisi',
            'name.unique' => 'Nama Divisi telah dipakai',
        ]);

        DivisionMasterData::create($validateData);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Divisi');
    }

    public function destroy($id)
    {
        $delete = DivisionMasterData::destroy($id);

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Data Divisi'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Data Divisi'
            ]);
        }
    }
}
