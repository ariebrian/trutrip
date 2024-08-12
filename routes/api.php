<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TripController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function() {
    Route::get('users', [UserController::class, 'index']);

    Route::get('trips', [TripController::class, 'index']);
    Route::get('trip/{id}', [TripController::class, 'show']);
    Route::post('trip', [TripController::class, 'store']);
    Route::put('trip/{id}', [TripController::class, 'update']);
    Route::delete('trip/{id}', [TripController::class, 'delete']);
});