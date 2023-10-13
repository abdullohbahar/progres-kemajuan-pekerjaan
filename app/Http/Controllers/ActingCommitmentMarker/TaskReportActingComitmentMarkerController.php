<?php

namespace App\Http\Controllers\ActingCommitmentMarker;

use DataTables;
use App\Models\Agreement;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ActingCommitmentMarker;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;

class TaskReportActingComitmentMarkerController extends Controller
{
    private $active = 'task-report';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $id = ActingCommitmentMarker::where('user_id', Auth::user()->id)->first()->id;

            $query = TaskReport::orderBy('created_at', 'desc')
                ->where('acting_commitment_marker_id', $id)
                ->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('acting-commitment-marker.task-report.index', $data);
    }

    public function show($id)
    {
        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.schedules')->where('id', $id)->firstOrfail();
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
            ->where('role', 'Partner')
            ->where('status', 'Awal')
            ->orWhere('status', 'Ditolak Pengawas Lapangan 1')
            ->where('week', $getWeek)->get();

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

        $partnerID = ActingCommitmentMarker::where('user_id', Auth::user()->id)->first()->id;

        $data = [
            'active' => $this->active,
            'taskReport' => $taskReport,
            'status' => $status,
            'week' => $getWeek,
            'weeklyProgresses' => $weeklyProgresses,
            'taskNextWeeks' => $taskNextWeeks,
            'partnerID' => $partnerID
        ];

        return view('partner.task-report.show', $data);
    }
}
