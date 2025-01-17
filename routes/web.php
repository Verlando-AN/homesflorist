<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PapanBungaController;
use App\Http\Controllers\KategoriController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login'); 
Route::post('/login', [LoginController::class, 'authenticate']); 
Route::get('/papanbunga/{papanBunga}', [PapanBungaController::class, 'show'])->name('papanbunga.show');
Route::get('/papanbunga/{id}', [PapanBungaController::class, 'show'])->name('papan_bunga.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/papanbunga', [PapanBungaController::class, 'index'])->name('papanbunga.index');
    Route::get('/papan/create', [PapanBungaController::class, 'create'])->name('papanbunga.create');
    Route::post('/papanbunga', [PapanBungaController::class, 'store'])->name('papanbunga.store');
    Route::get('/papanbunga/{papanBunga}/edit', [PapanBungaController::class, 'edit'])->name('papanbunga.edit');
    Route::put('/papanbunga/{papanBunga}', [PapanBungaController::class, 'update'])->name('papanbunga.update');
    Route::delete('/papanbunga/{papanBunga}', [PapanBungaController::class, 'destroy'])->name('papanbunga.destroy');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

