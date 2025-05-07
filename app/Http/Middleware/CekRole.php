<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login
        if (auth()->check()) {
            // Cek apakah role user sesuai dengan role yang diminta
            if (auth()->user()->role === $role) {
                return $next($request);
            }
        }

        // Jika tidak sesuai, tampilkan error
        abort(403, 'Akses ditolak.');
    }
}
