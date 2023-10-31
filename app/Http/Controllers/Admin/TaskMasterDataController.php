<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaskMasterData;
use Illuminate\Http\Request;
use DataTables;


class TaskMasterDataController extends Controller
{
    private $active = 'task';


    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = TaskMasterData::orderBy('name', 'asc')->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('admin.task.index', $data);
    }

    public function store(Request $request)
    {
        $validateData =  $request->validate([
            'name' => 'required|unique:task_master_data'
        ], [
            'name.required' => 'Nama Pekerjaan harus diisi',
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
