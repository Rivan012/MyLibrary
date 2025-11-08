<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Validator;
// user User

class RegisterController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('home.index');
        }
        return view("register");
    }
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'npm' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'npm' => $request->npm,
            'role' => 'anggota',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
