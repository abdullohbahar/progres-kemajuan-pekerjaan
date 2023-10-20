<?php

namespace App\Http\Controllers;

use App\Models\KindOfWorkDetail;
use App\Models\Partner;
use App\Models\SiteSupervisor;
use App\Models\SupervisingConsultant;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendMessageController extends Controller
{
    public function sendMessageToPartner($kindOfWorkDetailId)
    {
        // cari data task report seusai macam pekerjaan id
        $taskReport = KindOfWorkDetail::where('id', $kindOfWorkDetailId)
            ->with('kindOfWork')
            ->first()
            ->kindOfWork()
            ->with('task')
            ->first();

        $partner = $taskReport->task->with('partner')->first()->partner;

        $supervisingConsultant = SupervisingConsultant::where('user_id', Auth::user()->id)->first();

        $taskName = $taskReport->task->task_name;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $partner->phone_number, // nomer hp Rekanan
                'message' => "*$supervisingConsultant->name (Konsultan Pengawas)* Telah melakukan input progress mingguan untuk pekerjaan *$taskName* \nHarap melakukan pengecekan dan melakukan persetujuan. \nJika tidak dilakukan pengecekan dan persetujuan selama *2x24 Jam*, progress otomatis disetujui dan akan diteruskan ke pengawas lapangan \n ",
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 2Ap5o4gaEsJrHmNuhLDH' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }

    public function sendMessageToSiteSupervisor($kindOfWorkDetailId)
    {
        // cari data task report seusai macam pekerjaan id
        $taskReport = KindOfWorkDetail::where('id', $kindOfWorkDetailId)
            ->with('kindOfWork')
            ->first()
            ->kindOfWork()
            ->with('task')
            ->first();

        $siteSupervisor = SiteSupervisor::where('id', $taskReport->task->site_supervisor_id_1)->first();

        $partner = Partner::where('user_id', Auth::user()->id)->first();

        $taskName = $taskReport->task->task_name;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $siteSupervisor->phone_number, // nomer hp Rekanan
                'message' => "*$partner->name (Rekanan)* Telah melakukan input progress mingguan untuk pekerjaan *$taskName* \nHarap melakukan pengecekan dan melakukan persetujuan. \nJika tidak dilakukan pengecekan dan persetujuan selama *1x24 Jam*, progress otomatis disetujui dan akan diteruskan ke pengawas lapangan \n ",
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 2Ap5o4gaEsJrHmNuhLDH' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }

    public function sendMessageGotSP($taskReportID)
    {
        // cari data task report
        $taskReport = TaskReport::where('id', $taskReportID)->first();

        $partner = Partner::where('id', $taskReport->partner_id)->first();
        $supervisingConsultant = SupervisingConsultant::where('id', $taskReport->supervising_consultant_id)->first();


        $taskName = $taskReport->task_name;
        $status = $taskReport->status;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $partner->phone_number . ',' . $supervisingConsultant->phone_number, // nomer hp Rekanan
                'message' => "Pekerjaan *$taskName* Mendapat *$status*, Harap Untuk Melengkapi Pekerjaan Di Minggu Depan",
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 2Ap5o4gaEsJrHmNuhLDH' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }

    public function sendMessageTaskReportConfirmation($taskReportID)
    {
        // cari data task report
        $taskReport = TaskReport::where('id', $taskReportID)->first();

        $supervisingConsultant = SupervisingConsultant::where('id', $taskReport->supervising_consultant_id)->first();
        $partner = Partner::where('id', $taskReport->partner_id)->first();
        $siteSupervisor1 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_1)->first();
        $siteSupervisor2 = SiteSupervisor::where('id', $taskReport->site_supervisor_id_2)->first();


        $taskName = $taskReport->task_name;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $partner->phone_number . ',' . $supervisingConsultant->phone_number . ',' . $siteSupervisor1->phone_number . ',' . $siteSupervisor2->phone_number, // nomer hp Rekanan
                'message' => "Admin Telah Melakukan Input Data Pekerjaan *$taskName*. Harap Lakukan Pengecekan. Jika selama 2x24 jam anda tidak melakukan konfirmasi maka anda dinyatakan setuju dengan data yang ada",
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 2Ap5o4gaEsJrHmNuhLDH' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }
}
