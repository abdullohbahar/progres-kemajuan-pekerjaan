<?php

namespace App\Http\Controllers\SupervisingConsultant;

use Carbon\Carbon;
use App\Models\TimeSchedule;
use Illuminate\Http\Request;
use App\Models\KindOfWorkDetail;
use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\TimeScheduleHistory;

class TimeScheduleSupervisingConsultantController extends Controller
{
    private $active = 'task-report';

    public function create($kindOfWorkDetailId)
    {
        $kindOfWorkDetail = KindOfWorkDetail::with(['kindOfWork', 'timeSchedules'])->findorfail($kindOfWorkDetailId);

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
            $dateNow = strtotime($optionDate);
        } else {
            $dateNow = strtotime(date('d-m-Y'));
        }

        $data = [
            'active' => $this->active,
            'groupedDates' => $groupedDates,
            'kindOfWorkDetail' => $kindOfWorkDetail,
            'dateNow' => $dateNow
        ];

        return view('supervising_consultant.time-schedule.create', $data);
    }

    public function update(Request $request, $kindOfWorkDetailId)
    {
        $timeSchedule = TimeSchedule::where('kind_of_work_detail_id', $kindOfWorkDetailId)->get();


        if ($timeSchedule->count() <= 0) {
            foreach ($request->week as $key => $week) {
                TimeSchedule::create([
                    'kind_of_work_detail_id' => $kindOfWorkDetailId,
                    'week' => $request->week[$key],
                    'date' => $request->date[$key],
                    'progress' => $request->progress[$key] ?? '',
                ]);
            }
        } else {
            foreach ($request->week as $key => $week) {
                // lakukan pengecekan apakah status sudah mulai aktif atau belum
                $spkDate = TimeSchedule::with('kindOfWorkDetail.kindOfWork.task')
                    ->where('kind_of_work_detail_id', $kindOfWorkDetailId)
                    ->first()
                    ?->kindOfWorkDetail
                    ->kindOfWork
                    ->task
                    ->spk_date;

                // menambahkan 4 hari kedepan
                $addDays = Carbon::parse($spkDate)->addDays(4)->format('Y-m-d');

                // jika aktif maka simpan perubahan ke history
                if ($addDays <= now()) {
                    // melakukan pengecekan apakah data yang lama sama dengan data yang baru,
                    // jika tidak sama maka simpan data lama ke histroy
                    // Get Task Report ID
                    $taskReportID = KindOfWorkDetail::with('kindOfWork')
                        ->where('id', $kindOfWorkDetailId)
                        ->first()
                        ->kindOfWork->task_id;

                    if ($request->oldProgress[$key] != $request->progress[$key]) {
                        TimeScheduleHistory::create([
                            'kind_of_work_detail_id' => $kindOfWorkDetailId,
                            'task_report_id' => $taskReportID,
                            'week' => $request->week[$key],
                            'from' => $request->oldProgress[$key],
                            'to' => $request->progress[$key]
                        ]);
                    }
                }


                // Simpan data terbaru ke database
                TimeSchedule::where('kind_of_work_detail_id', $kindOfWorkDetailId)
                    ->where('week', $request->week[$key])
                    ->update([
                        'progress' => $request->progress[$key] ?? 0,
                    ]);
            }
        }

        // get task report id
        $taskReportID = KindOfWorkDetail::where('id', $kindOfWorkDetailId)->first();

        return to_route('show.task.report.supervising.consultant', $taskReportID->kindOfWork->task_id)->with('success', 'Berhasil Menambah Time Schedule');
    }
}
