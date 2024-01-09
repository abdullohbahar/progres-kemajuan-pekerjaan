<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\TaskReport;
use App\Models\SiteSupervisor;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;

class WeeklyReportExport implements FromView, WithEvents
{
    protected $id;
    protected $week;

    function __construct($id, $week)
    {
        $this->id = $id;
        $this->week = $week;
    }

    public function view(): View
    {
        $taskReport = TaskReport::with('kindOfWork', 'actingCommitmentMarker', 'partner.cvConsultant')
            ->findorfail($this->id);

        $taskReportController = new TaskReportSupervisingConsultantController();

        $groupedDates = $taskReportController->getGroupedDates($taskReport);

        $kindOfWorkDetails = $taskReport->kindOfWork->first()->kindOfWorkDetails;

        $ppk = $taskReport->actingCommitmentMarker;
        $siteSupervisor1 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_1)->first();
        $siteSupervisor2 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_2)->first();
        $siteSupervisor3 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_3)->first();
        $partner = $taskReport->partner;
        $supervisingConsultant = $taskReport->supervisingConsultant;

        $firstDateOfWeek = Carbon::createFromFormat('d-m-Y', current($groupedDates[$this->week - 1]));
        $formattedfirstDateOfWeek = $firstDateOfWeek->isoFormat('D MMMM Y');

        $lastDateOfWeek = Carbon::createFromFormat('d-m-Y', end($groupedDates[$this->week - 1]));
        $formattedlastDateOfWeek = $lastDateOfWeek->isoFormat('D MMMM Y');

        $agreementDate = Carbon::createFromFormat('Y-m-d', $taskReport->spk_date);
        $formattedAgreementDate = $lastDateOfWeek->isoFormat('D MMMM Y');

        $data = [
            'taskReport' => $taskReport,
            'kindOfWorkDetails' => $kindOfWorkDetails,
            'week' => $this->week,
            'ppk' => $ppk,
            'siteSupervisor1' => $siteSupervisor1,
            'siteSupervisor2' => $siteSupervisor2,
            'siteSupervisor3' => $siteSupervisor3,
            'partner' => $partner,
            'supervisingConsultant' => $supervisingConsultant,
            'firstDayOfWeek' => current($groupedDates[$this->week - 1]),
            'lastDateOfWeek' => end($groupedDates[$this->week - 1]),
            'formattedlastDateOfWeek' => $formattedlastDateOfWeek,
            'formattedfirstDateOfWeek' => $formattedfirstDateOfWeek,
            'formattedAgreementDate' => $formattedAgreementDate,
            'spelledNumber' => $this->spelledNumber($this->week)
        ];
        return view('export.weekly-report-excel', $data);

        // return view('admin.task-report.weekly-report', $data);
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

    public function spelledNumber($angka)
    {
        $angka = abs($angka);
        $spelledNumber = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];

        if ($angka < 12) {
            return $spelledNumber[$angka];
        } elseif ($angka < 20) {
            return $this->spelledNumber($angka - 10) . " Belas";
        } elseif ($angka < 100) {
            return $this->spelledNumber($angka / 10) . " Puluh " . $this->spelledNumber($angka % 10);
        } elseif ($angka < 200) {
            return "Seratus " . $this->spelledNumber($angka - 100);
        } elseif ($angka < 1000) {
            return $this->spelledNumber($angka / 100) . " Ratus " . $this->spelledNumber($angka % 100);
        } elseif ($angka < 2000) {
            return "Seribu " . $this->spelledNumber($angka - 1000);
        } elseif ($angka < 1000000) {
            return $this->spelledNumber($angka / 1000) . " Ribu " . $this->spelledNumber($angka % 1000);
        } elseif ($angka < 1000000000) {
            return $this->spelledNumber($angka / 1000000) . " Juta " . $this->spelledNumber($angka % 1000000);
        } else {
            return "Angka terlalu besar untuk diubah menjadi terbilang.";
        }
    }
}
