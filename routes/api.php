<?php

use App\Http\Controllers\API\GetMachineByIdController;
use App\Http\Controllers\API\ListMachineController;
use App\Http\Controllers\API\Login;
use App\Http\Controllers\API\Logout;
use App\Http\Controllers\API\MachineChangeController;
use App\Http\Controllers\API\MachineGetLightController;
use App\Http\Controllers\API\MachineLightChangeController;
use App\Http\Controllers\API\MachineLogController;
use App\Http\Controllers\API\MachineOffController;
use App\Http\Controllers\API\MachineOnController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(["prefix" => "auth"], function() {
    Route::post("/login", Login::class);
});

Route::middleware('auth:sanctum') -> get('/auth/logout', Logout::class);

Route::group(["prefix" => "machine", "middleware" => ["auth:sanctum"]], function() {
    Route::get("/list-machine", ListMachineController::class);
    Route::get("/machine-detail/{machine:id}", GetMachineByIdController::class);
    Route::get("/machine-logs/{machine:id}", MachineLogController::class);
    Route::get("/machine-light/{machine:id}", MachineGetLightController::class);
    Route::post("/machine-update-light/{machine:id}", MachineLightChangeController::class);
    Route::post("/machine-on/{machine:id}", MachineOnController::class);
    Route::post("/machine-off/{machine:id}", MachineOffController::class);
    Route::post("/machine-update/{machine:id}", MachineChangeController::class);
});


