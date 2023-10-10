<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AgreementTaskReport;

class TaskReportAgreementController extends Controller
{
    public function sendTaskReportAgreement(Request $request)
    {
        AgreementTaskReport::create([
            'task_report_id' => $request->task_report_id,
            'role_id' => $request->supervising_consultant_id,
            'role' => 'supervising_consultant'
        ]);

        AgreementTaskReport::create([
            'task_report_id' => $request->task_report_id,
            'role_id' => $request->partner_id,
            'role' => 'partner'
        ]);

        AgreementTaskReport::create([
            'task_report_id' => $request->task_report_id,
            'role_id' => $request->site_supervisor_id_1,
            'role' => 'site_supervisor_1'
        ]);

        AgreementTaskReport::create([
            'task_report_id' => $request->task_report_id,
            'role_id' => $request->site_supervisor_id_2,
            'role' => 'site_supervisor_2'
        ]);

        AgreementTaskReport::create([
            'task_report_id' => $request->task_report_id,
            'role_id' => $request->acting_commitment_marker_id,
            'role' => 'acting_commitment_marker'
        ]);

        return redirect()->back()->with('success', 'Berhasil mengirim');
    }

    public function listTaskReport($taskReportID)
    {
        $taskReport = TaskReport::with('kindOfWork')->findorfail($taskReportID);

        $kindOfWorkDetails = $taskReport->kindOfWork->first()->kindOfWorkDetails;

        $schedules = $kindOfWorkDetails->first()->schedules;

        $data = [
            'taskReport' => $taskReport,
            'schedules' => $schedules,
            'kindOfWorkDetails' => $kindOfWorkDetails,
        ];

        return view('task-report-agreement.report', $data);
    }

    public function agreeTaskReportAgreement($taskReportID, $userID, $role, $agree)
    {
        // jika rolenya site supervisor maka lakukan pengecekan
        // apakah site supervisor 1 atau dua
        if ($role == 'site_supervisor') {
            $taskReport = TaskReport::where('id', $taskReportID)->where('site_supervisor_id_1', $userID)->first();

            if ($taskReport) {
                $role = 'site_supervisor_1';
            } else {
                $role = 'site_supervisor_2';
            }
        }

        AgreementTaskReport::where('task_report_id', $taskReportID)
            ->where('role', $role)
            ->where('role_id', $userID)
            ->update([
                'is_agree' => $agree,
            ]);

        $this->updateTaskReportAfterRejectOrAgree($taskReportID);

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Menyetujui',
            'role' => $role,
        ]);
    }

    public function rejectTaskReportAgreement(Request $request)
    {
        // jika rolenya site supervisor maka lakukan pengecekan
        // apakah site supervisor 1 atau dua
        $role = $request->role;
        if ($role == 'site_supervisor') {
            $taskReport = TaskReport::where('id', $request->taskReportID)->where('site_supervisor_id_1', $request->userID)->first();

            if ($taskReport) {
                $role = 'site_supervisor_1';
            } else {
                $role = 'site_supervisor_2';
            }
        }

        AgreementTaskReport::where('task_report_id', $request->taskReportID)
            ->where('role', $role)
            ->where('role_id', $request->userID)
            ->update([
                'is_agree' => false,
                'information' => $request->information,
            ]);

        $this->updateTaskReportAfterRejectOrAgree($request->taskReportID);


        return redirect()->back()->with('success', 'Berhasil menolak');
    }

    public function updateTaskReportAfterRejectOrAgree($taskReportID)
    {
        // update task report is_agree
        $agreementTaskReport = AgreementTaskReport::where('task_report_id', $taskReportID)
            ->whereNotNull('is_agree')
            ->pluck('is_agree')
            ->toArray();

        // jika sudah tidak ada data yang kosong maka update is_agree
        if (count($agreementTaskReport) >= 5) {
            if (in_array(false, $agreementTaskReport)) {
                // Jika terdapat 'false' dalam array, update is_agree 'false'
                TaskReport::where('id', $taskReportID)->update([
                    'is_agree' => false,
                ]);
            } else {
                //  Jika terdapat 'true' dalam array, update is_agree 'true'
                TaskReport::where('id', $taskReportID)->update([
                    'is_agree' => true,
                ]);
            }
        }
    }

    public function rejectReason($taskReportID)
    {
        $datas = AgreementTaskReport::where('task_report_id', $taskReportID)->get();

        $reason = [];

        foreach ($datas as $data) {
            if ($data->role == "supervising_consultant") {
                $supervising = DB::table('agreement_task_reports')
                    ->join('supervising_consultants', 'agreement_task_reports.role_id', '=', 'supervising_consultants.id')
                    ->select('agreement_task_reports.*', 'supervising_consultants.*')
                    ->where('agreement_task_reports.task_report_id', '=', $data->task_report_id)
                    ->first();

                $reason['supervising'] = [
                    'role' => 'Konsultan Pengawas',
                    'data' => $supervising
                ];
            }

            if ($data->role == "partner") {
                $partner = DB::table('agreement_task_reports')
                    ->join('partners', 'agreement_task_reports.role_id', '=', 'partners.id')
                    ->select('agreement_task_reports.*', 'partners.*')
                    ->where('agreement_task_reports.task_report_id', '=', $data->task_report_id)
                    ->first();

                $reason['partner'] = [
                    'role' => 'Rekanan',
                    'data' => $partner
                ];
            }

            if ($data->role == "site_supervisor_1") {
                $siteSupervisor1 = DB::table('agreement_task_reports')
                    ->join('site_supervisors', 'agreement_task_reports.role_id', '=', 'site_supervisors.id')
                    ->select('agreement_task_reports.*', 'site_supervisors.*')
                    ->where('agreement_task_reports.task_report_id', '=', $data->task_report_id)
                    ->where('agreement_task_reports.role', '=', 'site_supervisor_1')
                    ->first();

                $reason['site_supervisor_1'] = [
                    'role' => 'Pengawas Lapangan 1',
                    'data' => $siteSupervisor1,
                ];
            }

            if ($data->role == "site_supervisor_2") {
                $siteSupervisor2 = DB::table('agreement_task_reports')
                    ->join('site_supervisors', 'agreement_task_reports.role_id', '=', 'site_supervisors.id')
                    ->select('agreement_task_reports.*', 'site_supervisors.*')
                    ->where('agreement_task_reports.task_report_id', '=', $data->task_report_id)
                    ->where('agreement_task_reports.role', '=', 'site_supervisor_2')
                    ->first();

                $reason['site_supervisor_2'] = [
                    'role' => 'Pengawas Lapangan 2',
                    'data' => $siteSupervisor2,
                ];
            }

            if ($data->role == "acting_commitment_marker") {
                $siteSupervisor2 = DB::table('agreement_task_reports')
                    ->join('acting_commitment_markers', 'agreement_task_reports.role_id', '=', 'acting_commitment_markers.id')
                    ->select('agreement_task_reports.*', 'acting_commitment_markers.*')
                    ->where('agreement_task_reports.task_report_id', '=', $data->task_report_id)
                    ->first();

                $reason['acting_commitment_marker'] = [
                    'role' => 'PPK',
                    'data' => $siteSupervisor2,
                ];
            }
        }

        return response()->json([
            'status' => 200,
            'data' => $reason
        ]);
    }
}
