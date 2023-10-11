<?php

namespace App\Http\Controllers\Partner;

use App\Models\Partner;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardPartnerController extends Controller
{
    public function index()
    {
        $dateNow = now();

        $partnerID = Partner::where('user_id', Auth::user()->id)->first();

        $activeWorks = TaskReport::where('spk_date', '<=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%')
            ->where('partner_id', $partnerID->id)
            ->get();

        $inactiveWorks = TaskReport::where('spk_date', '>=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%')
            ->where('partner_id', $partnerID->id)
            ->get();

        $spWorks = TaskReport::where('status', 'like', '%SP%')
            ->where('partner_id', $partnerID->id)
            ->get();

        $data = [
            'active' => 'dashboard',
            'activeWorks' => $activeWorks,
            'inactiveWorks' => $inactiveWorks,
            'spWorks' => $spWorks,
        ];

        return view('partner.dashboard.index', $data);
    }
}
