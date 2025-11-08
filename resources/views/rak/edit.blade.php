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
                    <h5 class="mb-0 fw-bold">Tambah Rak</h5>
                </div>
                @if (Auth::user()->role == 'petugas' || Auth::user()->role == 'admin')
                    <div class="col-6 d-flex">

                        <a href="{{ route('rak.index') }}" class="btn btn-primary d-lg-inline-block ms-auto">
                            Kembali
                        </a>
                    </div>

                @endif
            </div>
        </div>
        <div class="card-body p-5">
            <div class="row  g-3">
                <form action="{{ route('rak.update',$rak->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="kode_rak" class="form-label">Kode Rak</label>
                        <input type="text" value="{{ $rak->kode_rak }}" disabled class="form-control" id="kode_rak" name="kode_rak" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_rak" class="form-label">Nama Rak</label>
                        <input type="text" value="{{ $rak->nama_rak }}" class="form-control" id="nama_rak" name="nama_rak" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Rak</label>
                        <input type="text" value="{{ $rak->lokasi }}" class="form-control" id="lokasi" name="lokasi" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Rak</button>
                </form>
            </div>
        </div>
@endsection