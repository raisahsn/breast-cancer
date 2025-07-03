<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TampilanController extends Controller
{
    public function showTampilan(){
        return view('layouts.tampilan');
    }

    public function changePassword(Request $request, $id)
    {
        // 1. Validasi input
        $validatedData = $request->validate([
            'newPassword' => 'required|string|min:6',
        ]);

        // 2. Ambil token dari sesi
        $token = $request->session()->get('api_token');

        if (!$token) {
            return response()->json(['message' => 'Sesi tidak valid atau telah berakhir.'], 401);
        }

        // 3. Siapkan URL API
        $apiUrl = "http://localhost:3000/api/user/change-password/{$id}";

        try {
            // 4. Kirim permintaan ke API menggunakan method PATCH
            $response = Http::withToken($token)->patch($apiUrl, [ // <-- PERUBAHANNYA DI SINI
                'newPassword' => $validatedData['newPassword'],
            ]);

            // 5. Kembalikan respons dari API ke JavaScript di browser
            return response()->json($response->json(), $response->status());

        } catch (\Exception $e) {
            // Tangani jika API tidak bisa dihubungi
            return response()->json(['message' => 'Gagal terhubung ke layanan ganti password.'], 500);
        }
    }
}