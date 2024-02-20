<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DayController;

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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/w', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum')->get('/day/{theDay}', [DayController::class, 'get']);
Route::middleware('auth:sanctum')->get('/week/{theDay}', [DayController::class, 'getWeek']);
Route::middleware('auth:sanctum')->post('/day', [DayController::class, 'saveDay']);
