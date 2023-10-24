<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $dateNow = now();
        $optionDate = Option::where('name', 'date-now')->first()->value;

        if ($optionDate) {
            $dateNow = $optionDate;
        } else {
            $dateNow = date('d-m-Y');
        }

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
