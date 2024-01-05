<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MachineGetLightController extends Controller
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
            $mach = Machine::where('id', $machine -> id) -> select('light') -> first();
            return response([
                "status" => true,
                "message" => "Data intensitas cahaya",
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
