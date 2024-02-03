<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Illuminate\Http\Request;

class CreateMachineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validate = $request -> validate([
            "user_id" => "required",
            "lat" => "required",
            "lng" => "required",
        ]);

        $validate["temp"] = 0;
        $validate["humid"] = 0;
        $validate["light"] = 0;
        $validate["weight"] = 0;
        $validate["active"] = 0;

        Machine::create($validate);

        return redirect()
            ->route('machine')
            ->with('successMessage', 'Berhasil menambah data');

    }
}
