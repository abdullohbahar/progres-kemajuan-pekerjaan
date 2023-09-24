<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPartnerController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'dashboard'
        ];

        return view('partner.dashboard.index', $data);
    }
}
