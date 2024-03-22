<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use App\Models\MachineLog;
use Error;
use Illuminate\Http\Request;

class MachineLogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Machine $machine)
    {
        try {
            // $logs = Machine::where('id', $machine -> id) -> first() -> logs;
            $logs=MachineLog::where('machine_id', $machine -> id) -> orderBy('created_at', 'DESC') ->limit(20) -> get();
            return response([
                "status" => true,
                "message" => "List log mesin",
                "data" => $logs
            ], 200);
        } catch(Error $e) {
            return response([
                "status" => false,
                "message" => $e
            ], 500);
        }
    }
}
