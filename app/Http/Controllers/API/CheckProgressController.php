<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DryHistory;
use App\Models\Machine;
use App\Models\MachineLog;
use Illuminate\Http\Request;

class CheckProgressController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Machine $machine)
    {
        $dry = DryHistory::where('machine_id', $machine -> id)
            ->where('finish', false)
            ->orderBy('created_at', 'DESC')
            ->first();
        
        if ($dry == null) {
            return response([
                "weight" => 0,
                "percent" => 100
            ], 200);
        }

        $target = $dry -> assign_weight * (30/100);
        $current = $dry -> assign_weight; 
        $range = $current - $target; 
        $ratio = 100 / $range; 
        // $log = MachineLog::where('machine_id', $machine->id)
        //     ->orderBy('created_at', 'DESC')
        //     ->first();

        $log = MachineLog::where([
            ['machine_id', $machine->id], 
            ['created_at', '>=', $dry -> created_at]
        ])
        ->orderBy('created_at', 'DESC')
        ->first();

        if ($log == null) {
            return response([
                "weight" => 0,
                "percent" => 100
            ], 200);
        }
        // $percent = ($log -> weight / $dry -> assign_weight) * 100;
        $percent = ($current - $log -> weight) * $ratio;
        return response([
            "weight" => $dry -> assign_weight,
            "current_weight" => $log -> weight,
            "percent" => (int)$percent
        ], 200);
    }
}
