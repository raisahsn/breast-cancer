<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View; // 1. Tambahkan ini
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 2. Tambahkan kode View Composer di bawah ini
        View::composer('layouts.tampilan', function ($view) {
            $token = session()->get('api_token');
            $loggedInUser = null;

            if ($token) {
                try {
                    $response = Http::withToken($token)->get('http://localhost:3000/api/user');

                    if ($response->successful()) {
                        // Ambil data user dari respons API
                        // Sesuaikan path jika struktur JSON dari API Anda berbeda
                        $loggedInUser = data_get($response->json(), 'data.user');
                    }
                } catch (\Exception $e) {
                    // Biarkan $loggedInUser null jika API tidak terjangkau
                }
            }

            // Kirim variabel $loggedInUser ke view 'layouts.tampilan'
            $view->with('loggedInUser', $loggedInUser);
        });
    }
}
