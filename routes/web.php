<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\PredictionController;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\TrainingController;



// Halaman awal
Route::get('/', fn () => view('welcome'));

// Autentikasi
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
// Route untuk MEMPROSES data login
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.post');
// Route untuk DASHBOARD yang akan kita tuju setelah login berhasil
Route::get('/dashboard', function () {
    // Sebagai contoh, kita akan lindungi halaman ini secara manual
    // dengan mengecek apakah ada 'user' di session.
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    // Jika ada, tampilkan view dashboard
    return view('dashboard');
})->name('dashboard');

// Tampilan utama
Route::post('/user/password', [TampilanController::class, 'changePassword'])
    ->name('user.password.change')
    ->middleware('web');


// Halaman Dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

// Halaman Prediksi
Route::get('/prediction', [PredictionController::class, 'showPrediction'])->name('prediction');

// Tampilan Dokumen
Route::get('/document', [DocumentController::class, 'showDocument'])->name('document');


// Route untuk menampilkan halaman daftar akun
Route::get('/account', [AccountController::class, 'showAccount'])->name('account.index');

// Route untuk memproses form penambahan akun baru
Route::post('/account/register', [AccountController::class, 'registerUser'])->name('register');


// Tampilan Training
Route::get('/training', [TrainingController::class, 'showTraining'])->name('training');