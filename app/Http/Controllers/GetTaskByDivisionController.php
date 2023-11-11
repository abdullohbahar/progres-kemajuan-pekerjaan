<?php

namespace App\Http\Controllers;

use App\Models\TaskMasterData;
use Illuminate\Http\Request;

class GetTaskByDivisionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($divisonID)
    {
        $datas = TaskMasterData::where('division_master_data_id', $divisonID)->get();

        return response()->json([
            'datas' => $datas,
            'id' => $divisonID
        ]);
    }
}
