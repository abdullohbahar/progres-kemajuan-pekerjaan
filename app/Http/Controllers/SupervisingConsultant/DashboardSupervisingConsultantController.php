<?php

namespace App\Http\Controllers\SupervisingConsultant;

use App\Models\Option;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\SupervisingConsultant;

class DashboardSupervisingConsultantController extends Controller
{
    public function index()
    {
        $dateNow = now();
        $dateNow = now();
        $optionDate = Option::where('name', 'date-now')->first()->value;

        if ($optionDate) {
            $dateNow = $optionDate;
        } else {
            $dateNow = date('d-m-Y');
        }

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
