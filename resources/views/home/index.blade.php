<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card stat-card">
        <div class="card-body p-2">
            <div class="container-fluid px-0" style="padding-bottom: 80px;">
                <div class="p-3">
                    <div class="promo-banner shadow-sm mb-4">
                        <img src="https://placehold.co/800x250/6c63ff/white?text=Selamat+Datang+di+PerpusDigital"
                            alt="Promo Banner">
                    </div>

                    <div class="card shadow-sm border-0 rounded-3 mb-4">
                        <div class="card-body d-flex justify-content-between align-items-center p-3">
                            <div>
                                <h5 class="fw-bold mb-0">Hal, Ahmad!</h5>
                                <p class="mb-0 text-muted small">Selamat datang kembali di PerpusDigital.</p>
                            </div>
                            <a href="#" class="btn btn-primary btn-sm">Lihat Profil</a>
                        </div>
                    </div>

                    <div class="category-grid mb-4">
                        <div class="row row-cols-4 row-cols-lg-8 g-3">
                            @if (Auth::user()->role == 'anggota')
                                @include('home.member')
                            @elseif (Auth::user()->role == 'petugas')
                                @include('home.staff')
                            @elseif (Auth::user()->role == 'admin')
                                @include('home.admin')
                            
                            @endif


                            <div class="col">
                                <a href="{{ route('buku.index') }}" class="category-item">
                                    <div class="icon-wrapper" style="background-color: #f9f0ff; color: #722ed1;">
                                        <i class="bi bi-book-fill"></i>
                                    </div>
                                    <span>Semua Buku</span>
                                </a>
                            </div>

                            

                            <div class="col">
                                <a href="#" class="category-item">
                                    <div class="icon-wrapper" style="background-color: #e6f7ff; color: #1890ff;">
                                        <i class="bi bi-bookshelf"></i>
                                    </div>
                                    <span>Rak Buku</span>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" class="category-item">
                                    <div class="icon-wrapper" style="background-color: #fff1f0; color: #f5222d;">
                                        <i class="bi bi-cash-stack"></i>
                                    </div>
                                    <span>Denda</span>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" class="category-item">
                                    <div class="icon-wrapper" style="background-color: #f6ffed; color: #52c41a;">
                                        <i class="bi bi-file-earmark-bar-graph-fill"></i>
                                    </div>
                                    <span>Laporan</span>
                                </a>
                            </div>

                            <div class="col">
                                <a href="#" class="category-item">
                                    <div class="icon-wrapper" style="background-color: #f1f3f5; color: #6c63ff;">
                                        <i class="bi bi-person-circle"></i>
                                    </div>
                                    <span>Profil Saya</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold mb-0">Buku Baru Ditambahkan</h4>
                        <a href="#" class="text-primary text-decoration-none fw-bold small">Lihat Semua</a>
                    </div>

                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                                <div class="position-relative">
                                    <img src="https://placehold.co/300x400/6c63ff/white?text=Atomic+Habits"
                                        class="card-img-top-book" alt="Atomic Habits">
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75">
                                        <i class="bi bi-bookshelf me-1"></i> Rak A-1
                                    </span>
                                </div>
                                <div class="card-body d-flex flex-column p-3">
                                    <h6 class="card-title-book fw-bold text-dark mb-2">Atomic Habits: Perubahan Kecil...
                                    </h6>
                                    <p class="card-text text-primary fw-bold mb-1">James Clear</p>
                                    <div class="small text-muted mb-3">Stok: <strong class="text-dark">8 / 10</strong></div>
                                    <a class="btn btn-sm btn-outline-primary w-100 mt-auto" href="#">
                                        <i class="bi bi-eye-fill"></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                                <div class="position-relative">
                                    <img src="https://placehold.co/300x400/34a853/white?text=Laskar+Pelangi"
                                        class="card-img-top-book" alt="Laskar Pelangi">
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75">
                                        <i class="bi bi-bookshelf me-1"></i> Rak B-2
                                    </span>
                                </div>
                                <div class="card-body d-flex flex-column p-3">
                                    <h6 class="card-title-book fw-bold text-dark mb-2">Laskar Pelangi</h6>
                                    <p class="card-text text-primary fw-bold mb-1">Andrea Hirata</p>
                                    <div class="small text-muted mb-3">Stok: <strong class="text-dark">5 / 5</strong></div>
                                    <a class="btn btn-sm btn-outline-primary w-100 mt-auto" href="#">
                                        <i class="bi bi-eye-fill"></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                                <div class="position-relative">
                                    <img src="https://placehold.co/300x400/fbbc05/white?text=Bumi+Manusia"
                                        class="card-img-top-book" alt="Bumi Manusia">
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75">
                                        <i class="bi bi-bookshelf me-1"></i> Rak C-1
                                    </span>
                                </div>
                                <div class="card-body d-flex flex-column p-3">
                                    <h6 class="card-title-book fw-bold text-dark mb-2">Bumi Manusia</h6>
                                    <p class="card-text text-primary fw-bold mb-1">Pramoedya A. Toer</p>
                                    <div class="small text-muted mb-3">Stok: <strong class="text-dark">3 / 3</strong></div>
                                    <a class="btn btn-sm btn-outline-primary w-100 mt-auto" href="#">
                                        <i class="bi bi-eye-fill"></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                                <div class="position-relative">
                                    <img src="https://placehold.co/300x400/ea4335/white?text=Sapiens"
                                        class="card-img-top-book" alt="Sapiens">
                                    <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75">
                                        <i class="bi bi-bookshelf me-1"></i> Rak D-5
                                    </span>
                                </div>
                                <div class="card-body d-flex flex-column p-3">
                                    <h6 class="card-title-book fw-bold text-dark mb-2">Sapiens: Riwayat Singkat Umat Manusia
                                    </h6>
                                    <p class="card-text text-primary fw-bold mb-1">Yuval Noah Harari</p>
                                    <div class="small text-muted mb-3">Stok: <strong class="text-dark">6 / 6</strong></div>
                                    <a class="btn btn-sm btn-outline-primary w-100 mt-auto" href="#">
                                        <i class="bi bi-eye-fill"></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection