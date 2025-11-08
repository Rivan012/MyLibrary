<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RakController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth', 'role:admin']);

Route::get('/petugas', function () {
    return view('petugas');
})->middleware(['auth', 'role:petugas']);

Route::get('/member', function () {
    return view('anggota');
})->middleware(['auth', 'role:anggota']);
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