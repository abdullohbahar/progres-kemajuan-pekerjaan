<?php

namespace App\Http\Controllers\SupervisingConsultant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardSupervisingConsultantController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'dashboard'
        ];

        return view('supervising_consultant.dashboard.index', $data);
    }
}
