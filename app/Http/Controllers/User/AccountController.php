<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class AccountController extends Controller
{
public function showAccount(Request $request)
{
    $token = session()->get('api_token');

    if (!$token) {
        return redirect()->route('login');
    }

    $response = Http::withToken($token)
                    ->get('http://localhost:3000/api/users');

    if ($response->successful()) {
        $users = $response->json()['data']['users'];
        return view('user.account', compact('users')); // <-- Kembalikan seperti semula
    } else {
        return back()->with('error', 'Gagal mengambil data akun');
    }
}


public function registerUser(Request $request)
{
    // 1. Validasi input dari form Laravel Anda
    $validatedData = $request->validate([
        'name'      => 'required|string|max:255',
        'username'  => 'required|string|max:255',
        'password'  => 'required|string|min:6',
        'idRole'    => 'required|integer',
    ]);

    $apiUrl = 'http://localhost:3000/api/auth/register';

    try {
        /// 2. Kirim request POST ke API eksternal
        $response = Http::post($apiUrl, [
            'name'      => $validatedData['name'],
            'username'  => $validatedData['username'],
            'password'  => $validatedData['password'],
            'idRole'    => $validatedData['idRole'],
        ]);

        // 3. Ambil body dari respons API
        $responseBody = $response->json();

        // 4. Periksa apakah request ke API berhasil dan handle responsnya
        if ($response->successful() && isset($responseBody['error']) && $responseBody['error'] === false)
        {
            return redirect()->route('account.index')->with('success', 'Akun baru berhasil ditambahkan!');
        }
        else {
            // Jika API mengembalikan error (misal: username sudah ada)
            $errorMessage = $responseBody['message'] ?? 'Gagal membuat akun via API.';
            // Redirect kembali ke halaman sebelumnya dengan pesan error dan data input
            return redirect()->back()->withErrors(['api_error' => $errorMessage])->withInput();
        }

    } catch (ConnectionException $e) {
        // Handle jika API sama sekali tidak bisa dihubungi
        report($e);
        return redirect()->back()->withErrors(['api_error' => 'Tidak dapat terhubung ke layanan registrasi. Coba lagi nanti.']);
    }
}
}