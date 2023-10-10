<?php

namespace App\Http\Controllers\SiteSupervisor;

use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Models\SiteSupervisor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardSiteSupervisorController extends Controller
{
    public function index()
    {
        $dateNow = now();

        $siteSupervisorID = SiteSupervisor::where('user_id', Auth::user()->id)->first();

        $activeWorks = TaskReport::where('spk_date', '<=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%')
            ->where('site_supervisor_id_1', $siteSupervisorID->id)
            ->orWhere('site_supervisor_id_2', $siteSupervisorID->id)
            ->get();

        $inactiveWorks = TaskReport::where('spk_date', '>=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%')
            ->where('site_supervisor_id_1', $siteSupervisorID->id)
            ->orWhere('site_supervisor_id_2', $siteSupervisorID->id)
            ->get();

        $spWorks = TaskReport::where('status', 'like', '%SP%')
            ->where('site_supervisor_id_1', $siteSupervisorID->id)
            ->orWhere('site_supervisor_id_2', $siteSupervisorID->id)
            ->get();

        $data = [
            'active' => 'dashboard',
            'activeWorks' => $activeWorks,
            'inactiveWorks' => $inactiveWorks,
            'spWorks' => $spWorks,
        ];

        return view('site-supervisor.dashboard.index', $data);
    }
}
