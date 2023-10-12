<?php

namespace App\Http\Controllers\SiteSupervisor;

use DataTables;
use App\Models\Agreement;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Models\SiteSupervisor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;

class TaskReportSiteSupervisorController extends Controller
{
    private $active = 'task-report';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $id = SiteSupervisor::where('user_id', Auth::user()->id)->first()->id;

            $query = TaskReport::orderBy('created_at', 'desc')
                ->where('site_supervisor_id_1', $id)
                ->orWhere('site_supervisor_id_2', $id)
                ->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('site-supervisor.task-report.index', $data);
    }

    public function show($id)
    {
        $siteSupervisorID = SiteSupervisor::where('user_id', Auth::user()->id)->first()->id;

        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.schedules')->where('id', $id)->firstOrfail();
        // Melakukan pengecekan apakah status sudah aktif atau belum

        // Melakukan pengecekan apakah pengawas 1 atau 2
        $checkSiteSupervisor = TaskReport::where('site_supervisor_id_1', $siteSupervisorID)->where('id', $id)->get();

        if ($checkSiteSupervisor->count() >= 1) {
            $siteSupervisorRole = 1;
        } else if ($checkSiteSupervisor->count() == 0) {
            $siteSupervisorRole = 2;
        }

        $dateSpk = strtotime($taskReport->spk_date);
        $dateNow = strtotime(now());

        if ($dateNow < $dateSpk) {
            $status = 'inactive';
        } else {
            $status = 'active';
        }

        $taskReportController = new TaskReportSupervisingConsultantController();

        $getWeek = $taskReportController->getWeek($taskReport);

        if ($siteSupervisorRole == 1) {
            $weeklyProgresses = Agreement::with('kindOfWorkDetail')
                ->where('task_report_id', $id)
                ->where('status', 'Disetujui Rekanan')
                ->where('role', 'Site Supervisor')
                ->where('week', $getWeek)->get();
        } else if ($siteSupervisorRole == 2) {
            $weeklyProgresses = Agreement::with('kindOfWorkDetail')
                ->where('task_report_id', $id)
                ->where('status', 'Disetujui Pengawas Lapangan 1')
                ->where('role', 'Site Supervisor 2')
                ->where('week', $getWeek)->get();
        }


        // task next week
        // $taskNextWeeks = $taskReport;

        $taskNextWeeks = [];
        foreach ($taskReport?->kindOfWork as $kindOfWork) {
            foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetail) {
                // get time schedule
                foreach ($kindOfWorkDetail->timeSchedules->where('week', $getWeek + 1)->where('progress', '!=', 0) as $timeSchedule) {
                    $timeScheduleData = [
                        'name' => $kindOfWorkDetail->name,
                        'progress' => $timeSchedule->progress
                    ];

                    $taskNextWeeks[] = $timeScheduleData;
                }
            }
        }

        $siteSupervisorID = SiteSupervisor::where('user_id', Auth::user()->id)->first()->id;

        $data = [
            'active' => $this->active,
            'taskReport' => $taskReport,
            'status' => $status,
            'week' => $getWeek,
            'weeklyProgresses' => $weeklyProgresses,
            'taskNextWeeks' => $taskNextWeeks,
            'siteSupervisorID' => $siteSupervisorID,
            'siteSupervisorRole' => $siteSupervisorRole
        ];

        return view('site-supervisor.task-report.show', $data);
    }
}
