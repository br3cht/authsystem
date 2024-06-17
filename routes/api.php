<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login',[AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    // Route::resources([
    //     'user' => UserController::class
    // ]);
    //
    Route::post('auth/logout', [AuthController::class, 'logout']);
});


