<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid p-3 p-lg-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-dark">Profil Saya</h1>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center p-4 p-lg-5">
                        <img src="{{ $user->foto  ? asset('foto/profile/' . $user->foto)  : 'https://placehold.co/128x128/6c63ff/white?text=' . strtoupper(substr($user->name, 0, 1)) }}"  class="rounded-circle mb-3 shadow-sm"  width="128" height="128" alt="Foto Profil">


                        <h4 class="fw-bold text-dark mb-1">{{ $user->name }}</h4>

                        <span
                            class="badge fs-6 bg-primary bg-opacity-25 text-primary-emphasis border border-primary-subtle">
                            {{ $user->role }}
                        </span>

                        <form action="{{ route('profile.updateFoto', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="file" id="uploadFoto" name="foto" accept="image/*" hidden onchange="this.form.submit()">

                            <div class="mt-3">
                                <button type="button" class="btn btn-sm btn-outline-primary"
                                    onclick="document.getElementById('uploadFoto').click()">
                                    <i class="bi bi-camera-fill me-1"></i> Ganti Foto
                                </button>
                            </div>
                        </form>





                        <hr class="my-4">

                        <ul class="profile-details-list text-start">
                            <li>
                                <i class="bi bi-person-badge"></i>
                                <span>{{ $user->npm }}</span>
                            </li>
                            <li>
                                <i class="bi bi-envelope"></i>
                                <span>{{ $user->email }}</span>
                            </li>
                            <li>
                                <i class="bi bi-calendar-check"></i>
                                <span>{{ $user->create_at }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-white border-0 p-4 pb-0">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active fw-bold" id="nav-profil-tab" data-bs-toggle="tab"
                                    data-bs-target="#tab-profil" type="button" role="tab" aria-controls="tab-profil"
                                    aria-selected="true">
                                    <i class="bi bi-person-fill me-1"></i> Edit Profil
                                </button>
                                <button class="nav-link fw-bold" id="nav-password-tab" data-bs-toggle="tab"
                                    data-bs-target="#tab-password" type="button" role="tab" aria-controls="tab-password"
                                    aria-selected="false">
                                    <i class="bi bi-key-fill me-1"></i> Ubah Password
                                </button>
                            </div>
                        </nav>
                    </div>

                    <div class="card-body p-4">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="tab-profil" role="tabpanel"
                                aria-labelledby="nav-profil-tab">
                                <h5 classs="mb-3">Detail Profil</h5>
                                <form action="{{ route('profile.update',$user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nama_lengkap" class="form-label fw-bold">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control" id="nama_lengkap" value="{{ $user->name }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_anggota" class="form-label fw-bold">NPM / ID Anggota</label>
                                        <input type="text" name="npm" class="form-control" id="id_anggota" value="{{ $user->npm }}" disabled
                                            readonly>
                                        <div class="form-text">ID Anggota tidak dapat diubah.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-bold">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            value="{{ $user->email }}" required>
                                    </div>
                                    <hr>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-save-fill me-2"></i> Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="tab-password" role="tabpanel" aria-labelledby="nav-password-tab">
                                <h5 classs="mb-3">Ubah Password</h5>
                                <form action="{{ route('profile.ubahpw',$user->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="pass_lama" class="form-label fw-bold">Password Saat Ini</label>
                                        <input type="password" name="pw_lama" class="form-control" id="pass_lama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pass_baru" class="form-label fw-bold">Password Baru</label>
                                        <input type="password" name="pw_baru" class="form-control" id="pass_baru" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="konfirmasi_pass" class="form-label fw-bold">Konfirmasi Password
                                            Baru</label>
                                        <input type="password" name="pw_baru_komfirm" class="form-control" id="konfirmasi_pass" required>
                                    </div>
                                    <hr>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-key-fill me-2"></i> Ubah Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection