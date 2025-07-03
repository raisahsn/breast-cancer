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

Route::middleware(['check.api_session'])->group(function () {

    // Logout
    //Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Halaman Utama
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('/prediction', [PredictionController::class, 'showPrediction'])->name('prediction');
    Route::get('/training', [TrainingController::class, 'showTraining'])->name('training');
    Route::get('/document', [DocumentController::class, 'showDocument'])->name('document');

    // Manajemen Akun
    Route::get('/account', [AccountController::class, 'showAccount'])->name('account.index');
    Route::post('/account/register', [AccountController::class, 'registerUser'])->name('register');
    Route::put('/account/{id}/update', [AccountController::class, 'updateUser'])->name('account.update');
    Route::delete('/account/{id}/delete', [AccountController::class, 'deleteUser'])->name('account.delete');

    // Aksi Pengguna (misal: ganti password dari layout)
    Route::patch('/user/{id}/password/change', [TampilanController::class, 'changePassword'])->name('password.update');

});
