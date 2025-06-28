<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PredictionController;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\User\AccountController;



// Halaman awal
Route::get('/', fn () => view('welcome'));

// Autentikasi
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

// Tampilan utama
Route::get('/tampilan', [TampilanController::class, 'showTampilan'])->name('tampilan');

// Halaman Dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

// Halaman Prediksi
Route::get('/prediction', [PredictionController::class, 'showPrediction'])->name('prediction');

// Tampilan Dokumen
Route::get('/document', [DocumentController::class, 'showDocument'])->name('document');

// Tampilan Account
Route::get('/account', [AccountController::class, 'showAccount'])->name('account');
