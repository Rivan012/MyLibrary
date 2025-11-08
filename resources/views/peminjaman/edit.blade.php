<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-dark">Dashboard</h1>
        <a href="{{ url('buku') }}" class="btn btn-primary d-lg-inline-block ms-auto">
            <i class="bi bi-backward me-2"></i> Kembali
        </a>
    </div>
    <div class="card stat-card">
        <div class="card-header bg-white border-0 py-3">
            <h5 class="mb-0 fw-bold">Meminjam Buku : {{ $buku->judul }}</h5>
        </div>
        <div class="card-body p-5">
            <form action="{{ route('peminjaman.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input required type="text" disabled value="{{ Auth::user()->name }}" class="form-control" id="name"
                        name="name" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input required type="date" class="form-control" id="tanggal" name="tanggal_pinjam" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                    <input required type="date" class="form-control" id="tanggal" name="tanggal_kembali" required>
                </div>
                <div class="mb-3">
                    <label for="petugas" class="form-label">Petugas</label>
                    <select required class="form-select" id="petugas" name="petugas_id" required>
                        <option value="" selected>Pilih Petugas</option>
                        @foreach ($petugas as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                        @endforeach
                </div>
                <input type="hidden" name="id_buku" value="{{ $buku->id }}">
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
@endsection