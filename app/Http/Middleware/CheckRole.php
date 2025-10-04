<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Memeriksa apakah pengguna memiliki salah satu peran yang diperlukan
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }
        
        // Jika role tidak sesuai, alihkan ke halaman yang ditentukan atau tampilkan pesan tidak diizinkan
        abort(403, 'Unauthorized access');
    }
}
