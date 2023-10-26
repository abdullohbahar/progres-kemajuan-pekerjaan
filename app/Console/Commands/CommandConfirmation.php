<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Option;
use App\Models\TaskReport;
use Illuminate\Console\Command;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;

class CommandConfirmation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:confirmation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automate Confirm Agreement Task and Weekly Reprort';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $optionCron = Option::where('name', 'cron')->first()?->value;

        if ($optionCron == 1) {
            $taskReports = TaskReport::with('agreementTaskReport', 'agreement', 'kindOfWork.kindOfWorkDetails.schedules')->get();

            $optionDate = Option::where('name', 'date-now')->first()?->value;

            $taskReportController = new TaskReportSupervisingConsultantController();

            // Loop melalui setiap laporan tugas.
            foreach ($taskReports as $taskReport) {
                $getWeek = $taskReportController->getWeek($taskReport);

                // Konversi tanggal SPK menjadi objek Carbon.
                $dateSpk = Carbon::parse($taskReport->spk_date);

                // Jika ada "tanggal saat ini" yang diambil dari "Option", konversi menjadi objek Carbon.
                // Jika tidak ada, gunakan "tanggal saat ini" dari waktu sekarang.
                if ($optionDate) {
                    $dateNow = Carbon::parse($optionDate);
                } else {
                    $dateNow = Carbon::now();
                }

                // Hitung selisih (dalam hari) antara "tanggal saat ini" dan "tanggal SPK".
                $dateDiff = $dateNow->diffInDays($dateSpk);


                if ($dateDiff > 2) {
                    $taskReport->update(['is_agree' => '1']);
                }

                // lakukan update agreement
                foreach ($taskReport->agreement as $agreement) {
                    if ($agreement->role == 'Partner') {
                        $dateDiffToPartner = $dateNow->diffInDays($agreement->created_at);
                        if ($dateDiffToPartner > 2) {
                            $agreement->update([
                                'role' => 'Site Supervisor',
                                'status' => 'Disetujui Rekanan'
                            ]);
                        }
                    } else if ($agreement->role == 'Site Supervisor') {
                        $dateDiffToPPK = $dateNow->diffInDays($agreement->created_at);
                        if ($dateDiffToPPK > 1) {
                            $agreement->update([
                                'role' => 'Acting Commitment Marker',
                                'status' => 'Disetujui Pengawas Lapangan 2'
                            ]);

                            foreach ($taskReport->kindOfWork as $kindOfWork) {
                                foreach ($kindOfWork->kindOfWorkDetails as $kindOfWorkDetail) {
                                    foreach ($kindOfWorkDetail->schedules as $schedule) {
                                        // $schedule->update()
                                        $schedule->where('progress', '!=', 0)->where('week', $getWeek)->update([
                                            'is_site_supervisor_agree' => '1'
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            info("Cron Job running at 2 " . now());
        }
    }
}
