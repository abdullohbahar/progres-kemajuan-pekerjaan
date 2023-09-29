<?php

namespace App\Http\Controllers;

use App\Models\McHistory;
use App\Models\TaskReport;
use Illuminate\Http\Request;

class McHistoryController extends Controller
{
    public function history($taskID, $totalMc)
    {
        $mcHistories = McHistory::with('kindOfWorkDetail')->where('task_report_id', $taskID)->where('total_mc', $totalMc)->get();
        $taskReport = TaskReport::findOrfail($taskID);

        $data = [
            'mcHistories' => $mcHistories,
            'taskReport' => $taskReport,
            'totalMc' => $totalMc
        ];

        return view('supervising_consultant.task-report.history-mc', $data);
    }
}
