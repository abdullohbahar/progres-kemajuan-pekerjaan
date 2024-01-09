<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AllReportExport;
use App\Exports\WeeklyReportExport;
use DataTables;
use Carbon\Carbon;
use App\Models\Option;
use App\Models\Partner;
use App\Models\McHistory;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Models\SiteSupervisor;
use Illuminate\Support\Facades\DB;
use App\Models\AgreementTaskReport;
use App\Models\TimeScheduleHistory;
use App\Http\Controllers\Controller;
use App\Models\SupervisingConsultant;
use App\Models\ActingCommitmentMarker;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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
        $taskReport = TaskReport::with(
            [
                'agreementTaskReport',
                'kindOfWork' => function ($query) {
                    $query->orderByRaw("CAST(SUBSTRING(name, LOCATE('DIVISI', name) + 6) AS UNSIGNED)");
                }
            ]
        )->where('id', $id)->firstOrfail();

        // mengambil total mc
        $totalMcHistories = McHistory::where('task_report_id', $id)
            ->select('total_mc')
            ->distinct()
            ->orderByRaw("total_mc = 'Awal' DESC, total_mc ASC")
            ->get();

        $taskReportController = new TaskReportSupervisingConsultantController();
        $getWeek = $taskReportController->getWeek($taskReport);

        $dateSpk = strtotime($taskReport->spk_date);

        $optionDate = Option::where('name', 'date-now')->first()->value;

        if ($optionDate) {
            $dateNow = strtotime($optionDate);
        } else {
            $dateNow = strtotime(date('d-m-Y'));
        }

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
        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.timeSchedules')->findorfail($id);

        // dd($id);

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

        $timeSchedules = DB::table('task_reports')
            ->join('kind_of_works', 'kind_of_works.task_id', '=', 'task_reports.id')
            ->join('kind_of_work_details', 'kind_of_work_details.kind_of_work_id', '=', 'kind_of_works.id')
            ->join('time_schedules', 'time_schedules.kind_of_work_detail_id', '=', 'kind_of_work_details.id')
            ->select('time_schedules.week', DB::raw('SUM(time_schedules.progress) as total_progress'))
            ->where('task_reports.id', $id)
            ->groupBy('time_schedules.week')
            ->get();

        $cumulativeTimeSchedules = [];
        $total = 0;

        foreach ($timeSchedules as $value) {
            $total += $value->total_progress;
            if ($total > 100) {
                $total = 100;
            }
            $cumulativeTimeSchedules[] = $total;
        }

        $ppk = $taskReport->actingCommitmentMarker;
        $siteSupervisor1 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_1)->first();
        $siteSupervisor2 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_2)->first();
        $siteSupervisor3 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_3)->first();
        $partner = $taskReport->partner;
        $supervisingConsultant = $taskReport->supervisingConsultant;

        $lastDateOfWeek = Carbon::now();
        $formattedlastDateOfWeek = $lastDateOfWeek->isoFormat('D MMMM Y');

        $data = [
            'taskReport' => $taskReport,
            'schedules' => $schedules,
            'kindOfWorkDetails' => $kindOfWorkDetails,
            'cumulativeTimeSchedules' => $cumulativeTimeSchedules,
            'ppk' => $ppk,
            'siteSupervisor1' => $siteSupervisor1,
            'siteSupervisor2' => $siteSupervisor2,
            'siteSupervisor3' => $siteSupervisor3,
            'partner' => $partner,
            'supervisingConsultant' => $supervisingConsultant,
            'formattedlastDateOfWeek' => $formattedlastDateOfWeek,
        ];

        // $pdf = PDF::loadView('admin.task-report.report', $data);

        // return $pdf->download("Surat SP $taskReport->task_name.pdf", $data);

        return view('admin.task-report.report', $data);
    }

    public function exportAllReportExcel($id)
    {
        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.timeSchedules')->findorfail($id);

        return Excel::download(new AllReportExport($id), $taskReport->task_name . '.xlsx');
    }

    // public function exportWeeklyReportExcel($id, $week)
    // {
    //     $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.timeSchedules')->findorfail($id);

    //     return Excel::download(new WeeklyReportExport($id, $week), $taskReport->task_name . '.xlsx');
    // }

    public function reportWeekly($id, $week)
    {
        $taskReport = TaskReport::with('kindOfWork', 'actingCommitmentMarker', 'partner.cvConsultant')->findorfail($id);

        $taskReportController = new TaskReportSupervisingConsultantController();

        $groupedDates = $taskReportController->getGroupedDates($taskReport);

        $kindOfWorkDetails = $taskReport->kindOfWork->first()->kindOfWorkDetails;

        $ppk = $taskReport->actingCommitmentMarker;
        $siteSupervisor1 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_1)->first();
        $siteSupervisor2 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_2)->first();
        $siteSupervisor3 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_3)->first();
        $partner = $taskReport->partner;
        $supervisingConsultant = $taskReport->supervisingConsultant;

        $firstDateOfWeek = Carbon::createFromFormat('d-m-Y', current($groupedDates[$week - 1]));
        $formattedfirstDateOfWeek = $firstDateOfWeek->isoFormat('D MMMM Y');

        $lastDateOfWeek = Carbon::createFromFormat('d-m-Y', end($groupedDates[$week - 1]));
        $formattedlastDateOfWeek = $lastDateOfWeek->isoFormat('D MMMM Y');

        $agreementDate = Carbon::createFromFormat('Y-m-d', $taskReport->spk_date);
        $formattedAgreementDate = $lastDateOfWeek->isoFormat('D MMMM Y');

        $data = [
            'taskReport' => $taskReport,
            'kindOfWorkDetails' => $kindOfWorkDetails,
            'week' => $week,
            'ppk' => $ppk,
            'siteSupervisor1' => $siteSupervisor1,
            'siteSupervisor2' => $siteSupervisor2,
            'siteSupervisor3' => $siteSupervisor3,
            'partner' => $partner,
            'supervisingConsultant' => $supervisingConsultant,
            'firstDayOfWeek' => current($groupedDates[$week - 1]),
            'lastDateOfWeek' => end($groupedDates[$week - 1]),
            'formattedlastDateOfWeek' => $formattedlastDateOfWeek,
            'formattedfirstDateOfWeek' => $formattedfirstDateOfWeek,
            'formattedAgreementDate' => $formattedAgreementDate,
            'spelledNumber' => $this->spelledNumber($week)
        ];

        return view('admin.task-report.weekly-report', $data);
    }

    public function spelledNumber($angka)
    {
        $angka = abs($angka);
        $spelledNumber = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];

        if ($angka < 12) {
            return $spelledNumber[$angka];
        } elseif ($angka < 20) {
            return $this->spelledNumber($angka - 10) . " Belas";
        } elseif ($angka < 100) {
            return $this->spelledNumber($angka / 10) . " Puluh " . $this->spelledNumber($angka % 10);
        } elseif ($angka < 200) {
            return "Seratus " . $this->spelledNumber($angka - 100);
        } elseif ($angka < 1000) {
            return $this->spelledNumber($angka / 100) . " Ratus " . $this->spelledNumber($angka % 100);
        } elseif ($angka < 2000) {
            return "Seribu " . $this->spelledNumber($angka - 1000);
        } elseif ($angka < 1000000) {
            return $this->spelledNumber($angka / 1000) . " Ribu " . $this->spelledNumber($angka % 1000);
        } elseif ($angka < 1000000000) {
            return $this->spelledNumber($angka / 1000000) . " Juta " . $this->spelledNumber($angka % 1000000);
        } else {
            return "Angka terlalu besar untuk diubah menjadi terbilang.";
        }
    }
}
