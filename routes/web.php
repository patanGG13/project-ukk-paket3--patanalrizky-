<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// RUTE SISWA
// ==========================================

// Autentikasi & Dasbor Siswa
Route::get('/siswa/login', [SiswaController::class, 'login'])->name('siswa.login');
Route::post('/siswa/login', [SiswaController::class, 'authenticate'])->name('siswa.authenticate');
Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
Route::get('/siswa/logout', [SiswaController::class, 'logout'])->name('siswa.logout');

// Form Input Aspirasi & Pencarian Histori
Route::get('/siswa/aspirasi', [SiswaController::class, 'index'])->name('siswa.aspirasi.index');
Route::post('/siswa/aspirasi', [SiswaController::class, 'store'])->name('siswa.aspirasi.store');
Route::get('/siswa/histori', [SiswaController::class, 'histori'])->name('siswa.histori');


// ==========================================
// RUTE ADMIN
// ==========================================

// Autentikasi Admin
Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Dasbor & Manajemen Laporan
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
Route::post('/admin/aspirasi/{id}/update', [AdminController::class, 'updateStatus'])->name('admin.aspirasi.update');