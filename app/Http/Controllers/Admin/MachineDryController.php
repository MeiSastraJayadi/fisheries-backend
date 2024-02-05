<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MachineDryController extends Controller
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
            $validate = Validator::make($request -> all(), [
                "weight" => "required"
            ]);

            if ($validate -> fails()) {
                return response([
                    "status" => false,
                    "message" => $validate -> errors()
                ], 400);
            }

            $payload = [
                "weight" => $request -> weight,
                "active" => 1
            ];

            Machine::where('id', $machine -> id) -> update($payload);
            return response([
                "status" => false,
                "message" => "Berhasil mengirimkan data untuk proses pengeringan",
                "data" => Machine::where('id', $machine -> id) -> first()
            ], 200);

        } catch (Error $e) {
            return response([
                "status" => false,
                "message" => $e
            ], 500);
        }
    }
}
