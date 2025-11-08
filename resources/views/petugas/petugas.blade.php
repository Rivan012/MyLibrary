<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card stat-card">
        <div class="card-body p-2">
            <div class="container-fluid px-0">
                <div class="p-3">
                    <h4>Kelola data Petugas</h4>
                </div>
                <a href="{{ route('petugas.create') }}" class="btn btn-primary ms-auto"><i class="bi bi-plus"></i> Tambah Petugas</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Foto</th>
                        <th>Tanggal dibuat</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($petugas as $p)
                        <tr>
                            <tbody>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ $p->role }}</td>
                                <td><img src="/foto/profile/{{ $p->foto }}" width="50px" alt=""></td>
                                <td>{{ $p->created_at }}</td>
                                <td class="d-flex gap">
                                    <a href="{{ route('petugas.edit', $p->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form action="{{ route('petugas.destroy', $p->id) }}" method="POST"
                                        onsubmit="confirmDeleteForm(event, this)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tbody>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
@endsection