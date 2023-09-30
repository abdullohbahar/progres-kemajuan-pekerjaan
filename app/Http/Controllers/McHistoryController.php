<?php

namespace App\Http\Controllers;

use App\Models\McHistory;
use App\Models\TaskReport;
use Illuminate\Http\Request;

class McHistoryController extends Controller
{
    public function history($taskID, $totalMc)
    {
        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.mcHistory')->findOrfail($taskID);
        $mcHistories = McHistory::with('kindOfWorkDetail')->where('task_report_id', $taskID)->where('total_mc', $totalMc)->get();


        // foreach ($taskReport->kindOfWork as $kindOfWork) {
        //     foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetails) {
        //         $mcHistories = $kindOfWorkDetails->mcHistory->where('total_mc', $totalMc);
        //         dump($mcHistories);
        //         // foreach ($kindOfWorkDetails->mcHistory as $mcHistory) {
        //         //     dump($mcHistory);
        //         // }
        //     }
        // }

        // dd("x");

        $data = [
            'mcHistories' => $mcHistories,
            'taskReport' => $taskReport,
            'totalMc' => $totalMc,
            'taskID' => $taskID
        ];

        return view('supervising_consultant.task-report.history-mc', $data);
    }
}
