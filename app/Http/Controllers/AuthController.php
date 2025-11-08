<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Cek apakah user sudah login
        if (auth()->check()) {
            // Arahkan sesuai role
            if (auth()->user()->role === 'admin') {
                return redirect('/admin');
            } elseif (auth()->user()->role === 'petugas') {
                return redirect('/petugas');
            } else {
                return redirect('/anggota');
            }
        }

        // Kalau belum login, tampilkan form login
        return view('login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin');
            } elseif ($user->role === 'petugas') {
                return redirect('/petugas');
            } else {
                return redirect('/anggota');
            }
        }
        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
