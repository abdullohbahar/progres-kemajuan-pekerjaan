<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgreementController extends Controller
{
    public function agree($scheduleID)
    {
        $role = Auth::user()->role;

        if ($role == 'Partner') {
            $officer = 'Partner';
        }

        $data = Agreement::create([
            'schedule_id' => $scheduleID,
            'user_id' => Auth::user()->id,
            'status' => 'Setujui',
            'officer' => $officer
        ]);

        return response()->json([
            'status' => 200,
            'data' => $data,
            'message' => 'Berhasil menyetujui'
        ]);
    }
}
