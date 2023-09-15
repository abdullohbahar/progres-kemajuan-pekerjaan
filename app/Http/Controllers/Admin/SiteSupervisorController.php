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
}
