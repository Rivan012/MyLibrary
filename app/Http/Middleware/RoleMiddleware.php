<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // cek apakah role user ada di dalam daftar role yang diizinkan
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Akses Ditolak');
        }

        return $next($request);
    }
}
