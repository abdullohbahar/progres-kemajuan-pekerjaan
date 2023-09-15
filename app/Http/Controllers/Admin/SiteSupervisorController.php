<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSupervisor;
use Illuminate\Http\Request;
use DataTables;

class SiteSupervisorController extends Controller
{
    private $active = 'site-supervisor';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = SiteSupervisor::orderBy('name', 'asc')->get();

            // return $query;
            return Datatables::of($query)
                ->make();
        }

        $data = [
            'active' => $this->active
        ];

        return view('admin.site-supervisor.index', $data);
    }

    public function store(Request $request, SiteSupervisor $siteSupervisor)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'nip' => 'required',
            'position' => 'required',
        ], [
            'name.required' => 'nama konsultan harus diisi',
            'phone_number.required' => 'Nomor hp harus diisi',
            'nip.required' => 'NIP harus diisi',
            'position.required' => 'Jabatan harus diisi',
        ]);

        $siteSupervisor->create($validateData);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Pengawas Lapangan');
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
        $validateData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'nip' => 'required',
            'position' => 'required',
        ], [
            'name.required' => 'nama konsultan harus diisi',
            'phone_number.required' => 'Nomor hp harus diisi',
            'nip.required' => 'NIP harus diisi',
            'position.required' => 'Jabatan harus diisi',
        ]);

        $siteSupervisor->update($validateData);

        return to_route('site-supervisor.index')->with('success', 'Berhasi Mengubah Data Pengawas Lapangan');
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
                'message' => 'Gagal Menghapus Data Pengawas Lapangan'
            ]);
        }
    }
}
