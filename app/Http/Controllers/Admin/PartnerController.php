<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    private $active = 'partner';

    public function index()
    {
        $data = [
            'active' => $this->active,
        ];

        return view('admin.partner.index', $data);
    }
}
