<?php

namespace App\Http\Controllers\SupervisingConsultant;

use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SupervisingConsultant;
use DataTables;

class TaskReportSupervisingConsultantController extends Controller
{
    private $active = 'task-report';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $id = SupervisingConsultant::where('user_id', Auth::user()->id)->first()->id;

            $query = TaskReport::orderBy('created_at', 'desc')
                ->where('supervising_consultant_id', $id)
                ->get();

            // return $query;
            return Datatables::of($query)->make();
        }

        $data = [
            'active' => $this->active,
        ];

        return view('admin.task-report.index', $data);
    }

    public function show($id)
    {
        $taskReport = TaskReport::where('id', $id)->firstOrfail();
        // Melakukan pengecekan apakah status sudah aktif atau belum

        $dateSpk = strtotime($taskReport->spk_date);
        $dateNow = strtotime(now());

        if ($dateNow < $dateSpk) {
            $status = 'inactive';
        } else {
            $status = 'active';
        }

        $data = [
            'active' => $this->active,
            'taskReport' => $taskReport,
            'status' => $status
        ];

        return view('supervising_consultant.task-report.show', $data);
    }
}
