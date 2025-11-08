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
                    <h5 class="mb-0 fw-bold">Daftar Anggota</h5>
                </div>
            </div>
        </div>
        <div class="card-body p-5">
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Kode Peminjaman</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pinjam as $p)
                            <tr>
                                <td>{{ $p->kode_peminjaman }}</td>
                                <td>{{ $p->user->name ?? '-' }}</td>
                                <td>{{ $p->tanggal_pinjam }}</td>
                                <td>{{ $p->tanggal_kembali }}</td>
                                <td>
                                    @if ($p->status == 'dipinjam')
                                        <span class="badge bg-warning">Dipinjam</span>
                                    @elseif ($p->status == 'dikembalikan')
                                        <span class="badge bg-success">Dikembalikan</span>
                                    @else
                                        <span class="badge bg-danger">Terlambat</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-sm btn-info" href="{{ route('pinjam.show', $p->id) }}">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'petugas')
                                            {{-- tombol kembalikan (buku pertama di detail) --}}
                                            @if ($p->detail->first() && $p->status == 'dipinjam')
                                                <a href="{{ route('pinjam.edit', $p->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-arrow-counterclockwise"></i>
                                                </a>

                                            @endif

                                            <form onsubmit="confirmDeleteForm(event, this)"
                                                action="{{ route('pinjam.destroy', $p->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                @if ($pinjam->isEmpty())
                    <p class="text-center mt-3">Belum ada data peminjaman.</p>
                @endif


            </div>

        </div>
    </div>
@endsection