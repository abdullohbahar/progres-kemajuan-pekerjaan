<?php

namespace App\Http\Controllers;

use App\Models\TaskReport;
use Illuminate\Http\Request;

class TerminateContractController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($taskReportID)
    {
        TaskReport::findorfail($taskReportID)->update([
            'contract_terminated' => 1
        ]);

        return response()->json([
            'status' => 200,
            'message' => "Berhasil memutus kontrak"
        ]);
    }
}
