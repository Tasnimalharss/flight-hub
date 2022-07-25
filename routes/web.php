<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{TicketController, AirportController,AirlineController,FlightController,CityController,CountryController};

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group([ 'middleware' => ['auth']], function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('tickets', TicketController::class);
Route::resource('airports', AirportController::class);
Route::resource('flights', FlightController::class);
Route::resource('airlines', AirlineController::class);
Route::resource('cities', CityController::class);
Route::resource('countries', CountryController::class);
});