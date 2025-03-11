<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Administrateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/', Administrateur::class);

Route::apiResource('register', RegisteredUserController::class);

Route::apiResource('login', LoginController::class);
