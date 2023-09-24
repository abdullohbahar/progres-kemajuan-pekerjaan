<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActingCommitmentMarker;
use App\Models\Partner;
use App\Models\SiteSupervisor;
use App\Models\SupervisingConsultant;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;

class TaskReportController extends Controller
{
    private $active = 'task-report';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $user = Auth::user();

            if ($user->role == 'Supervising Consultant') {
                $id = SupervisingConsultant::where('user_id', Auth::user()->id)->first()->id;
            } else if ($user->role == 'Partner') {
                $id = Partner::where('user_id', Auth::user()->id)->first()->id;
            } else if ($user->role == 'Admin') {
                $id = '';
            }

            $query = TaskReport::orderBy('created_at', 'desc')
                ->when($user->role == 'Supervising Consultant', function ($query) use ($id) {
                    $query->where('supervising_consultant_id', $id);
                })
                ->when($user->role == 'Partner', function ($query) use ($id) {
                    $query->where('partner_id', $id);
                })
                ->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('admin.task-report.index', $data);
    }

    public function create()
    {
        $data = [
            'active' => $this->active,
            'supervisingConsultants' => SupervisingConsultant::get(),
            'partners' => Partner::get(),
            'siteSupervisors' => SiteSupervisor::get(),
            'actingCommitmentMarkers' => ActingCommitmentMarker::get(),
        ];

        return view('admin.task-report.create', $data);
    }

    public function store(Request $request, TaskReport $taskReport)
    {
        $validateData = $request->validate([
            'activity_name' => 'required',
            'task_name' => 'required',
            'fiscal_year' => 'required',
            'spk_number' => 'required',
            'spk_date' => 'required',
            'execution_time' => 'required',
            'contract_value' => 'required',
            'supervising_consultant_id' => 'required',
            'partner_id' => 'required',
            'site_supervisor_id_1' => 'required',
            'site_supervisor_id_2' => 'required',
            'site_supervisor_id_3' => 'required',
            'acting_commitment_marker_id' => 'required',
        ], [
            'activity_name.required' => 'nama kegiatan harus diisi',
            'task_name.required' => 'nama pekerjaan harus diisi',
            'fiscal_year.required' => 'tahun anggaran harus diisi', // tahun anggaran
            'spk_number.required' => 'nomor SPK harus diisi',
            'spk_date.required' => 'tanggal SPK harus diisi',
            'execution_time.required' => 'Waktu Pelaksanaan harus diisi',
            'contract_value.required' => 'Nilai kontrak harus diisi',
            'supervising_consultant_id.required' => 'konsultan pengawas harus diisi', // id konsultan pengawas
            'partner_id.required' => 'rekanan harus diisi', // id rekanan
            'site_supervisor_id_1.required' => 'pengawas lapangan 1 harus diisi', // id pengawas lapangan 1
            'site_supervisor_id_2.required' => 'pengawas lapangan 2 harus diisi', // id pengawas lapangan 2
            'site_supervisor_id_3.required' => 'pengawas lapangan 3 harus diisi', // id pengawas lapangan 2
            'acting_commitment_marker_id.required' => 'PPK harus diisi', // id ppk
        ]);

        // Mengambil angka saja dari contract value
        // Menampung karakter yang ingin dihapus
        $removeChar = ['R', 'p', '.', ',', ' '];

        // Menghapus karakter sesuai dengan array yang ada di $removeChar
        $validateData['contract_value'] = str_replace($removeChar, "", $request->contract_value);
        $validateData['status'] = 'Aktif';

        $taskReport->create($validateData);

        return to_route('task.report')->with('success', 'Berhasil Menambah Pekerjaan');
    }

    public function show($id)
    {
        $taskReport = TaskReport::where('id', $id)->firstOrfail();
        // Melakukan pengecekan apakah status sudah aktif atau belum

        $dateSpk = strtotime($taskReport->spk_date);
        $dateNow = strtotime(now());

        if ($dateNow < $dateSpk) {
            $status = 'inactive';
        } else {
            $status = 'active';
        }

        $data = [
            'active' => $this->active,
            'taskReport' => $taskReport,
            'status' => $status
        ];

        return view('admin.task-report.show', $data);
    }

    public function edit(TaskReport $taskReport)
    {
        $data = [
            'active' => $this->active,
            'taskReport' => $taskReport,
            'supervisingConsultants' => SupervisingConsultant::get(),
            'partners' => Partner::get(),
            'siteSupervisors' => SiteSupervisor::get(),
            'actingCommitmentMarkers' => ActingCommitmentMarker::get(),
        ];

        return view('admin.task-report.edit', $data);
    }

    public function update(Request $request, TaskReport $taskReport)
    {
        $validateData = $request->validate([
            'activity_name' => 'required',
            'task_name' => 'required',
            'fiscal_year' => 'required',
            'spk_number' => 'required',
            'spk_date' => 'required',
            'execution_time' => 'required',
            'contract_value' => 'required',
            'supervising_consultant_id' => 'required',
            'partner_id' => 'required',
            'site_supervisor_id_1' => 'required',
            'site_supervisor_id_2' => 'required',
            'acting_commitment_marker_id' => 'required',
            'status' => 'required',
        ], [
            'activity_name.required' => 'nama kegiatan harus diisi',
            'task_name.required' => 'nama pekerjaan harus diisi',
            'fiscal_year.required' => 'tahun anggaran harus diisi', // tahun anggaran
            'spk_number.required' => 'nomor SPK harus diisi',
            'spk_date.required' => 'tanggal SPK harus diisi',
            'execution_time.required' => 'Waktu Pelaksanaan harus diisi',
            'contract_value.required' => 'Nilai kontrak harus diisi',
            'supervising_consultant_id.required' => 'konsultan pengawas harus diisi', // id konsultan pengawas
            'partner_id.required' => 'rekanan harus diisi', // id rekanan
            'site_supervisor_id_1.required' => 'pengawas lapangan 1 harus diisi', // id pengawas lapangan 1
            'site_supervisor_id_2.required' => 'pengawas lapangan 2 harus diisi', // id pengawas lapangan 2
            'acting_commitment_marker_id.required' => 'PPK harus diisi', // id ppk
            'status.required' => 'status harus diisi',
        ]);

        // Mengambil angka saja dari contract value
        // Menampung karakter yang ingin dihapus
        $removeChar = ['R', 'p', '.', ',', ' '];

        // Menghapus karakter sesuai dengan array yang ada di $removeChar
        $validateData['contract_value'] = str_replace($removeChar, "", $request->contract_value);

        $taskReport->update($validateData);

        return to_route('task-report.show', $taskReport)->with('success', 'Berhasil Mengubah Pekerjaan');
    }

    public function destroy(TaskReport $taskReport)
    {
        $delete = $taskReport->delete();

        if ($delete) {
            return response()->json([
                'status' => 200,
                'message' => 'Berhasil Menghapus Laporan'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Gagal Menghapus Laporan',
            ]);
        }
    }

    public function report($id)
    {
        $taskReport = TaskReport::with('kindOfWork')->findorfail($id);

        $kindOfWorkDetails = $taskReport->kindOfWork->first()->kindOfWorkDetails;

        $schedules = $kindOfWorkDetails->first()->schedules;

        $data = [
            'taskReport' => $taskReport,
            'schedules' => $schedules,
            'kindOfWorkDetails' => $kindOfWorkDetails,
        ];

        return view('admin.task-report.report', $data);
    }
}
