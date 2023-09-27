<?php

namespace App\Http\Controllers\SupervisingConsultant;

use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SupervisingConsultant;
use Illuminate\Support\Facades\Auth;

class DashboardSupervisingConsultantController extends Controller
{
    public function index()
    {
        $dateNow = now();

        $supervisingConsultantID = SupervisingConsultant::where('user_id', Auth::user()->id)->first();

        $activeWorks = TaskReport::where('spk_date', '<=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%')
            ->where('supervising_consultant_id', $supervisingConsultantID->id)
            ->get();

        $inactiveWorks = TaskReport::where('spk_date', '>=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%')
            ->where('supervising_consultant_id', $supervisingConsultantID->id)
            ->get();

        $spWorks = TaskReport::where('status', 'like', '%SP%')
            ->where('supervising_consultant_id', $supervisingConsultantID->id)
            ->get();

        $data = [
            'active' => 'dashboard',
            'activeWorks' => $activeWorks,
            'inactiveWorks' => $inactiveWorks,
            'spWorks' => $spWorks,
        ];

        return view('supervising_consultant.dashboard.index', $data);
    }
}
