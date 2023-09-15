<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Partner;
use App\Models\CvConsultant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    private $active = 'partner';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = Partner::with('cvConsultant')->orderBy('name', 'asc')->get();

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

        return view('admin.partner.index', $data);
    }

    public function store(Request $request, Partner $partner)
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

        $partner->create($validateData);

        return redirect()->back()->with('success', 'Berhasil Menambah Data Rekanan (Penyedia Jasa)');
    }

    public function edit(Partner $partner)
    {
        $cvConsultants = CvConsultant::get();

        $data = [
            'active' => $this->active,
            'data' => $partner,
            'cvConsultants' => $cvConsultants
        ];

        return view('admin.partner.edit', $data);
    }

    public function update(Request $request, Partner $partner)
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

        $partner->update($validateData);

        return to_route('partner.index')->with('success', 'Berhasi Mengubah Data Rekanan (Penyedia Jasa)');
    }

    public function destroy(Partner $partner)
    {
        $delete = $partner->delete();

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Data Rekanan (Penyedia Jasa)'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Data Rekanan (Penyedia Jasa)'
            ]);
        }
    }
}
