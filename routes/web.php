<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoiseDataController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/noise-table', [NoiseDataController::class, 'showTable']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/graph', [NoiseDataController::class, 'showGraph']);
Route::get('/table', [NoiseDataController::class, 'showTable']);
Route::get('/displaypage', function () {
    return view('noise-monitor');
})->name('single-graph');