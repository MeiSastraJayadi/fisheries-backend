<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DryHistory;
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

            $dry = DryHistory::where('machine_id', $machine->id)
                    ->where('finish', false)
                    ->orderBy('created_at', 'DESC')
                    ->first();

            if ($dry == null) {
                return response([
                    "status" => true,
                    "message" => "Tidak ada proses pengeringan",
                    "data" => $machine
                ], 200);
            }

            $humidity = ($request -> weight / $dry -> assign_weight) * 100;
            if ($validator -> fails()) {
                return response([
                    "status" => false,
                    "message" => $validator -> errors(),
                ], 400);
            }

            $payload = [
                "temp" => $request -> temp,
                "humid" => $humidity,
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
                "humid" => $humidity,
                "weight" => $request -> weight,
                "light" => $request -> light,
                "machine_id" => $machine -> id
            ];


            if ($dry < 30) {
                DryHistory::where('id', $dry -> id) -> update([
                    "finish" => true
                ]);
                Machine::where('id', $machine->id) -> update([
                    "active" => false
                ]);
            } else {
                MachineLog::create($logs);
            }

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
