<?php

namespace App\Http\Controllers\SupervisingConsultant;

use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\McHistory;
use Illuminate\Support\Facades\Auth;
use App\Models\SupervisingConsultant;
use App\Models\TimeScheduleHistory;
use DataTables;

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
        $taskReport = TaskReport::where('id', $id)->firstOrfail();
        // Melakukan pengecekan apakah status sudah aktif atau belum
        $timeScheduleHistories = TimeScheduleHistory::where('task_report_id', $id)->get();

        // mengambil total mc
        $totalMcHistories = McHistory::where('task_report_id', $id)
            ->select('total_mc')
            ->distinct()
            ->orderBy('total_mc', 'asc')
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
            'totalMcHistories' => $totalMcHistories
        ];

        return view('supervising_consultant.task-report.show', $data);
    }
}
