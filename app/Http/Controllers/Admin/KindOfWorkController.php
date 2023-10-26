<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\Unit;
use RuntimeException;
use App\Models\Option;
use App\Models\Partner;
use App\Models\Schedule;
use App\Models\McHistory;
use App\Models\KindOfWork;
use App\Models\TaskReport;
use App\Models\TimeSchedule;
use Illuminate\Http\Request;
use App\Models\ProgressPicture;
use App\Models\KindOfWorkDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Illuminate\Console\View\Components\Task;
use App\Http\Controllers\SendMessageController;

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

            Bugsnag::notifyException($e);

            return to_route('show.task.report.admin', $request->task_id)->with('success', 'Gagal Menambahkan Macam Pekerjaan');
        }
    }

    public function edit($id)
    {
        $kindOfWork = KindOfWork::with('task')->where('id', $id)->firstorfail();

        $optionDate = Option::where('name', 'date-now')->first()->value;

        if ($optionDate) {
            $dateNow = strtotime($optionDate);
        } else {
            $dateNow = strtotime(date('d-m-Y'));
        }

        $expired = $dateNow <= $kindOfWork->task->spk_date;

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

            Bugsnag::notifyException($e);

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

        $optionDate = Option::where('name', 'date-now')->first()->value;

        if ($optionDate) {
            $dateNows = strtotime($optionDate);
        } else {
            $dateNows = strtotime(date('d-m-Y'));
        }

        try {
            DB::beginTransaction();

            // mengambil task id berdasarkan kind of work detail
            $taskId = KindOfWorkDetail::with(['kindOfWork'])->where('id', $id)->first()->kindOfWork->task;

            // mengambil kind of work berdasarkan task id
            $taskReport = TaskReport::with('kindOfWork')->where('id', $taskId->id)->first()->kindOfWork;

            // Menghapus karakter sesuai dengan array yang ada di $removeChar
            // $contractUnitPrice = str_replace($removeChar, "", $request->contract_unit_price);
            // $contractTotalPrice = str_replace($removeChar, "", $request->total_contract_price);
            $mcUnitPrice = str_replace($removeChar, "", $request->mc_unit_price);
            $mcTotalPrice = str_replace($removeChar, "", $request->total_mc_price);
            $workValue = str_replace($removePercent, "", $request->work_value);
            $mcVolume = str_replace(',', '.', $request->mc_volume);

            $addDays = Carbon::parse($taskId->spk_date)->addDays(4)->format('Y-m-d');

            // jika spk date sudah aktif maka lakukan kode dibawah
            if ($addDays <= $dateNows) {
                // lakukan pengecekan apakah sudah ada mc awal atau belum
                $firstMc = McHistory::where('kind_of_work_detail_id', $id)
                    ->where('task_report_id', $taskId->id)
                    ->where('total_mc', 'Awal');

                // jika tidak ada maka lakukan penyimpanan semua mc awal ke database
                if ($firstMc->count() <= 0) {
                    foreach ($taskReport as $kindOfWork) {
                        foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetail) {
                            McHistory::create([
                                'mc_volume' => $kindOfWorkDetail->mc_volume,
                                'mc_unit' => $kindOfWorkDetail->mc_unit,
                                'mc_unit_price' => $kindOfWorkDetail->mc_unit_price,
                                'total_mc_price' => $kindOfWorkDetail->total_mc_price,
                                'work_value' => $kindOfWorkDetail->work_value,
                                'total_mc' => 'Awal',
                                'kind_of_work_detail_id' => $kindOfWorkDetail->id,
                                'task_report_id' => $taskId->id,
                            ]);
                        }
                    }
                }
            }

            // update kind of work
            KindOfWorkDetail::where('id', $id)->update([
                // 'contract_volume' => $request->contract_volume,
                // 'contract_unit' => $request->contract_unit,
                // 'contract_unit_price' => $contractUnitPrice,
                // 'total_contract_price' => $contractTotalPrice,
                'mc_volume' => $mcVolume,
                'mc_unit' => $request->mc_unit,
                'mc_unit_price' => $mcUnitPrice,
                'total_mc_price' => $mcTotalPrice,
                'work_value' => $workValue,
            ]);

            // get total price
            $sumTotalMcPrice = DB::table('kind_of_works')
                ->join('kind_of_work_details', 'kind_of_work_details.kind_of_work_id', '=', 'kind_of_works.id')
                ->where('kind_of_works.task_id', $taskId->id)
                ->groupBy('kind_of_works.id')
                ->selectRaw('SUM(kind_of_work_details.total_mc_price) as total')
                ->get()
                ->sum('total');

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

            if ($addDays <= $dateNows) {
                // lakukan perhitungan total mc
                $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.schedules')->where('id', $taskId->id)->first();

                $totalProgress = 0;

                foreach ($taskReport->kindOfWork as $kindOfWork) {
                    foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetail) {
                        $totalProgress += $kindOfWorkDetail->schedules->sum('progress');
                    }
                }

                $totalMc = round($this->roundMc($totalProgress));

                // McHistory::create([
                //     'task_report_id' => $taskId->id,
                //     'kind_of_work_detail_id' => $id,
                //     'total_mc' => round($this->roundMc($totalProgress)),
                //     'mc_volume' => $request->oldMcVolume,
                //     'mc_unit' => $request->oldMcUnit,
                //     'mc_unit_price' => $request->oldMcUnitPrice,
                //     'total_mc_price' => $request->oldTotalMcPrice,
                //     'work_value' => $request->oldWorkValue
                // ]);

                // melakukan pengecekan apakah nama pekerjaan dan mc yang sesuai sudah ada atau belum
                $mcHistory = McHistory::where('kind_of_work_detail_id', $id)
                    ->where('task_report_id', $taskId->id)
                    ->where('total_mc', $totalMc);

                if ($mcHistory->count() <= 0) {
                    McHistory::create([
                        'mc_volume' => $mcVolume,
                        'mc_unit' => $request->mc_unit,
                        'mc_unit_price' => $mcUnitPrice,
                        'total_mc_price' => $mcTotalPrice,
                        'work_value' => $workValue,
                        'total_mc' => $totalMc,
                        'kind_of_work_detail_id' => $id,
                        'task_report_id' => $taskId->id,
                    ]);

                    foreach ($taskReport->kindOfWork as $kindOfWork) {
                        foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetail) {
                            if ($kindOfWorkDetail->id != $id) {
                                McHistory::create([
                                    'mc_volume' => $kindOfWorkDetail->mc_volume,
                                    'mc_unit' => $kindOfWorkDetail->mc_unit,
                                    'mc_unit_price' => $kindOfWorkDetail->mc_unit_price,
                                    'total_mc_price' => $kindOfWorkDetail->total_mc_price ?? 0,
                                    'work_value' => $kindOfWorkDetail->work_value,
                                    'total_mc' => $totalMc,
                                    'kind_of_work_detail_id' => $kindOfWorkDetail->id,
                                    'task_report_id' => $taskId->id,
                                ]);
                            }
                        }
                    }
                } else {
                    $mcHistory->update([
                        'mc_volume' => $mcVolume,
                        'mc_unit' => $request->mc_unit,
                        'mc_unit_price' => $mcUnitPrice,
                        'total_mc_price' => $mcTotalPrice,
                        'work_value' => $workValue,
                        'total_mc' => $totalMc,
                    ]);
                }
            }

            DB::commit();

            return to_route('show.task.report.admin', $task_id->kindOfWork->task_id)->with('success', 'Berhasil');
        } catch (Exception $e) {
            DB::rollBack();

            Bugsnag::notifyException($e);

            return to_route('show.task.report.admin', $task_id->kindOfWork->task_id)->with('failed', 'Gagal');
        }
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
            'picture' => $picture,
            'week' => $request->week,
        ]);

        return redirect()->back()->with('success', 'Berhasil Menambah Foto');
    }

    public function getProgressPictures($id)
    {
        $pictures = ProgressPicture::where('schedule_id', $id)->get();

        return response()->json([
            'datas' => $pictures,
        ]);
    }

    public function getProgressPicturesOtherRole($kindOfWorkDetailID, $week)
    {
        // $pictures = ProgressPicture::where('schedule_id', $id)->get();
        $schedules = Schedule::with('progressPictures')->where('kind_of_work_detail_id', $kindOfWorkDetailID)
            ->where('week', $week)
            ->get();

        // dd($schedules);

        $pictures = [];

        foreach ($schedules as $key => $schedule) {
            $pictures[$key] = ProgressPicture::where('schedule_id', $schedule->id)->get();
        }

        return response()->json([
            'datas' => $pictures,
        ]);
    }

    public function removeProgressPictures($id)
    {
        ProgressPicture::destroy($id);

        return response()->json([
            'status' => 200,
            'message' => "Berhasil menghapus foto"
        ]);
    }

    public function countPercentage($id)
    {
        $taskId = KindOfWorkDetail::with(['kindOfWork'])->where('id', $id)->first()->kindOfWork->task;

        // get total price
        $sumTotalMcPrice = DB::table('kind_of_works')
            ->join('kind_of_work_details', 'kind_of_work_details.kind_of_work_id', '=', 'kind_of_works.id')
            ->where('kind_of_works.task_id', $taskId->id)
            ->where('kind_of_work_details.id', '!=', $id)
            ->groupBy('kind_of_works.id')
            ->selectRaw('SUM(kind_of_work_details.total_mc_price) as total')
            ->get()
            ->sum('total');

        return response()->json([
            'allMcPrice' => $sumTotalMcPrice,
        ]);
    }

    public function roundMc($mc)
    {
        if (is_float($mc) && $mc <= 0.999) {
            return 0;
        }

        // Dapatkan digit satuan dari total MC
        $satuan = $mc % 10;

        // Tentukan total MC pembulatan berdasarkan digit satuan
        if ($satuan > 5) {
            return ceil($mc / 10) * 10; // Pembulatan ke atas ke puluhan terdekat
        } else {
            return floor($mc / 10) * 10; // Pembulatan ke bawah ke puluhan terdekat
        }
    }

    public function countTotalProgressBeforeThisWeek($kindOfWorkDetailID)
    {
        $kindOfWorkDetail = KindOfWorkDetail::with('kindOfWork')->findorfail($kindOfWorkDetailID);

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
            $dates[] = date('d-m-Y', strtotime($current_date));

            // Menambahkan 1 hari ke tanggal saat ini
            $current_date = date('Y-m-d', strtotime($current_date . " + 1 day"));
        }

        // Memecah array ke dalam grup-grup 7 hari
        $groupedDates = array_chunk($dates, 7);

        $optionDate = Option::where('name', 'date-now')->first()->value;

        if ($optionDate) {
            $dateNow = Carbon::parse($optionDate)->format('d-m-Y');
        } else {
            $dateNow = date('d-m-Y');
        }


        foreach ($groupedDates as $key => $date) {
            if (in_array($dateNow, $date)) {
                $weekNow = $key + 1;
                break;
            } else {
                $weekNow = '';
            }
        }

        if ($weekNow) {
            $progress = Schedule::where('kind_of_work_detail_id', $kindOfWorkDetailID)->where('week', '<=', $weekNow)->sum('progress');
        } else {
            $progress = 0;
        }

        return response()->json([
            'status' => 200,
            'data' => $progress
        ]);
    }

    public function destroyKindOfWork($id)
    {
        KindOfWork::destroy($id);

        return response()->json([
            'status' => 200,
        ]);
    }
}
