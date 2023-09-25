<?php

namespace App\Http\Controllers;

use App\Models\KindOfWorkDetail;
use App\Models\SupervisingConsultant;
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
                'message' => "$supervisingConsultant->name Telah melakukan input progress mingguan untuk pekerjaan $taskName \nHarap melakukan pengecekan dan melakukan persetujuan. \nJika tidak dilakukan pengecekan dan persetujuan selama 2x24 Jam, progress otomatis disetujui dan akan diteruskan ke pengawas lapangan 1 \n ",
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
