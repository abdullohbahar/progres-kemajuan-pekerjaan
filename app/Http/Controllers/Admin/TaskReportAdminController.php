<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Option;
use App\Models\Partner;
use App\Models\McHistory;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Models\SiteSupervisor;
use App\Models\AgreementTaskReport;
use App\Models\TimeScheduleHistory;
use App\Http\Controllers\Controller;
use App\Models\SupervisingConsultant;
use App\Models\ActingCommitmentMarker;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;

class TaskReportAdminController extends Controller
{
    private $active = 'task-report';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = TaskReport::orderBy('created_at', 'desc')
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

        return to_route('task.report.admin')->with('success', 'Berhasil Menambah Pekerjaan');
    }

    public function show($id)
    {
        $taskReport = TaskReport::with('agreementTaskReport')->where('id', $id)->firstOrfail();
        // Melakukan pengecekan apakah status sudah aktif atau belum

        // mengambil total mc
        $totalMcHistories = McHistory::where('task_report_id', $id)
            ->select('total_mc')
            ->distinct()
            ->orderByRaw("total_mc = 'Awal' DESC, total_mc ASC")
            ->get();

        $taskReportController = new TaskReportSupervisingConsultantController();
        $getWeek = $taskReportController->getWeek($taskReport);

        $dateSpk = strtotime($taskReport->spk_date);
        $dateNow = strtotime(Option::where('name', 'date-now')->first()->value) ?? strtotime(now());

        if ($dateNow < $dateSpk) {
            $status = 'inactive';
        } else {
            $status = 'active';
        }

        $data = [
            'active' => $this->active,
            'taskReport' => $taskReport,
            'status' => $status,
            'totalMcHistories' => $totalMcHistories,
            'getWeek' => $getWeek
        ];

        return view('admin.task-report.show', $data);
    }

    public function edit($id)
    {
        $taskReport = TaskReport::findorfail($id);
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

    public function update(Request $request, $id)
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
        ]);

        // Mengambil angka saja dari contract value
        // Menampung karakter yang ingin dihapus
        $removeChar = ['R', 'p', '.', ',', ' '];

        // Menghapus karakter sesuai dengan array yang ada di $removeChar
        $validateData['contract_value'] = str_replace($removeChar, "", $request->contract_value);

        TaskReport::where('id', $id)->update($validateData);

        return to_route('show.task.report.admin', $id)->with('success', 'Berhasil Mengubah Pekerjaan');
    }

    public function destroy($id)
    {
        $delete = TaskReport::where('id', $id)->delete();

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

        // $baris_pertama = [0.15, 0.01, 0, 0, 0, 0];
        // $baris_kedua = [];

        // $total = 0;

        // foreach ($baris_pertama as $index => $nilai) {
        //     $penjumlahan = 0;

        //     // Penjumlahan sesuai dengan pola yang telah dijelaskan
        //     for ($i = $index; $i >= 0; $i--) {
        //         $penjumlahan += $baris_pertama[$i];
        //     }

        //     $baris_kedua[] = $penjumlahan;
        //     $total += $penjumlahan;
        // }

        // foreach ($baris_pertama as $nilai) {
        //     echo $nilai . ' / ';
        // }

        // echo "<br>";

        // foreach ($baris_kedua as $nilai) {
        //     echo $nilai . ' / ';
        // }

        // dd("x");

        $kindOfWorkDetails = $taskReport->kindOfWork->first()->kindOfWorkDetails;

        $schedules = $kindOfWorkDetails->first()->schedules;

        $data = [
            'taskReport' => $taskReport,
            'schedules' => $schedules,
            'kindOfWorkDetails' => $kindOfWorkDetails,
        ];

        return view('admin.task-report.report', $data);
    }

    public function reportWeekly($id, $week)
    {
        $taskReport = TaskReport::with('kindOfWork')->findorfail($id);

        $kindOfWorkDetails = $taskReport->kindOfWork->first()->kindOfWorkDetails;

        $schedules = $kindOfWorkDetails->first()->schedules;

        $data = [
            'taskReport' => $taskReport,
            'schedules' => $schedules,
            'kindOfWorkDetails' => $kindOfWorkDetails,
        ];

        return view('admin.task-report.weekly-report', $data);
    }
}
