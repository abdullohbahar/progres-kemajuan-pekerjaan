<?php

namespace App\Http\Controllers;

use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Exports\WeeklyReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportWeeklyReportExcel extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, $week)
    {
        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.timeSchedules')->findorfail($id);

        return Excel::download(new WeeklyReportExport($id, $week), $taskReport->task_name . '.xlsx');
    }
}
