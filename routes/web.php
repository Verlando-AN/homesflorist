<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\DiseaseController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('index');
    Route::post('/update-profile', [DashboardController::class, 'update'])->name('updateProfile');
    Route::get('/diagnosa', [DiagnosaController::class, 'diagnosa'])->name('diagnosa');
    Route::post('/diagnose', [DiagnosaController::class, 'diagnose'])->name('diagnose');
    Route::resource('diseases', DiseaseController::class);
    Route::get('/diagnosis/{id}', [DashboardController::class, 'show'])->name('dashboard.driwayat');
});

