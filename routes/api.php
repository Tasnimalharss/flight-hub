<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{AirlineController, AirportController, ClassTypeController, TicketController,PassengerController, FlightClassTypeController, FlightController};

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('airlines', AirlineController::class);
Route::get('flights', [FlightController::class, 'index']);
Route::get('flights/{flight}/class-types', [FlightClassTypeController::class, 'index']);
Route::get('airports', [AirportController::class, 'index']);
Route::get('class-types', [ClassTypeController::class, 'index']);
