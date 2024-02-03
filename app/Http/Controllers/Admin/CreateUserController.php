<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CreateUserController extends Controller
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
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        $validate["password"] = bcrypt($validate["password"]);

        User::create($validate);

        return redirect()
            ->route('home')
            ->with('successMessage', 'Berhasil manambah data user');
    }
}
