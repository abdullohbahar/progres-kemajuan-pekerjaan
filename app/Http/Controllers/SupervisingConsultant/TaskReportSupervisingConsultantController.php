<?php

namespace App\Http\Controllers\SupervisingConsultant;

use DataTables;
use Carbon\Carbon;
use App\Models\McHistory;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Models\TimeScheduleHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SupervisingConsultant;

class TaskReportSupervisingConsultantController extends Controller
{
    private $active = 'task-report';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $id = SupervisingConsultant::where('user_id', Auth::user()->id)->first()->id;

            $query = TaskReport::orderBy('created_at', 'desc')
                ->where('supervising_consultant_id', $id)
                ->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('supervising_consultant.task-report.index', $data);
    }

    public function show($id)
    {
        $taskReport = TaskReport::with('agreementTaskReport', 'agreement')->where('id', $id)->firstOrfail();

        $week = $this->getWeek($taskReport);

        // Melakukan pengecekan apakah status sudah aktif atau belum
        $timeScheduleHistories = TimeScheduleHistory::where('task_report_id', $id)->get();

        $supervisingConsultantID = SupervisingConsultant::where('user_id', Auth::user()->id)->first()->id;

        // mengambil total mc
        $totalMcHistories = McHistory::where('task_report_id', $id)
            ->select('total_mc')
            ->distinct()
            ->orderByRaw("total_mc = 'Awal' DESC, total_mc ASC")
            ->get();

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
            'status' => $status,
            'timeScheduleHistories' => $timeScheduleHistories,
            'totalMcHistories' => $totalMcHistories,
            'week' => $week,
            'supervisingConsultantID' => $supervisingConsultantID
        ];

        return view('supervising_consultant.task-report.show', $data);
    }

    public function getWeek($taskReport)
    {
        // menampilkan form berdasarkan jumlah minggu
        // menghitung hari per minggu
        $start_date = Carbon::parse($taskReport->spkDate)->format('Y-m-d');
        $executionTime = $taskReport->execution_time;
        $dates = [];

        // Menginisialisasi tanggal awal
        $current_date = $start_date;

        for ($i = 0; $i < $executionTime; $i++) {
            $dates[] = date('d-m-Y', strtotime($current_date));

            // Menambahkan 1 hari ke tanggal saat ini
            $current_date = date('Y-m-d', strtotime($current_date . " + 1 day"));
        }

        // Memecah array ke dalam grup-grup 7 hari
        $groupedDates = array_chunk($dates, 7);

        $dateNow = date('d-m-Y');

        foreach ($groupedDates as $week => $dates) {
            $weekNow = $week;
            foreach ($dates as $date) {
                if ($date == $dateNow) {
                    $weeks = $weekNow + 1;
                }
            }
        }

        return $weeks ?? 0;
    }
}
