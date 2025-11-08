<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;


Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::resource('anggota', App\Http\Controllers\AnggotaController::class);
    Route::resource('rak', RakController::class);
});
Route::middleware(['auth', 'role:anggota,petugas,admin'])->group(function () {
    Route::resource('pinjam', App\Http\Controllers\PeminjamanController::class);
    Route::resource('buku', App\Http\Controllers\BukuController::class);
    Route::resource('pengembalian', App\Http\Controllers\PengembalianController::class);
    Route::resource('profile', App\Http\Controllers\ProfileController::class);
    Route::put('profil/{id}', [App\Http\Controllers\ProfileController::class,'ubahpw'])->name('profile.ubahpw');
    Route::put('profil/{id}/foto', [App\Http\Controllers\ProfileController::class,'updateFoto'])->name('profile.updateFoto');
    Route::resource('home', App\Http\Controllers\HomeController::class);
});
Route::middleware(['auth', 'role:anggota'])->group(function () {
    Route::resource('peminjaman', App\Http\Controllers\PeminjamanBukuController::class);
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('petugas', App\Http\Controllers\PetugasController::class);
});