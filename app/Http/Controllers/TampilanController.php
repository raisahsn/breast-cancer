<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TampilanController extends Controller
{
    public function showTampilan(){
        return view('layouts.tampilan');
    }

    public function changePassword(Request $request)
    {
        $request->validate(['newPassword' => 'required|string|min:6']);
        $token = $request->session()->get('api_token');
        // Memeriksa apakah token ada di session
        //dd(session()->all());
        $apiBaseUrl = env('API_BASE_URL');

        if (!$token) {
            return response()->json(['message' => 'Sesi tidak valid.'], 401);
        }

        try {
            $response = Http::withToken($token)
                ->put("{$apiBaseUrl}/user/password", [
                    'newPassword' => $request->newPassword,
                ]);
            return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal terhubung ke layanan ganti password.'], 500);
        }
    }
}
