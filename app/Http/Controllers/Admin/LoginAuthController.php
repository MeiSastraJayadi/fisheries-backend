<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAuthController extends Controller
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
            "email" => "required",
            "password" => "required",
        ]);

        if(Auth::attempt($validate)) {
            $request -> session() -> regenerate();
            return redirect() -> route('home');
        }

        return redirect()
            -> route('show-login')
            -> with('errorMessage', 'Email dan password tidak sesuai');
    }
}
