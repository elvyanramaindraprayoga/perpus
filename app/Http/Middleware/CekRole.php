<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CekRole
{
    
    public function handle(Request $request, Closure $next, $role)
    {
        
        if (auth()->check()) {
            
            if (auth()->user()->role === $role) {
                return $next($request);  
            }
        }

        return redirect()->route('dashboard')->with('error', 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
