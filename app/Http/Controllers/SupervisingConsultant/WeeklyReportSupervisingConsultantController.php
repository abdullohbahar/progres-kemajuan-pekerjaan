<?php

namespace App\Http\Controllers\SupervisingConsultant;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\KindOfWorkDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SendMessageController;

class WeeklyReportSupervisingConsultantController extends Controller
{
    private $active = 'task-report';

    // kelola kemajuan pekerjaan
    public function manageWeeklyProgress($id)
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
            $dates[] = date('d-m-Y', strtotime($current_date));

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

        return view('supervising_consultant.weekly-progress.manage-work-progress', $data);
    }


    public function updateProgress(Request $request, $kindOfWorkDetailId)
    {
        $schedule = Schedule::where('kind_of_work_detail_id', $kindOfWorkDetailId)->get();

        if ($schedule->count() <= 0) {
            foreach ($request->week as $key => $week) {
                $progress = str_replace('%', '', $request->progress[$key]);

                Schedule::create([
                    'kind_of_work_detail_id' => $kindOfWorkDetailId,
                    'week' => $request->week[$key],
                    'date' => $request->date[$key],
                    'progress' => $progress,
                ]);
            }
        } else {
            foreach ($request->week as $key => $week) {
                $progress = str_replace('%', '', $request->progress[$key]);

                Schedule::where('kind_of_work_detail_id', $kindOfWorkDetailId)
                    ->where('week', $request->week[$key])
                    ->update([
                        'progress' => $progress,
                    ]);
            }
        }

        // get task report id
        $taskReportID = KindOfWorkDetail::where('id', $kindOfWorkDetailId)->first();

        // lakukan role user
        $role = Auth::user()->role;

        // if ($role == 'Supervising Consultant') {
        //     $sendMessage = new SendMessageController();
        //     $sendMessage->sendMessageToPartner($kindOfWorkDetailId);
        // }

        return to_route('show.task.report.supervising.consultant', $taskReportID->kindOfWork->task_id)->with('success', 'Berhasil Menambah Progress Pekerjaan');
    }
}
