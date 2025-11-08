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
                <div class="col-6 d-flex">
                    
                    <a href="{{ url('anggota/create') }}" class="btn btn-primary d-lg-inline-block ms-auto">
                        <i class="bi bi-plus-circle-fill me-2"></i> Tambah Anggota
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-5">
            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $u)
                            <tr>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->npm }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->created_at }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-sm btn-primary" href="{{ route('anggota.edit', $u->id) }}">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                        <form onsubmit="confirmDeleteForm(event, this)"
                                            action="{{ route('anggota.destroy', $u->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection