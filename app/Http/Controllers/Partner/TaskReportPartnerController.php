<?php

namespace App\Http\Controllers\Partner;

use DataTables;
use App\Models\Partner;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;
use App\Models\Agreement;
use Illuminate\Support\Facades\Auth;

class TaskReportPartnerController extends Controller
{
    private $active = 'task-report';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $id = Partner::where('user_id', Auth::user()->id)->first()->id;

            $query = TaskReport::orderBy('created_at', 'desc')
                ->where('partner_id', $id)
                ->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('partner.task-report.index', $data);
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

        $taskReportController = new TaskReportSupervisingConsultantController();

        $getWeek = $taskReportController->getWeek($taskReport);

        $weeklyProgresses = Agreement::with('kindOfWorkDetail')
            ->where('task_report_id', $id)
            ->where('status', 'Awal')
            ->where('week', $getWeek)->get();

        $data = [
            'active' => $this->active,
            'taskReport' => $taskReport,
            'status' => $status,
            'week' => $getWeek,
            'weeklyProgresses' => $weeklyProgresses
        ];

        return view('partner.task-report.show', $data);
    }
}
