<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteSupervisorController extends Controller
{
    private $active = 'site-supervisor';

    public function index()
    {
        $data = [
            'active' => $this->active
        ];

        return view('admin.site-supervisor.index', $data);
    }
}
