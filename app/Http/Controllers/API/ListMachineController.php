<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;

class ListMachineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $user = $request -> user();
            return response([
                "status" => true,
                "message" => "Berhasil mengambil data",
                "data" => $user -> machines
            ], 200);
        } catch(Error $e) {
            return response([
                "status" => false,
                "message" => $e
            ], 500);
        }
    }
}
