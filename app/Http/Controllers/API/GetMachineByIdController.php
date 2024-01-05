<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Error;
use Illuminate\Http\Request;

class GetMachineByIdController extends Controller
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
            if (!$machine) {
                return response([
                    "status" => false,
                    "message" => "Mesin belum atau tidak terdaftar"
                ], 404);
            }
            return response([
                "status" => true,
                "message" => "Mesin tersedia",
                "data" => $machine
            ], 200);
        } catch(Error $e) {
                return response([
                    "status" => false,
                    "message" => "Mesin belum atau tidak terdaftar"
                ], 404);
        }
    }
}
