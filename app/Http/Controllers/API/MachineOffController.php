<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Error;
use Illuminate\Http\Request;

class MachineOffController extends Controller
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
            Machine::where('id', $machine -> id) -> update(["active" => false]);
            $mach = Machine::where('id', $machine -> id) -> first();
            return response([
                "status" => true,
                "message" => "Alat telah nonaktif",
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
