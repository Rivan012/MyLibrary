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
                    <h5 class="mb-0 fw-bold">Daftar Rak</h5>
                </div>
                @if (Auth::user()->role == 'petugas' || Auth::user()->role == 'admin')
                    <div class="col-6 d-flex">

                        <a href="{{ route('rak.create') }}" class="btn btn-primary d-lg-inline-block ms-auto">
                            <i class="bi bi-plus-circle-fill me-2"></i> Tambah Rak
                        </a>
                    </div>

                @endif
            </div>
        </div>
        <div class="card-body p-5">
            <div class="row ">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <thead>
                                <th>No</th>
                                <th>Kode Rak</th>
                                <th>Nama Rak</th>
                                <th>Lokasi</th>
                                <th colspan="2">Aksi</th>
                            </thead>
                        </tr>
                        <tr>
                            <tbody>
                                @foreach ($rakbuku as $r)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $r->kode_rak }}</td>
                                        <td>{{ $r->nama_rak }}</td>
                                        <td>{{ $r->lokasi }}</td>
                                     
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('rak.edit', $r->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form action="{{ route('rak.destroy', $r->id) }}" method="POST"
                                                onsubmit="confirmDeleteForm(event, this)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
@endsection