<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgreementController extends Controller
{
    public function getTaskThisWeek($taskID, $week)
    {
        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.schedules')->findorfail($taskID);

        $result = [];

        foreach ($taskReport->kindOfWork as $kindOfWork) {
            foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetail) {
                foreach ($kindOfWorkDetail->schedules->where('week', $week)->where('progress', '!=', 0) as $schedule) {
                    $scheduleData = [
                        'name' => $kindOfWorkDetail->name,
                        'task_report_id' => $taskID,
                        'kind_of_work_detail_id' => $kindOfWorkDetail->id, // Ganti 'nama_kolom' dengan kolom yang sesuai
                        'week' => $schedule->week,
                        'date' => $schedule->date,
                        'progress' => $schedule->progress,
                    ];

                    $result[] = $scheduleData;
                }
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'success',
            'data' => $result,
        ]);
    }

    public function fromSupervisingConsultant(Request $request)
    {
        dd($request->all());
    }
}
