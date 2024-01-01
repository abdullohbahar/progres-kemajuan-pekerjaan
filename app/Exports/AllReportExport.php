<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\TaskReport;
use App\Models\SiteSupervisor;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AllReportExport implements FromView, WithEvents
{
    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $id = $this->id;

        $taskReport = TaskReport::with('kindOfWork.kindOfWorkDetails.timeSchedules')->findorfail($id);

        $kindOfWorkDetails = $taskReport->kindOfWork->first()->kindOfWorkDetails;

        $schedules = $kindOfWorkDetails->first()->schedules;

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

        $ppk = $taskReport->actingCommitmentMarker;
        $siteSupervisor1 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_1)->first();
        $siteSupervisor2 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_2)->first();
        $siteSupervisor3 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_3)->first();
        $partner = $taskReport->partner;
        $supervisingConsultant = $taskReport->supervisingConsultant;

        $lastDateOfWeek = Carbon::now();
        $formattedlastDateOfWeek = $lastDateOfWeek->isoFormat('D MMMM Y');

        $data = [
            'taskReport' => $taskReport,
            'schedules' => $schedules,
            'kindOfWorkDetails' => $kindOfWorkDetails,
            'cumulativeTimeSchedules' => $cumulativeTimeSchedules,
            'ppk' => $ppk,
            'siteSupervisor1' => $siteSupervisor1,
            'siteSupervisor2' => $siteSupervisor2,
            'siteSupervisor3' => $siteSupervisor3,
            'partner' => $partner,
            'supervisingConsultant' => $supervisingConsultant,
            'formattedlastDateOfWeek' => $formattedlastDateOfWeek,
        ];

        return view('export.all-report-excel', $data);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Here, you can define which cells to merge.
                // For example, merging cells from A1 to D1:
                $event->sheet->mergeCells('A1:B1');
                // $event->sheet->mergeCells('A2:D2');
                // $event->sheet->mergeCells('A3:D3');
                // $event->sheet->mergeCells('A4:D4');
                // $event->sheet->mergeCells('A5:D5');
                // $event->sheet->mergeCells('A6:D6');
                // $event->sheet->mergeCells('A7:D7');

                foreach (range('A', 'Z') as $column) {
                    $event->sheet->getColumnDimension($column)->setAutoSize(true);
                }

                // Get the highest row number (last row)
                $highestRow = $event->sheet->getDelegate()->getHighestDataRow();

                for ($row = 1; $row < $highestRow; $row++) {
                    $event->sheet->getDelegate()->getRowDimension($row)->setRowHeight(20);
                }

                // Set row height for the last row to 50 units
                for ($row = 1; $row <= $highestRow; $row++) {
                    if ($row == $highestRow) { // Check if it's the last row
                        $event->sheet->getDelegate()->getRowDimension($row)->setRowHeight(150);
                    }
                }
            },
        ];
    }
}
