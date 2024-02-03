<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Machine;
use Illuminate\Http\Request;

class EditMachineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Machine $machine)
    {
        $validate = $request -> validate([
            "user_id" => "required",
            "lat" => "required",
            "lng" => "required",
        ]);

        Machine::where('id', $machine -> id) -> update($validate);
        return redirect()
            -> route('machine')
            ->with('successMessage', 'Berhasil mengubah data');
    }
}
