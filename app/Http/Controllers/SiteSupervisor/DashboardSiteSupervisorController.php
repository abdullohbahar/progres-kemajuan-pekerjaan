<?php

namespace App\Http\Controllers\SiteSupervisor;

use App\Models\Option;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Models\SiteSupervisor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardSiteSupervisorController extends Controller
{
    public function index()
    {
        // Mendapatkan waktu saat ini
        $dateNow = now();
        $optionDate = Option::where('name', 'date-now')->first()->value;

        if ($optionDate) {
            $dateNow = $optionDate;
        } else {
            $dateNow = date('d-m-Y');
        }


        // Mencari ID Site Supervisor yang sesuai dengan user yang sedang diotorisasi
        $siteSupervisorID = SiteSupervisor::where('user_id', Auth::user()->id)->first();

        // Mencari pekerjaan aktif yang memenuhi kriteria tertentu
        $activeWorks = TaskReport::where('spk_date', '<=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%');

        // Memeriksa apakah ada pekerjaan aktif dengan Site Supervisor ID 1
        if ($activeWorks->where('site_supervisor_id_1', $siteSupervisorID->id)->count() > 0) {
            $activeWorks = $activeWorks->where('site_supervisor_id_1', $siteSupervisorID->id)->get();
        } else {
            // Jika tidak ada pekerjaan aktif dengan Site Supervisor ID 1, mencari dengan Site Supervisor ID 2
            $activeWorks = TaskReport::where('spk_date', '<=', $dateNow)
                ->where('status', 'not like', '%SP%')
                ->where('status', 'not like', '%SC%')
                ->where('site_supervisor_id_2', $siteSupervisorID->id)->get();
        }

        // Mencari pekerjaan tidak aktif yang memenuhi kriteria tertentu
        $inactiveWorks = TaskReport::where('spk_date', '>=', $dateNow)
            ->where('status', 'not like', '%SP%')
            ->where('status', 'not like', '%SC%');

        // Memeriksa apakah ada pekerjaan tidak aktif dengan Site Supervisor ID 1
        if ($inactiveWorks->where('site_supervisor_id_1', $siteSupervisorID->id)->count() > 0) {
            $inactiveWorks = $inactiveWorks->where('site_supervisor_id_1', $siteSupervisorID->id)->get();
        } else {
            // Jika tidak ada pekerjaan tidak aktif dengan Site Supervisor ID 1, mencari dengan Site Supervisor ID 2
            $inactiveWorks = TaskReport::where('spk_date', '>=', $dateNow)
                ->where('status', 'not like', '%SP%')
                ->where('status', 'not like', '%SC%')
                ->where('site_supervisor_id_2', $siteSupervisorID->id)->get();
        }

        // Mencari pekerjaan dengan status SP (Site Plan)
        $spWorks = TaskReport::where('status', 'like', '%SP%')->orWhere('status', 'like', '%SC%');

        // Memeriksa apakah ada pekerjaan SP dengan Site Supervisor ID 1
        if ($spWorks->where('site_supervisor_id_1', $siteSupervisorID->id)->count() > 0) {
            $spWorks = $spWorks->where('site_supervisor_id_1', $siteSupervisorID->id)->get();
        } else {
            // Jika tidak ada pekerjaan SP dengan Site Supervisor ID 1, mencari dengan Site Supervisor ID 2
            $spWorks = TaskReport::where('status', 'like', '%SP%')
                ->orWhere('status', 'like', '%SC%')
                ->where('site_supervisor_id_2', $siteSupervisorID->id)
                ->get();
        }


        $data = [
            'active' => 'dashboard',
            'activeWorks' => $activeWorks,
            'inactiveWorks' => $inactiveWorks,
            'spWorks' => $spWorks,
        ];

        return view('site-supervisor.dashboard.index', $data);
    }
}
