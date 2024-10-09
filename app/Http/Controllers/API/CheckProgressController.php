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
                "percent" => 100
            ], 200);
        }

        $target = $dry -> assign_weight * (30/100);
        $log = MachineLog::where('machine_id', $machine->id)
            ->orderBy('created_at', 'DESC')
            ->first();
        $percent = ($log -> weight / $target) * (1/100);
        return response([
            "percent" => $percent
        ], 200);
    }
}
