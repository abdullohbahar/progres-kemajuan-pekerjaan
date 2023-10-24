<?php

namespace App\Http\Controllers\ActingCommitmentMarker;

use App\Models\Option;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ActingCommitmentMarker;

class DashboardActingCommitmentMarkerController extends Controller
{
    public function index()
    {
        $dateNow = now();

        $optionDate = Option::where('name', 'date-now')->first()->value;

        if ($optionDate) {
            $dateNow = $optionDate;
        } else {
            $dateNow = date('Y-m-d');
        }

        $partnerID = ActingCommitmentMarker::where('user_id', Auth::user()->id)->first();

        $activeWorks = TaskReport::where('spk_date', '<=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%')
            ->where('acting_commitment_marker_id', $partnerID->id)
            ->get();

        $inactiveWorks = TaskReport::where('spk_date', '>=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%')
            ->where('acting_commitment_marker_id', $partnerID->id)
            ->get();

        $spWorks = TaskReport::where('status', 'like', '%SP%')
            ->where('acting_commitment_marker_id', $partnerID->id)
            ->get();

        $data = [
            'active' => 'dashboard',
            'activeWorks' => $activeWorks,
            'inactiveWorks' => $inactiveWorks,
            'spWorks' => $spWorks,
        ];

        return view('acting-commitment-marker.dashboard.index', $data);
    }
}
