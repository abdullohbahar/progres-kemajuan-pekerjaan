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
use App\Http\Controllers\SendMessageController;
use App\Models\Partner;
use App\Models\ProgressPicture;
use App\Models\TimeSchedule;
use App\Models\Unit;
use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\Auth;

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

            return to_route('show.task.report.admin', $request->task_id)->with('success', 'Berhasil Menambahkan Macam Pekerjaan');
        } catch (Exception $e) {
            DB::rollBack();

            return to_route('show.task.report.admin', $request->task_id)->with('success', 'Gagal Menambahkan Macam Pekerjaan');
        }
    }

    public function edit($id)
    {
        $kindOfWork = KindOfWork::with('task')->where('id', $id)->firstorfail();
        $expired = now() <= $kindOfWork->task->spk_date;

        $data = [
            'active' => $this->active,
            'kindOfWork' => $kindOfWork,
            'expired' => $expired
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

            // jika ada item yang terhapus maka lakukan hapus di database
            if ($request->has('deletedItem')) {
                foreach ($request->deletedItem as $deleted) {
                    KindOfWorkDetail::where('id', $deleted)->delete();
                }
            }

            DB::commit();

            return to_route('show.task.report.admin', $kindOfWork->task_id)->with('success', 'Berhasil Mengubah Macam Pekerjaan');
        } catch (Exception $e) {
            DB::rollBack();

            dd($e);

            return to_route('show.task.report.admin', $kindOfWork->task_id)->with('failed', 'Gagal Mengubah Macam Pekerjaan');
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
            'units' => $units,
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
        $removePercent = ['%'];

        // Menghapus karakter sesuai dengan array yang ada di $removeChar
        $contractUnitPrice = str_replace($removeChar, "", $request->contract_unit_price);
        $contractTotalPrice = str_replace($removeChar, "", $request->total_contract_price);
        $mcUnitPrice = str_replace($removeChar, "", $request->mc_unit_price);
        $mcTotalPrice = str_replace($removeChar, "", $request->total_mc_price);
        $workValue = str_replace($removePercent, "", $request->work_value);

        // dd($workValue);

        // update kind of work
        KindOfWorkDetail::where('id', $id)->update([
            'contract_volume' => $request->contract_volume,
            'contract_unit' => $request->contract_unit,
            'contract_unit_price' => $contractUnitPrice,
            'total_contract_price' => $contractTotalPrice,
            'mc_volume' => $request->mc_volume,
            'mc_unit' => $request->mc_unit,
            'mc_unit_price' => $mcUnitPrice,
            'total_mc_price' => $mcTotalPrice,
            'work_value' => $workValue,
        ]);

        // mengambil task id berdasarkan kind of work detail
        $taskId = KindOfWorkDetail::with(['kindOfWork'])->where('id', $id)->first()->kindOfWork->task;

        // mengambil kind of work berdasarkan task id
        $taskReport = TaskReport::with('kindOfWork')->where('id', $taskId->id)->first()->kindOfWork;

        $sumTotalMcPrice = DB::table('kind_of_works')
            ->join('kind_of_work_details', 'kind_of_work_details.kind_of_work_id', '=', 'kind_of_works.id')
            ->where('kind_of_works.task_id', $taskId->id)
            ->groupBy('kind_of_works.id')
            ->selectRaw('SUM(kind_of_work_details.total_mc_price) as total')
            ->get()
            ->sum('total');

        // dd($grandTotal);
        // $sumTotalMcPrice = 0;

        // // melakukan penjumlahan total price
        // foreach ($taskReport as $tr) {

        //     $kindOfWorks = $tr->with('kindOfWorkDetails')->where('task_id', $taskId->id)->get();

        //     dump($kindOfWorks->kindOfWorkDetails);

        //     foreach ($kindOfWorks as $key => $kindOfWorkDetail) {
        //         // dump($kindOfWorkDetail->kindOfWorkDetails);

        //         $prices = $kindOfWorkDetail->kindOfWorkDetails;


        //         // dump($prices->sum('total_mc_price'));

        //         foreach ($prices as $key => $price) {
        //             $sumTotalMcPrice += $price->total_mc_price;
        //         }
        //     }
        // }


        // melakukan perhitungan persen
        $percentage = [];

        foreach ($taskReport as $tr) {
            foreach ($tr->kindOfWorkDetails as $kindOfWorkDetail) {
                $percentage = ($kindOfWorkDetail->total_mc_price / $sumTotalMcPrice) * 100;

                $kindOfWorkDetail->update([
                    'work_value' => number_format($percentage, 2)
                ]);
            }
        }

        return to_route('show.task.report.admin', $task_id->kindOfWork->task_id)->with('success', 'Berhasil');
    }

    public function uploadProgressPicture(Request $request)
    {
        // folder menyimpan picture
        $destinationPath = 'Progress Picture/' . $request->date . '/';

        // penamaan picture yang disimpan
        $picture = $request->picture->getClientOriginalName();

        // menyimpan picture ke destinasi dengan nama yang telah ditentukan
        $request->picture->move($destinationPath, $picture);

        $picture = $destinationPath . $picture;

        ProgressPicture::create([
            'schedule_id' => $request->id,
            'picture' => $picture
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Foto');
    }

    public function getProgressPictures($id)
    {
        $pictures = ProgressPicture::where('schedule_id', $id)->get();

        return response()->json([
            'datas' => $pictures
        ]);
    }

    public function countPercentage($id)
    {
        $taskId = KindOfWorkDetail::with(['kindOfWork'])->where('id', $id)->first()->kindOfWork->task;

        $taskReport = TaskReport::where('id', $taskId->id)->first()->kindOfWork;

        $totalMcPrice = 0;

        $data = [];

        foreach ($taskReport as $key => $tr) {
            $kindOfWorkDetail = $tr->kindOfWorkDetails->first();

            $data[$key] = $kindOfWorkDetail;

            if ($kindOfWorkDetail->id != $id) {
                $totalMcPrice += $kindOfWorkDetail->total_mc_price;
            }
        }

        return response()->json([
            'allMcPrice' => $totalMcPrice,
        ]);
    }
}
