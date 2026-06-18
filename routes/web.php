<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Jalur Controller Halaman Utama Depan
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\KelahiranController;
use App\Http\Controllers\PernikahanController;
use App\Http\Controllers\KematianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- HALAMAN UTAMA / BERANDA DEPAN WEB GEREJA ---
// Sekarang sudah diarahkan penuh ke HomeController agar datanya dinamis
Route::get('/', [HomeController::class, 'index'])->name('home');


// --- FITUR AUTENTIKASI (LOGIN & LOGOUT) ---
// Menampilkan halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
// Memproses data login saat tombol masuk diklik
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
// Memproses logout admin
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// --- AREA PROTEKSI ADMIN (Hanya Bisa Diakses Setelah Login) ---
Route::middleware('auth')->group(function () {
    
    // Rute Dashboard Utama Admin (Diambil satu saja yang mengarah ke DashboardController)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 5 Modul Utama CRUD Administrasi Jemaat
    Route::resource('keluarga', KeluargaController::class);
    Route::resource('jemaat', JemaatController::class);
    Route::resource('kelahiran', KelahiranController::class);
    Route::resource('pernikahan', PernikahanController::class);
    Route::resource('kematian', KematianController::class);
    
});