<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function processLogin(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Ambil base URL API dari file .env
        $apiBaseUrl = env('API_BASE_URL');

        try {
            // 2. Kirim request POST ke API Express Anda
            // Pastikan endpoint-nya benar (/auth/login)
            $response = Http::asForm()->post($apiBaseUrl . '/auth/login', [
                'username' => $request->username,
                'password' => $request->password,
            ]);

            // 3. Periksa respons dari API
            if ($response->successful()) {
                // Jika login di API Express berhasil (status 200-299)
                $data = $response->json();

                // 4. Simpan token dan data user ke dalam session Laravel.
                // Ini adalah cara Laravel "mengingat" bahwa pengguna sudah login.
                $request->session()->put('api_token', $data['data']['token']);
                $request->session()->put('user', $data['data']['user']);

                // Cek session
                //dd(session()->all());

                // Regenerasi session ID untuk keamanan
                $request->session()->regenerate();

                // 5. Alihkan (redirect) ke route 'dashboard'. INI JAWABAN UTAMA ANDA.
                return redirect()->route('dashboard');

            } else {
                // Jika login di API Express gagal (misal: username/password salah)
                $errorData = $response->json();
                $errorMessage = $errorData['message'] ?? 'Username atau password tidak valid.';

                // 6. Kembali ke halaman login dengan membawa pesan error
                return back()->with('error', $errorMessage);
            }

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Tangani jika API Express tidak bisa dihubungi (misal: server mati)
            Log::error('API Connection Error: ' . $e->getMessage());
            return back()->with('error', 'Layanan otentikasi sedang tidak tersedia. Coba lagi nanti.');
        }
    }
}