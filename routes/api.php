<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ReservationController;
use App\Models\Administrateur;
use Illuminate\Support\Facades\Route;

Route::apiResource('/', Administrateur::class);



Route::apiResource('register', RegisteredUserController::class);
Route::apiResource('login', LoginController::class);

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('logout', LogoutController::class);

    Route::apiResource('parking', ParkingController::class);
    Route::apiResource('reservation', ReservationController::class);
});
