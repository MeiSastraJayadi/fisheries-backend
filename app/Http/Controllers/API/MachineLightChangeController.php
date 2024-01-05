<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MachineLightChangeController extends Controller
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
                "light" => "required"
            ]);

            if ($validator -> fails()) {
                return response([
                    "status" => false,
                    "message" => $validator -> errors()
                ], 400);
            }

            Machine::where('id', $machine -> id) -> update(["light" => $request -> light]);
            $mach = Machine::where('id', $machine -> id) -> first();
            return response([
                "status" => true,
                "message" => "Data cahaya telah berhasil diubah",
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
