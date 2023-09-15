<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActingCommitmentMarker;
use Illuminate\Http\Request;
use DataTables;

// PPK
class ActingCommitmentMarkerController extends Controller
{
    private $active = 'ppk';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = ActingCommitmentMarker::orderBy('name', 'asc')->get();

            // return $query;
            return Datatables::of($query)
                ->make();
        }

        $data = [
            'active' => $this->active
        ];

        return view('admin.acting-commitment-marker.index', $data);
    }

    public function store(Request $request, ActingCommitmentMarker $actingCommitmentMarker)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'nip' => 'required',
            'position' => 'required',
        ], [
            'name.required' => 'nama harus diisi',
            'phone_number.required' => 'Nomor hp harus diisi',
            'nip.required' => 'NIP harus diisi',
            'position.required' => 'Jabatan harus diisi',
        ]);

        $actingCommitmentMarker->create($validateData);

        return redirect()->back()->with('success', 'Berhasil Menambah Data PPK');
    }

    public function edit(ActingCommitmentMarker $actingCommitmentMarker)
    {
        $data = [
            'active' => $this->active,
            'data' => $actingCommitmentMarker,
        ];

        return view('admin.acting-commitment-marker.edit', $data);
    }

    public function update(Request $request, ActingCommitmentMarker $actingCommitmentMarker)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'nip' => 'required',
            'position' => 'required',
        ], [
            'name.required' => 'nama harus diisi',
            'phone_number.required' => 'Nomor hp harus diisi',
            'nip.required' => 'NIP harus diisi',
            'position.required' => 'Jabatan harus diisi',
        ]);

        $actingCommitmentMarker->update($validateData);

        return to_route('acting-commitment-marker.index')->with('success', 'Berhasi Mengubah Data PPK');
    }

    public function destroy(ActingCommitmentMarker $actingCommitmentMarker)
    {
        $delete = $actingCommitmentMarker->delete();

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Data PPK',
                'data' => $delete,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Data PPK',
                'data' => $delete,

            ]);
        }
    }
}
