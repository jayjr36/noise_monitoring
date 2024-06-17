<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoiseDataController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/noise-data', [NoiseDataController::class, 'index']);
Route::post('/noise-data', [NoiseDataController::class, 'store']);