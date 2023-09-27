<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaskReport;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $dateNow = now();
        $activeWorks = TaskReport::where('spk_date', '<=', $dateNow)->where('status', 'not like', '%SP%')->where('status', 'not like', '%SC%')->get();
        $inactiveWorks = TaskReport::where('spk_date', '>=', $dateNow)->where('status', 'not like', '%SP%')->where('status', 'not like', '%SC%')->get();
        $spWorks = TaskReport::where('status', 'like', '%SP%')->get();

        $data = [
            'active' => 'dashboard',
            'activeWorks' => $activeWorks,
            'inactiveWorks' => $inactiveWorks,
            'spWorks' => $spWorks,
        ];

        return view('admin.dashboard.index', $data);
    }
}
