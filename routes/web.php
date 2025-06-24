<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\User\PredictionController;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\Subfile\Documents;
use App\Http\Controllers\User\Subfile\Download;
use App\Http\Controllers\User\Subfile\Accounts;
use App\Http\Controllers\User\Subfile\NewAccount;

// Halaman awal
Route::get('/', fn () => view('welcome'));

// Autentikasi
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

// Tampilan utama
Route::get('/tampilan', [TampilanController::class, 'showTampilan'])->name('tampilan');

// Halaman Prediksi
Route::get('/prediction', [PredictionController::class, 'showPrediction'])->name('prediction');


// ---------------------------
// Group untuk DOCUMENT
// ---------------------------

// Klik menu 'Document' → redirect langsung ke subpage 'documents'
Route::get('/document', fn () => redirect()->route('documents'))->name('document');

// Subroutes dalam group document/
Route::prefix('document')->group(function () {
    Route::get('/documents', [Documents::class, 'showDocuments'])->name('documents');
    Route::get('/download', [Download::class, 'showDownload'])->name('download');
    Route::post('/download/bulk', function () {
        // Dummy POST, bisa diganti ke controller untuk proses real
        return back()->with('status', 'Form submitted (dummy).');
    })->name('download.bulk');
});


// ---------------------------
// Group untuk ACCOUNT
// ---------------------------

// Klik menu 'Account' → redirect langsung ke subpage 'accounts'
Route::get('/account', fn () => redirect()->route('accounts'))->name('account');

// Subroutes dalam group account/
Route::prefix('account')->group(function () {
    Route::get('/accounts', [Accounts::class, 'showAccounts'])->name('accounts');
    Route::get('/newaccount', [NewAccount::class, 'showNewAccount'])->name('newaccount');
});