<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use DataTables;

class UnitController extends Controller
{
    private $active = 'unit';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = Unit::orderBy('unit', 'asc')->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('admin.unit.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Unit $unit)
    {
        $validateData =  $request->validate([
            'unit' => 'required|unique:units'
        ], [
            'unit.required' => 'Unit harus diisi',
            'unit.unique' => 'Unit telah dipakai',
        ]);

        $unit->create($validateData);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $delete = $unit->delete();

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Data Unit'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Data Unit'
            ]);
        }
    }
}
