<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Models\AgreementTaskReport;
use App\Models\TaskReport;

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

    public function agreeTaskReportAgreement($taskReportID, $userID, $role, $agree)
    {
        AgreementTaskReport::where('task_report_id', $taskReportID)
            ->where('role', $role)
            ->where('role_id', $userID)
            ->update([
                'is_agree' => $agree,
            ]);

        // update task report is_agree
        // $agreementTaskReport = AgreementTaskReport::where('task_report_id', $taskReportID)
        //     ->whereNotNull('is_agree')
        //     ->pluck('is_agree')
        //     ->toArray();

        // // jika sudah tidak ada data yang kosong maka update is_agree
        // if (count($agreementTaskReport) >= 5) {
        //     if (in_array(false, $agreementTaskReport)) {
        //         // Jika terdapat 'false' dalam array, update is_agree 'false'
        //         TaskReport::where('id', $taskReportID)->update([
        //             'is_agree' => false,
        //         ]);
        //     } else {
        //         //  Jika terdapat 'true' dalam array, update is_agree 'true'
        //         TaskReport::where('id', $taskReportID)->update([
        //             'is_agree' => true,
        //         ]);
        //     }
        // }

        $this->updateTaskReportAfterRejectOrAgree($taskReportID);


        return response()->json([
            'status' => 200,
            'message' => 'Berhasil Menyetujui',
        ]);
    }

    public function rejectTaskReportAgreement(Request $request)
    {
        AgreementTaskReport::where('task_report_id', $request->taskReportID)
            ->where('role', $request->role)
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
}
