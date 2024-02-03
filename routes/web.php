<?php

use App\Http\Controllers\Admin\CreateMachineController;
use App\Http\Controllers\Admin\CreateUserController;
use App\Http\Controllers\Admin\DeleteMachineController;
use App\Http\Controllers\Admin\DeleteUserController;
use App\Http\Controllers\Admin\EditMachineController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\LoginAuthController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\MachineController;
use App\Http\Controllers\Admin\MachineLogsController;
use App\Http\Controllers\Admin\ShowCreateMachineController;
use App\Http\Controllers\Admin\ShowCreateUserController;
use App\Http\Controllers\Admin\ShowEditMachineController;
use App\Http\Controllers\Admin\ShowMachineController;
use App\Http\Controllers\Admin\ShowMachineLogsController;
use App\Http\Controllers\Admin\ShowUserController;
use App\Http\Controllers\API\MachineLogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", LandingPageController::class) -> name('landing-page');
Route::get("/logout", LogoutController::class) -> name('logout');
Route::prefix("/login") -> group(function() {
    Route::get("/", LoginController::class) -> name('show-login');
    Route::post("/", LoginAuthController::class) -> name('login');
});

Route::group(["prefix" => "user", "middleware" => ["auth"]], function() {
    Route::get("/", HomeController::class) -> name('home');
    Route::get("/store-user", ShowCreateUserController::class) -> name('show-store-user');
    Route::post("/store-user", CreateUserController::class) -> name('store-user');
    Route::get('/user-data', ShowUserController::class) -> name('user-data');
    Route::get('/delete-user-data/{user:id}', DeleteUserController::class) -> name('delete-user-data');
});

Route::group(["prefix" => "machine", "middleware" => ["auth"]], function() {
    Route::get("/", MachineController::class) -> name('machine');
    Route::get("/data-machine", ShowMachineController::class) -> name('data-machine');
    Route::get("/store", ShowCreateMachineController::class) -> name('show-store-machine');
    Route::get("/delete/{machine:id}", DeleteMachineController::class) -> name('delete-machine-data');
    Route::get("/edit/{machine:id}", ShowEditMachineController::class) -> name('show-edit-machine');
    Route::put("/edit/{machine:id}", EditMachineController::class) -> name('edit-machine');
    Route::post("/store", CreateMachineController::class) -> name('store-machine');
});

Route::group(["prefix" => "logs", "middleware" => ["auth"]], function() {
    Route::get("/", MachineLogsController::class) -> name('machine-logs');
    Route::get("/data-machine-logs", ShowMachineLogsController::class) -> name('data-machine-logs');
});


