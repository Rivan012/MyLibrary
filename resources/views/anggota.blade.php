<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-dark">Dashboard</h1>
    <button class="btn btn-primary d-none d-lg-inline-block">
        <i class="bi bi-plus-circle-fill me-2"></i> Tambah Peminjaman
    </button>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted text-uppercase fw-bold small">Total Buku</h6>
                    <span class="h4 fw-bold mb-0">12,450</span>
                </div>
                <div class="card-icon bg-primary text-white"><i class="bi bi-book-fill"></i></div>
            </div>
        </div>
    </div>
    <!-- Card lainnya tetap sama -->
</div>

<div class="card stat-card">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0 fw-bold">Peminjaman Terbaru</h5>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID Anggota</th>
                    <th>Nama</th>
                    <th>Judul Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>A-001</td><td>Ahmad Subagja</td><td>Belajar Data Science</td><td>06 Nov 2025</td><td><span class="badge bg-success">Aktif</span></td></tr>
                <tr><td>A-002</td><td>Budi Santoso</td><td>Dasar Pemrograman Web</td><td>06 Nov 2025</td><td><span class="badge bg-success">Aktif</span></td></tr>
                <tr><td>A-003</td><td>Citra Lestari</td><td>Atomic Habits</td><td>05 Nov 2025</td><td><span class="badge bg-warning">Hampir Jatuh Tempo</span></td></tr>
                <tr><td>D-004</td><td>Dewi Anggraini</td><td>Laskar Pelangi</td><td>01 Nov 2025</td><td><span class="badge bg-danger">Terlambat</span></td></tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
