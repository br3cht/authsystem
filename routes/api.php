<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login',[AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    // Route::get('auth/user',[AuthController::class,'user']);
    // Route::post('auth/logout',[AuthController::class,'logout']);
    // Route::get('/user-logged', [AuthController::class,'user']);
});


