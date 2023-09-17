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

    public function edit($id)
    {
        $kindOfWork = KindOfWork::where('id', $id)->firstorfail();

        $data = [
            'active' => $this->active,
            'kindOfWork' => $kindOfWork,
        ];

        return view('admin.kind-of-work.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $kindOfWork = KindOfWork::where('id', $request->kind_of_work_id)->firstorfail();

        try {
            DB::beginTransaction();

            // update name to kind of work (macam pekerjaan)
            KindOfWork::where('id', $request->kind_of_work_id)->update([
                'name' => $request->work_name
            ]);

            // save sub name and information to kind of work detail (detail macam pekerjaan)
            foreach ($request->multiple_name as $key => $name) {
                // check is id of kind of work detail null or not
                // if not null update
                // else create
                if ($request->multiple_name[$key]['id']) {
                    $idKindOfWorkDetail = $request->multiple_name[$key]['id'];
                    KindOfWorkDetail::where('id', $idKindOfWorkDetail)->update([
                        'name' => $request->multiple_name[$key]['name'],
                        'information' => $request->multiple_name[$key]['information'],
                    ]);
                } else {
                    KindOfWorkDetail::create([
                        'kind_of_work_id' => $request->kind_of_work_id,
                        'name' => $request->multiple_name[$key]['name'],
                        'information' => $request->multiple_name[$key]['information'],
                    ]);
                }
            }

            DB::commit();

            return to_route('task-report.show', $kindOfWork->task_id)->with('success', 'Berhasil Mengubah Macam Pekerjaan');
        } catch (Exception $e) {
            DB::rollBack();

            dd($e);

            return to_route('task-report.show', $kindOfWork->task_id)->with('failed', 'Gagal Mengubah Macam Pekerjaan');
        }
    }

    public function manageWork($id)
    {
        $kindOfWorkDetail = KindOfWorkDetail::with('kindOfWork')->findorfail($id);

        $data = [
            'active' => $this->active,
            'kindOfWorkDetail' => $kindOfWorkDetail,
        ];

        return view('admin.kind-of-work.manage-work', $data);
    }
}
