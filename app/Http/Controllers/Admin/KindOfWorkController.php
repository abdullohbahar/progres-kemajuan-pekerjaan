<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\KindOfWork;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Models\KindOfWorkDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Unit;

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

    // manage work = kind of work detail
    public function manageWork($id)
    {
        $units = Unit::orderBy('unit', 'asc')->get();
        $kindOfWorkDetail = KindOfWorkDetail::with('kindOfWork')->findorfail($id);

        $data = [
            'active' => $this->active,
            'kindOfWorkDetail' => $kindOfWorkDetail,
            'units' => $units
        ];

        return view('admin.kind-of-work.manage-work', $data);
    }

    // update manage work = kind of work detail update
    public function updateManageWork(Request $request, $id)
    {
        // get task id
        $task_id = KindOfWorkDetail::with('kindOfWork')->findOrFail($id);

        // Mengambil angka saja dari jumlah
        // Menampung karakter yang ingin dihapus
        $removeChar = ['R', 'p', '.', ',', ' '];

        // Menghapus karakter sesuai dengan array yang ada di $removeChar
        $contractUnitPrice = str_replace($removeChar, "", $request->contract_unit_price);
        $mcUnitPrice = str_replace($removeChar, "", $request->mc_unit_price);

        // update kind of work
        KindOfWorkDetail::where('id', $id)->update([
            'contract_volume' => $request->contract_volume,
            'contract_unit' => $request->contract_unit,
            'contract_unit_price' => $contractUnitPrice,
            'mc_volume' => $request->mc_volume,
            'mc_unit' => $request->mc_unit,
            'mc_unit_price' => $mcUnitPrice
        ]);

        return to_route('task-report.show', $task_id->kindOfWork->task_id)->with('success', 'Berhasil');
    }

    // kelola kemajuan pekerjaan
    public function manageWorkProgress($id)
    {
        $kindOfWorkDetail = KindOfWorkDetail::with('kindOfWork')->findorfail($id);

        $spkDate = $kindOfWorkDetail->kindOfWork->task->spk_date;
        $execution_time = $kindOfWorkDetail->kindOfWork->task->execution_time;

        // menampilkan form berdasarkan jumlah minggu
        // menghitung hari per minggu
        $start_date = Carbon::parse($spkDate)->format('Y-m-d');
        $executionTime = $execution_time;
        $dates = [];

        // Menginisialisasi tanggal awal
        $current_date = $start_date;

        for ($i = 0; $i < $executionTime; $i++) {
            $dates[] = date('d', strtotime($current_date));

            // Menambahkan 1 hari ke tanggal saat ini
            $current_date = date('Y-m-d', strtotime($current_date . " + 1 day"));
        }

        // Memecah array ke dalam grup-grup 7 hari
        $groupedDates = array_chunk($dates, 7);

        $data = [
            'active' => $this->active,
            'groupedDates' => $groupedDates,
            'kindOfWorkDetail' => $kindOfWorkDetail,
        ];

        return view('admin.kind-of-work.manage-work-progress', $data);
    }
}
