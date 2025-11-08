<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-dark">Dashboard</h1>

    </div>
    <div class="card stat-card">
        <div class="card-header bg-white border-0 py-3">
            <div class="row">
                <div class="col-6">
                    <h5 class="mb-0 fw-bold">Daftar Buku</h5>
                </div>
                @if (Auth::user()->role == 'petugas' || Auth::user()->role == 'admin')
                    <div class="col-6 d-flex">

                        <a href="{{ route('buku.create') }}" class="btn btn-primary d-lg-inline-block ms-auto">
                            <i class="bi bi-plus-circle-fill me-2"></i> Tambah Buku
                        </a>
                    </div>

                @endif
            </div>
        </div>
        <div class="card-body p-5">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3">
                @foreach ($data as $buku)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">

                            <div class="position-relative">
                                <!-- Gambar Sampul -->
                                <img src="/picture/book/{{ $buku->foto }}" class="card-img-top-book" alt="Judul Buku"
                                    onerror="this.src='https://placehold.co/300x400/eeeeee/999999?text=Error'">

                                <!-- Badge Rak Buku -->
                                <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75">
                                    <i class="bi bi-bookshelf me-1"></i>
                                    {{ $buku->rak->nama_rak ?? 'tidak masuk rak' }}

                                </span>
                            </div>

                            <div class="card-body d-flex flex-column p-3">

                                <!-- Judul Buku -->
                                <h6 class="card-title-book fw-bold text-dark mb-2">
                                    {{ $buku->kode_buku }} : {{ $buku->judul }}
                                </h6>

                                <!-- Pengarang (spt Harga) -->
                                <p class="card-text text-primary fw-bold mb-1">
                                    {{ $buku->pengarang }}
                                </p>

                                <!-- Detail (spt Rating/Terjual) -->
                                <div class="small text-muted mb-2">
                                    <span>{{ $buku->penerbit }}</span>
                                    <span>&bull;</span>
                                    <span>{{ $buku->tahun_terbit }}</span>
                                </div>

                                <!-- Stok (spt Lokasi Toko) -->
                                <div class="small text-muted mb-3">
                                    Stok: <strong class="text-dark">{{ $buku->stok }}</strong>
                                </div>
                                @if (Auth::check() && Auth::user()->role === 'anggota')
                                    {{-- Hanya untuk anggota --}}
                                    @if ($buku->stok < 1)
                                        {{-- Buku habis --}}
                                        <p class="btn btn-sm btn-secondary w-100 mb-0">Maaf, Buku Kosong</p>
                                    @else
                                        {{-- Buku masih ada, boleh pinjam --}}
                                        <a class="btn btn-sm btn-primary w-100" href="{{ route('peminjaman.edit', $buku->kode_buku) }}">
                                            <i class="bi bi-cart-plus"></i> Pinjam
                                        </a>
                                    @endif

                                @elseif (Auth::check() && in_array(Auth::user()->role, ['petugas', 'admin']))
                                    {{-- Admin atau Petugas tetap bisa edit / hapus walau stok habis --}}
                                    <div class="d-inline-flex align-items-center">
                                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning btn-sm me-2">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                        <form onsubmit="confirmDeleteForm(event, this)"
                                            action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection