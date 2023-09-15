<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSupervisor;
use Illuminate\Http\Request;
use DataTables;

class SiteSupervisorController extends Controller
{
    private $active = 'site-supervisor';

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $query = SiteSupervisor::orderBy('name', 'asc')->get();

            // return $query;
            return Datatables::of($query)
                ->make();
        }

        $data = [
            'active' => $this->active
        ];

        return view('admin.site-supervisor.index', $data);
    }
}
