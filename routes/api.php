<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\DishReservationController;
use App\Http\Controllers\HallCarController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HallDishController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Models\reservation;
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


Route::middleware('auth:api')->group(function(){

Route::resource('users',UserController::class);
Route::resource('hall',HallController::class);
Route::resource('dish',DishController::class);
Route::resource('reservations',ReservationController::class);
Route::resource('cars',CarController::class);
Route::get('HallsAccordingToCategory',[HallController::class,'ClassifiedHalls']);
Route::get('DishesAccordingToCategory',[DishController::class,'DishAccordingToHalls']);
Route::post('halls/{hallId}/dishes/{dishId}', [HallDishController::class,'store']);
Route::get('halls/{hallId}/dishes', [DishController::class,'DishAccordingToHalls']);
Route::post('halls/{hallId}/cars/{carId}', [HallCarController::class,'store']);
Route::post('dishes/{dishId}/reservations/{reservationId}', [DishReservationController::class,'store']);
Route::get('ShowUserReservation', [ReservationController::class,'ShowUserReservation']);
Route::get('halls/{hallId}/cars', [CarController::class,'CarAccordingToHalls']);

});

Route::post('register',[RegisterController::class,'register']);
Route::post('login',[LoginController::class,'Login'])->name('login');
