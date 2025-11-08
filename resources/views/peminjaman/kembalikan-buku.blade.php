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
     @forelse ($kembalikan->detail as $d)
    <div class="card stat-card">
        <div class="card-header bg-white border-0 py-3">
            <h5 class="mb-0 fw-bold">Kembalikan Buku : {{ $d->buku->judul }}</h5>
        </div>
        <div class="card-body p-5">
            <form action="{{ route('pengembalian.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input required type="text" disabled value="{{ Auth::user()->name }}" class="form-control" id="name"
                        name="name" required>
                </div>
                <input type="hidden" name="peminjaman_id" value="{{ $d->peminjaman->id }}">
                <div class="mb-3">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input required type="date" value="{{ $d->peminjaman->tanggal_pinjam }}" class="form-control" id="tanggal" name="tanggal_pinjam" required>
                </div>
                <input type="hidden" name="tanggal_kembali_original" value="{{ $d->peminjaman->tanggal_kembali }}">
                <div class="mb-3">
                    <label for="tanggal_kembali" class="form-label">Tanggal Kembali (Paling Lambat {{ $d->peminjaman->tanggal_kembali }})</label>
                    <input required type="date"  class="form-control" id="tanggal" name="tanggal_kembali" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_kembali" class="form-label">Petugas</label>
                    <input type="text"  class="form-control" name="user_id" value="{{ Auth::user()->name ?? '-' }}">
                </div>
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi Buku</label>
                    <input type="text"  class="form-control" name="kondisi_buku">
                </div>
                <input type="hidden" name="id_buku" value="{{ $d->buku->id }}">
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
    @empty
    <div class="alert alert-info">
        Tidak ada buku yang perlu dikembalikan.
    </div>
    @endforelse
@endsection