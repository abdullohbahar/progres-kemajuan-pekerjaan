<?php

namespace App\Http\Controllers\Partner;

use DataTables;
use App\Models\Option;
use App\Models\Partner;
use App\Models\Agreement;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteSupervisor\TaskReportSiteSupervisorController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;

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
        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.schedules')->where('id', $id)->firstOrfail();
        // Melakukan pengecekan apakah status sudah aktif atau belum

        if ($taskReport->contract_terminated) {
            return redirect()->back()->with('terminated', '');
        }


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

        $taskReportController = new TaskReportSupervisingConsultantController();

        $getWeek = $taskReportController->getWeek($taskReport);


        // $weeklyProgresses = Agreement::with('kindOfWorkDetail')
        //     ->where('task_report_id', $id)
        //     // ->where('role', 'Partner')
        //     // ->where('status', 'Awal')
        //     // ->orWhere('status', 'Ditolak Pengawas Lapangan 1')
        //     ->where('week', $getWeek)->get();

        // task next week
        // $taskNextWeeks = $taskReport;

        $taskNextWeeks = [];
        $taskLastWeeks = [];
        foreach ($taskReport?->kindOfWork as $kindOfWork) {
            foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetail) {
                // get time schedule next week
                foreach ($kindOfWorkDetail->timeSchedules->where('week', $getWeek + 1)->where('progress', '!=', 0) as $timeSchedule) {
                    $timeScheduleData = [
                        'name' => $kindOfWorkDetail->name,
                        'progress' => $timeSchedule->progress
                    ];

                    $taskNextWeeks[] = $timeScheduleData;
                }


                for ($i = $getWeek - 1; $i >= 1; $i--) {
                    $timeScheduleDataLastWeek = [];
                    foreach ($kindOfWorkDetail->schedules->where('week', $i)->where('is_site_supervisor_agree', 1)->where('progress', '!=', 0) as $timeSchedule) {
                        $timeScheduleDataLastWeek = [
                            'name' => $kindOfWorkDetail->name,
                            'kind_of_work_detail_id' => $timeSchedule->kind_of_work_detail_id,
                            'progress' => $timeSchedule->progress
                        ];

                        $taskLastWeeks[$i][] = $timeScheduleDataLastWeek;
                    }
                }
            }
        }

        krsort($taskLastWeeks);

        $partnerID = Partner::where('user_id', Auth::user()->id)->first()->id;

        $taskReportSiteSupervisorController = new TaskReportSiteSupervisorController();
        $thisWeekReport = $taskReportSiteSupervisorController->getWeeklyReportThisWeek($taskReport, $getWeek);

        $data = [
            'active' => $this->active,
            'taskReport' => $taskReport,
            'status' => $status,
            'week' => $getWeek,
            'weeklyProgresses' => $thisWeekReport,
            'taskNextWeeks' => $taskNextWeeks,
            'partnerID' => $partnerID,
            'taskLastWeeks' => $taskLastWeeks,
            'getWeek' => $getWeek,
        ];

        return view('partner.task-report.show', $data);
    }
}
