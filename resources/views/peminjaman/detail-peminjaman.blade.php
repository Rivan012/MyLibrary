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
                    <h5 class="mb-0 fw-bold">Detail Peminjaman</h5>
                </div>
                <div class="col-6 d-flex">
                    <a href="{{ route('pinjam.index') }}" class="btn btn-primary d-lg-inline-block ms-auto">Kembali</a>
                </div>

            </div>
        </div>
        <div class="card-body p-5">
            <div class="row g-4">
                <div class="col-lg-8 col-12">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="mb-0 fw-bold">Informasi Peminjaman</h5>
                        </div>
                        <div class="card-body p-4">
                            <dl class="row details-list">
                                <dt class="col-sm-4">Kode Pinjam</dt>
                                <dd class="col-sm-8">{{ $detail->kode_peminjaman }}</dd>

                                <dt class="col-sm-4">Status</dt>
                                <dd class="col-sm-8">
                                    <span
                                        class="badge fs-6 bg-success bg-opacity-25 text-success-emphasis border border-success-subtle">
                                        <i class="bi bi-check-circle-fill me-1"></i>
                                        {{ $detail->status }}
                                    </span>
                                </dd>

                                <dt class="col-sm-4">Tanggal Pinjam</dt>
                                <dd class="col-sm-8">{{ $detail->tanggal_pinjam }}</dd>

                                <dt class="col-sm-4">Jatuh Tempo</dt>
                                <dd class="col-sm-8">{{ $detail->tanggal_kembali }}</dd>

                                <dt class="col-sm-4">Tanggal Kembali</dt>
                                <dd class="col-sm-8">-</dd>

                                <hr class="my-3">

                                <dt class="col-sm-4">Denda</dt>
                                <dd class="col-sm-8 h5 text-danger fw-bold">Rp {{ $total }}</dd>

                                <dt class="col-sm-4">Petugas</dt>
                                <dd class="col-sm-8">{{ $detail->petugas->name ?? '-' }}</dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Card 2: Informasi Peminjam -->
                    <div class="card shadow-sm border-0 rounded-3 mt-4">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="mb-0 fw-bold">Informasi Peminjam</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center">
                                <img src="https://placehold.co/64x64/6c63ff/white?text=A" class="rounded-circle me-3"
                                    alt="Avatar Peminjam">
                                <div>
                                    <h5 class="mb-0 fw-bold text-dark">{{ $detail->user->name }}</h5>
                                    <div class="text-muted">NPM : {{ $detail->user->npm }}</div>
                                    <div class="small text-muted mt-1">
                                        <i class="bi bi-envelope-fill me-1"></i> {{ $detail->user->email }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-12">

                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">

                        @foreach ($detail->detail as $d)
                            <div class="position-relative">
                                <!-- Gambar Sampul -->
                                <img src="https://placehold.co/300x400/6c63ff/white?text=Atomic+Habits"
                                    class="card-img-top-book" alt="Judul Buku"
                                    onerror="this.src='https://placehold.co/300x400/eeeeee/999999?text=Error'">

                                <!-- Badge Rak Buku -->
                                <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75">
                                    <i class="bi bi-bookshelf me-1"></i>
                                    {{ $d->buku->rak->nama_rak ?? '-' }}

                                </span>
                            </div>

                            <div class="card-body d-flex flex-column p-3">
                                <!-- Judul Buku -->
                                <h6 class="card-title-book fw-bold text-dark mb-2">
                                    {{ $d->buku->kode_buku }} : {{ $d->buku->judul }}
                                </h6>

                                <!-- Pengarang -->
                                <p class="card-text text-primary fw-bold mb-1">
                                    {{ $d->buku?->pengarang ?? '-' }}
                                </p>

                                <!-- Detail tambahan -->
                                <div class="small text-muted mb-2">
                                    <span>{{ $d->buku?->penerbit ?? '-' }}</span>
                                    <span>&bull;</span>
                                    <span>{{ $d->buku?->tahun_terbit ?? '-' }}</span>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection