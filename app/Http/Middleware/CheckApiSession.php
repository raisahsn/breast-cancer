<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika tidak ada 'api_token' di dalam session,
        // arahkan kembali ke halaman login.
        if (!session()->has('api_token')) {
            return redirect()->route('login');
        }

        // Jika ada, lanjutkan ke halaman yang dituju.
        return $next($request);
    }
}