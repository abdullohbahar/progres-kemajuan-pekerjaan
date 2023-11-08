<?php

namespace App\Http\Controllers;

use PDF;
use Terbilang;
use Carbon\Carbon;
use App\Models\Option;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SuratSpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $taskReport = TaskReport::with('partner.cvConsultant', 'supervisingConsultant.cvConsultant')->findorfail($id);

        $option = Option::where('name', $id)->first();

        $jsonTanggalSpKeluar = json_decode($option->value);

        $tanggalSpKeluar = Carbon::createFromFormat('d-m-Y', $jsonTanggalSpKeluar->date_out);
        $formattedTanggalSPKeluar = $tanggalSpKeluar->isoFormat('D MMMM Y');

        $spWeek = $this->getWeekSPLetter($taskReport, $jsonTanggalSpKeluar->date_out);

        $groupedDates = $this->getGroupedDatesSpLetter($taskReport);

        $firstDateOfWeek = Carbon::createFromFormat('d-m-Y', current($groupedDates[$spWeek - 1]));

        $lastDateOfWeek = Carbon::createFromFormat('d-m-Y', end($groupedDates[$spWeek - 1]));

        $cumulativeTimeSchedules = $this->cumulativeTimeSchedules($id);

        $progressTillThisWeek = $this->progressTillThisWeek($id, $spWeek);

        $data = [
            'formattedTanggalSPKeluar' => $formattedTanggalSPKeluar,
            'monthOut' => Carbon::parse($tanggalSpKeluar)->format('m'),
            'yearOut' => Carbon::parse($tanggalSpKeluar)->format('Y'),
            'partnerCv' => $taskReport->partner->cvConsultant->name,
            'partnerCvAddress' => $taskReport->partner->cvConsultant->address,
            'taskReport' => $taskReport,
            'supervisingConsultantCv' => $taskReport->supervisingConsultant->cvConsultant->name,
            'supervisingConsultantName' => $taskReport->supervisingConsultant->name,
            'spWeek' => $spWeek,
            'spWeekTerbilang' => Terbilang::make($spWeek),
            'firstDateOfWeek' => Carbon::parse($firstDateOfWeek)->format('d-m-Y'),
            'lastDateOfWeek' => Carbon::parse($lastDateOfWeek)->format('d-m-Y'),
            'timeScheduleTilThisWeek' => $cumulativeTimeSchedules[$spWeek - 1],
            'progressTillThisWeek' => end($progressTillThisWeek),
            'lateProgress' => $cumulativeTimeSchedules[$spWeek - 1] - end($progressTillThisWeek)
        ];

        $pdf = PDF::loadView('surat-sp.index', $data);

        return $pdf->download("Surat SP $taskReport->task_name.pdf", $data);
        // return view('surat-sp.index', $data);
    }

    public function cumulativeTimeSchedules($id)
    {
        $timeSchedules = DB::table('task_reports')
            ->join('kind_of_works', 'kind_of_works.task_id', '=', 'task_reports.id')
            ->join('kind_of_work_details', 'kind_of_work_details.kind_of_work_id', '=', 'kind_of_works.id')
            ->join('time_schedules', 'time_schedules.kind_of_work_detail_id', '=', 'kind_of_work_details.id')
            ->select('time_schedules.week', DB::raw('SUM(time_schedules.progress) as total_progress'))
            ->where('task_reports.id', $id)
            ->groupBy('time_schedules.week')
            ->get();

        $cumulativeTimeSchedules = [];
        $total = 0;

        foreach ($timeSchedules as $value) {
            $total += $value->total_progress;
            if ($total > 100) {
                $total = 100;
            }
            $cumulativeTimeSchedules[] = $total;
        }

        return $cumulativeTimeSchedules ?? 0;
    }

    public function progressTillThisWeek($id, $week)
    {
        $schedules = DB::table('task_reports')
            ->join('kind_of_works', 'kind_of_works.task_id', '=', 'task_reports.id')
            ->join('kind_of_work_details', 'kind_of_work_details.kind_of_work_id', '=', 'kind_of_works.id')
            ->join('schedules', 'schedules.kind_of_work_detail_id', '=', 'kind_of_work_details.id')
            ->select('schedules.week', DB::raw('SUM(schedules.progress) as total_progress'))
            ->where('task_reports.id', $id)
            ->where('schedules.week', '<=', $week)
            ->groupBy('schedules.week')
            ->get();

        $cumulativeSchedules = [];
        $total = 0;

        foreach ($schedules as $value) {
            $total += $value->total_progress;
            if ($total > 100) {
                $total = 100;
            }
            $cumulativeSchedules[] = $total;
        }

        return $cumulativeSchedules ?? 0;
    }

    public function getWeekSPLetter($taskReport, $spDate)
    {
        $start_date = Carbon::parse($spDate);
        $executionTime = $taskReport->execution_time;

        $end_date = $start_date->copy()->addDays($executionTime);

        $groups = [[]];
        $date = $start_date;

        while ($date <= $end_date) {
            $day = $date->dayOfWeek;

            if ($day == 1) {
                $groups[] = [];
            }

            $groups[count($groups) - 1][] = $date->copy(); // Copy tanggal agar variabel $date tetap utuh
            $date->addDay(); // Tambahkan 1 hari langsung ke tanggal utama
        }

        $optionDate = Option::where('name', 'date-now')->first()->value;

        if ($optionDate) {
            $dateNow = Carbon::parse($optionDate)->format('d-m-Y');
        } else {
            $dateNow = date('d-m-Y');
        }

        // dd($dateNow);

        $filteredArray = array_filter($groups, function ($subArray) {
            return !empty($subArray);
        });

        $groups = array_values($filteredArray);

        // dump($groups);

        $weeks = 0;

        foreach ($groups as $week => $dates) {
            $weekNow = $week;
            foreach ($dates as $date) {
                $date = Carbon::parse($date)->format('d-m-Y');
                if ($date == $dateNow) {
                    $weeks = $weekNow + 1;
                }
            }
        }

        // dd($weeks);

        return $weeks ?? 0;
    }

    public function getGroupedDatesSpLetter($taskReport)
    {
        // menampilkan form berdasarkan jumlah minggu
        // menghitung hari per minggu
        $start_date = Carbon::parse($taskReport->spk_date)->format('Y-m-d');
        $executionTime = $taskReport->execution_time;
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

        return $groupedDates ?? 0;
    }
}
