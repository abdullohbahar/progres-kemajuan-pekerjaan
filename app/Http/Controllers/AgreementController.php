<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Agreement;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;

class AgreementController extends Controller
{
    public function getTaskThisWeek($taskID, $week)
    {
        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.schedules')->findorfail($taskID);

        $progress = [];
        $timeScheduleProgress = [];

        foreach ($taskReport->kindOfWork as $kindOfWork) {
            foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetail) {
                // get time schedule
                foreach ($kindOfWorkDetail->timeSchedules->where('week', $week + 1)->where('progress', '!=', 0) as $timeSchedule) {
                    $timeScheduleData = [
                        'name' => $kindOfWorkDetail->name,
                        'progress' => $timeSchedule->progress
                    ];

                    $timeScheduleProgress[] = $timeScheduleData;
                }

                // get prgoress
                foreach ($kindOfWorkDetail->schedules->where('week', $week)->where('progress', '!=', 0) as $schedule) {
                    $scheduleData = [
                        'name' => $kindOfWorkDetail->name,
                        'task_report_id' => $taskID,
                        'kind_of_work_detail_id' => $kindOfWorkDetail->id, // Ganti 'nama_kolom' dengan kolom yang sesuai
                        'week' => $schedule->week,
                        'date' => $schedule->date,
                        'progress' => $schedule->progress,
                    ];

                    $progress[] = $scheduleData;
                }
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => [
                $progress,
                $timeScheduleProgress
            ],
        ]);
    }

    // dari konsultan pengawas ke rekanan
    public function fromSupervisingConsultant(Request $request)
    {
        foreach ($request->week as $key => $week) {
            $agreement = Agreement::where('task_report_id', $request->task_report_id[$key])
                ->where('kind_of_work_detail_id', $request->kind_of_work_detail_id[$key])
                ->where('role', 'Supervising Consultant')
                ->where('date', $request->date[$key]);

            if ($agreement->count() > 0) {
                $agreement->update([
                    'user_id' => Auth::user()->id,
                    'task_report_id' => $request->task_report_id[$key],
                    'kind_of_work_detail_id' => $request->kind_of_work_detail_id[$key],
                    'role' => 'Partner',
                    'week' => $request->week[$key],
                    'date' => $request->date[$key],
                    'progress' => $request->progress[$key],
                    'status' => 'Awal',
                ]);
            } else {
                Agreement::create([
                    'user_id' => Auth::user()->id,
                    'task_report_id' => $request->task_report_id[$key],
                    'kind_of_work_detail_id' => $request->kind_of_work_detail_id[$key],
                    'role' => 'Partner',
                    'week' => $request->week[$key],
                    'date' => $request->date[$key],
                    'progress' => $request->progress[$key],
                    'status' => 'Awal',
                ]);
            }
        }

        $sendMessage = new SendMessageController();
        $sendMessage->sendMessageToPartner($request->kind_of_work_detail_id[0]);

        return redirect()->back()->with('success', 'Berhasil mengirim progress mingguan ke rekanan');
    }

    // dari rekanan ke pengawas lapangan
    public function fromPartner(Request $request)
    {
        foreach ($request->week as $key => $week) {
            $agreement = Agreement::where('task_report_id', $request->task_report_id[$key])
                ->where('kind_of_work_detail_id', $request->kind_of_work_detail_id[$key])
                ->where('date', $request->date[$key]);

            if ($agreement->count() > 0) {
                $agreement->update([
                    'user_id' => Auth::user()->id,
                    'task_report_id' => $request->task_report_id[$key],
                    'kind_of_work_detail_id' => $request->kind_of_work_detail_id[$key],
                    'role' => 'Site Supervisor',
                    'week' => $request->week[$key],
                    'date' => $request->date[$key],
                    'progress' => $request->progress[$key],
                    'status' => 'Disetujui Rekanan',
                ]);
            } else {
                Agreement::create([
                    'user_id' => Auth::user()->id,
                    'task_report_id' => $request->task_report_id[$key],
                    'kind_of_work_detail_id' => $request->kind_of_work_detail_id[$key],
                    'role' => 'Site Supervisor',
                    'week' => $request->week[$key],
                    'date' => $request->date[$key],
                    'progress' => $request->progress[$key],
                    'status' => 'Disetujui Rekanan',
                ]);
            }
        }

        $sendMessage = new SendMessageController();
        $sendMessage->sendMessageToSiteSupervisor($request->kind_of_work_detail_id[0]);

        // lakukan pengecekan apakah minggu ini dapat SP atau tidak
        $this->checkSP($request->task_report_id[0]);

        return redirect()->back()->with('success', 'Berhasil mengirim progress mingguan ke pengawas lapangan 1');
    }

    public function checkSP($taskReportID)
    {
        $taskReport = TaskReport::with(['kindOfWork.kindOfWorkDetails.schedules', 'kindOfWork.kindOfWorkDetails.timeSchedules'])->findorfail($taskReportID);

        $taskReportController = new TaskReportSupervisingConsultantController();

        $getWeek = $taskReportController->getWeek($taskReport);

        $totalSchedule = 0;
        $totalTimeSchedule = 0;

        foreach ($taskReport->kindOfWork as $kindOfWork) {
            foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetail) {
                // count schedule
                for ($i = 1; $i < $getWeek + 1; $i++) {
                    $totalSchedule += $kindOfWorkDetail->schedules->where('week', $i)->first()?->progress;
                }

                // count time schedule
                for ($i = 1; $i < $getWeek + 1; $i++) {
                    $totalTimeSchedule += $kindOfWorkDetail->timeSchedules->where('week', $i)->first()?->progress;
                }
            }
        }

        $total = $totalSchedule - $totalTimeSchedule;
        // $total = -25;

        $sendMessage = new SendMessageController();

        // check if 
        if ($totalTimeSchedule > 70) {
            $maxSP = -5;
            // check is total more than or less than max sp
            if ($total < $maxSP) {
                if ($taskReport->status == 'Aktif') {
                    TaskReport::where('id', $taskReportID)->update([
                        'status' => 'SP 1'
                    ]);
                } else if ($taskReport->status == 'SP 1') {
                    TaskReport::where('id', $taskReportID)->update([
                        'status' => 'SCM 1'
                    ]);
                } else if ($taskReport->status == 'SCM 1') {
                    TaskReport::where('id', $taskReportID)->update([
                        'status' => 'SCM 2'
                    ]);
                } else if ($taskReport->status == 'SCM 2') {
                    TaskReport::where('id', $taskReportID)->update([
                        'status' => 'SCM 3'
                    ]);
                }

                $sendMessage->sendMessageGotSP($taskReportID);
            } else {
                TaskReport::where('id', $taskReportID)->update([
                    'status' => 'Aktif'
                ]);
            }
        } else {
            $maxSP = -10;

            if ($total < $maxSP) {
                if ($taskReport->status == 'Aktif') {
                    TaskReport::where('id', $taskReportID)->update([
                        'status' => 'SP 1'
                    ]);
                } else if ($taskReport->status == 'SP 1') {
                    TaskReport::where('id', $taskReportID)->update([
                        'status' => 'SCM 1'
                    ]);
                } else if ($taskReport->status == 'SCM 1') {
                    TaskReport::where('id', $taskReportID)->update([
                        'status' => 'SCM 2'
                    ]);
                } else if ($taskReport->status == 'SCM 2') {
                    TaskReport::where('id', $taskReportID)->update([
                        'status' => 'SCM 3'
                    ]);
                }

                $sendMessage->sendMessageGotSP($taskReportID);
            } else {
                TaskReport::where('id', $taskReportID)->update([
                    'status' => 'Aktif'
                ]);
            }
        }
    }

    public function fromSiteSupervisor1(Request $request)
    {
        foreach ($request->week as $key => $week) {
            $agreement = Agreement::where('task_report_id', $request->task_report_id[$key])
                ->where('kind_of_work_detail_id', $request->kind_of_work_detail_id[$key])
                ->where('date', $request->date[$key]);

            if ($request->siteSupervisorRole == 1) {
                if ($agreement->count() > 0) {
                    $agreement->update([
                        'user_id' => Auth::user()->id,
                        'task_report_id' => $request->task_report_id[$key],
                        'kind_of_work_detail_id' => $request->kind_of_work_detail_id[$key],
                        'role' => 'Site Supervisor 2',
                        'week' => $request->week[$key],
                        'date' => $request->date[$key],
                        'progress' => $request->progress[$key],
                        'status' => 'Disetujui Pengawas Lapangan 1',
                    ]);
                } else {
                    Agreement::create([
                        'user_id' => Auth::user()->id,
                        'task_report_id' => $request->task_report_id[$key],
                        'kind_of_work_detail_id' => $request->kind_of_work_detail_id[$key],
                        'role' => 'Site Supervisor 2',
                        'week' => $request->week[$key],
                        'date' => $request->date[$key],
                        'progress' => $request->progress[$key],
                        'status' => 'Disetujui Pengawas Lapangan 1',
                    ]);
                }

                // add value true to is site supervisor agree
                Schedule::where('kind_of_work_detail_id', $request->kind_of_work_detail_id[$key])
                    ->where('week', $request->week[$key])->update([
                        'is_site_supervisor_agree' => 1
                    ]);
            } else {
                if ($agreement->count() > 0) {
                    $agreement->update([
                        'user_id' => Auth::user()->id,
                        'task_report_id' => $request->task_report_id[$key],
                        'kind_of_work_detail_id' => $request->kind_of_work_detail_id[$key],
                        'role' => 'Acting Commitment Marker',
                        'week' => $request->week[$key],
                        'date' => $request->date[$key],
                        'progress' => $request->progress[$key],
                        'status' => 'Disetujui Pengawas Lapangan 2',
                    ]);
                } else {
                    Agreement::create([
                        'user_id' => Auth::user()->id,
                        'task_report_id' => $request->task_report_id[$key],
                        'kind_of_work_detail_id' => $request->kind_of_work_detail_id[$key],
                        'role' => 'Acting Commitment Marker',
                        'week' => $request->week[$key],
                        'date' => $request->date[$key],
                        'progress' => $request->progress[$key],
                        'status' => 'Disetujui Pengawas Lapangan 2',
                    ]);
                }
            }
        }


        return redirect()->back()->with('success', 'Berhasil mengirim progress mingguan');
    }

    public function reject(Request $request)
    {
        $agreements = Agreement::where('task_report_id', $request->taskID)
            ->where('week', $request->week)
            ->orWhere('status', 'Awal')
            ->where('status', $request->status)->get();

        // dd($agreements);

        if ($agreements->count() > 0) {
            foreach ($agreements as $agreement) {
                $agreement->update([
                    'status' => $request->reject,
                    'information' => $request->information,
                    'role' => $request->role,
                ]);
            }
        }

        return redirect()->back()->with('success', "Anda berhasil menolak progress minggu ke-$request->week");
    }

    public function rejectWeeklyProgressReason($taskReportID)
    {
        $agreements = Agreement::with('kindOfWorkDetail')->where('task_report_id', $taskReportID)->get();

        $datas = [];

        foreach ($agreements as $key => $agreement) {
            $datas[$key] = [
                'name' => $agreement->kindOfWorkDetail->name,
                'progress' => $agreement->progress,
                'information' => $agreement->information,
            ];
        }


        if ($agreements->count() > 0) {
            return response()->json([
                'data' => $datas
            ], 200);
        } else {
            return response()->json([
                'message' => "Data tidak ditemukan"
            ], 404);
        }
    }
}
