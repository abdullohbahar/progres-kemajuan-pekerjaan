<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\KindOfWork;
use App\Models\KindOfWorkDetail;

class KindOfWorkController extends Controller
{
    private $active = 'task-report';

    public function create($taskId)
    {
        TaskReport::findorfail($taskId);

        $data = [
            'active' => $this->active,
            'task_id' => $taskId
        ];

        return view('admin.kind-of-work.create', $data);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // save name to kind of work (macam pekerjaan)
            $kindOfWork = KindOfWork::create([
                'task_id' => $request->task_id,
                'name' => $request->name
            ]);

            // save sub name and information to kind of work detail (detail macam pekerjaan)
            foreach ($request->multiple_name as $key => $sub_name) {
                KindOfWorkDetail::create([
                    'kind_of_work_id' => $kindOfWork->id,
                    'name' => $request->multiple_name[$key]['sub_name'],
                    'information' => $request->multiple_name[$key]['information'],
                ]);
            }

            DB::commit();

            return to_route('task-report.show', $request->task_id)->with('success', 'Berhasil Menambahkan Macam Pekerjaan');
        } catch (Exception $e) {
            DB::rollBack();

            return to_route('kind.of.work')->with('failed', 'Gagal Menambahkan Macam Pekerjaan');
        }
    }
}
