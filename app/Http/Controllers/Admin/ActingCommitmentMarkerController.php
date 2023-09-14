<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// PPK
class ActingCommitmentMarkerController extends Controller
{
    private $active = 'ppk';

    public function index()
    {
        $data = [
            'active' => $this->active
        ];

        return view('admin.acting-commitment-marker.index', $data);
    }
}
