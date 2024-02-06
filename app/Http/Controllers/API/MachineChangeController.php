<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use App\Models\MachineLog;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MachineChangeController extends Controller
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
            $validator = Validator::make($request -> all(), [
                "light" => "required",
                "temp" => "required",
                "humid" => "required",
                "weight" => "required"
            ]);

            if ($validator -> fails()) {
                return response([
                    "status" => false,
                    "message" => $validator -> errors(),
                ], 400);
            }

            $payload = [
                "temp" => $request -> temp,
                "humid" => $request -> humid,
                "weight" => $request -> weight,
                "light" => $request -> light
            ];

            if ($request -> lat) {
                $payload["lat"] = $request -> lat;
            }

            if ($request -> lng) {
                $payload["lng"] = $request -> lng;
            }

            Machine::where('id', $machine -> id) -> update($payload);

            $logs = [
                "temp" => $request -> temp,
                "humid" => $request -> humid,
                "weight" => $request -> weight,
                "light" => $request -> light,
                "machine_id" => $machine -> id
            ];

            MachineLog::create($logs);

            $mach = Machine::where('id', $machine -> id) -> first();
            return response([
                "status" => true,
                "message" => "Nilai parameter berhasil dirubah",
                "data" => $mach
            ], 200);
        } catch(Error $e) {
            return response([
                "status" => false,
                "message" => $e
            ], 500);
        }
    }
}
