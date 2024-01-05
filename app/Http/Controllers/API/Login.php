<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Throwable;

class Login extends Controller
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
            $validator = Validator::make($request -> all(), [
                "email" => "required",
                "password" => "required"
            ]);

            if ($validator -> fails()) {
                return response([
                    "status" => false,
                    "message" => $validator -> errors(),
                ], 400);
            }

            $credential = [
                "email" => $request -> email,
                "password" => $request -> password
            ];


            if (!Auth::attempt($credential)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password tidak cocok',
                ], 401);
            }

            $user = User::where('email', $request -> email) -> first();



            return response(
                [
                    "status" => true,
                    "message" => "Login berhasil",
                    "data" => [
                        "user_id" => $user -> id,
                        "username" => $user -> name,
                        "email" => $user -> email,
                        "token" => $user -> createToken("API TOKEN") -> plainTextToken
                    ]
                ], 200
            );

        } catch (Error $e) {
            return response()->json([
                'status' => false,
                'message' => $e,
            ], 500);
        }
    }
}
