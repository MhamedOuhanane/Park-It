<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\ReservationController;
use App\Models\Administrateur;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    Route::apiResource('register', RegisteredUserController::class);
    Route::apiResource('login', LoginController::class);
});



Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('logout', LogoutController::class);
    Route::apiResource('parking', ParkingController::class);
    
    Route::middleware('role:utilisateur')->group(function() {
        Route::apiResource('reservation', ReservationController::class);
    });
    
    Route::middleware('role:admin')->group(function() {
        Route::apiResource('dashboard', DashboardController::class);
    });
    
});