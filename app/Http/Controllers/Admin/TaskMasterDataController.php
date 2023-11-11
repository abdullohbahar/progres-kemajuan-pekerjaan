<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DivisionMasterData;
use App\Models\TaskMasterData;
use App\Models\Unit;
use Illuminate\Http\Request;
use DataTables;


class TaskMasterDataController extends Controller
{
    private $active = 'task';


    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = TaskMasterData::with('division')->orderBy('name', 'asc')->get();


            return Datatables::of($query)
                ->addColumn('division', function ($item) {
                    return $item->division?->name;
                })
                ->rawColumns(['division', 'username'])
                ->make();
        }

        $units = Unit::all();
        $divisions = DivisionMasterData::orderByRaw("CAST(SUBSTRING(name, LOCATE('DIVISI', name) + 6) AS UNSIGNED)")->get();

        $data = [
            'active' => $this->active,
            'units' => $units,
            'divisions' => $divisions
        ];

        return view('admin.task.index', $data);
    }

    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'name' => 'required|unique:task_master_data',
            'unit' => 'required',
            'division_master_data_id' => 'required',
        ], [
            'name.required' => 'Nama Pekerjaan harus diisi',
            'division_master_data_id.required' => 'Divisi harus diisi',
            'name.unique' => 'Nama Pekerjaan telah dipakai',
        ]);

        TaskMasterData::create($validateData);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Pekerjaan');
    }

    public function destroy($id)
    {
        $delete = TaskMasterData::destroy($id);

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Data Pekerjaan'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Data Pekerjaan'
            ]);
        }
    }
}
