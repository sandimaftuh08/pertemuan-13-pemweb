<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// PENTING: route custom harus SEBELUM resource
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
Route::get('/buku/kategori/{kategori}', [BukuController::class, 'filterKategori'])->name('buku.kategori');



// Resource Routes
Route::resource('buku', BukuController::class);

Route::get('anggota/export', [AnggotaController::class, 'export'])->name('anggota.export');
Route::get('anggota/search', [AnggotaController::class, 'search'])->name('anggota.search');
Route::resource('anggota', AnggotaController::class);

