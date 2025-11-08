<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-dark">Dashboard</h1>
    <a href="{{ url('anggota') }}" class="btn btn-primary d-lg-inline-block ms-auto">
        <i class="bi bi-backward me-2"></i> Kembali
    </a>
</div>
<div class="card stat-card">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0 fw-bold">Edit Anggota : {{ $user->name }}</h5>
    </div>
    <div class="card-body p-5">
        <form action="{{ route('anggota.update',$user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" value="{{ $user->name }}" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" value="{{ $user->npm }}" class="form-control" id="npm" name="npm" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-success">Update Anggota</button>
        </form>
    </div>
</div>
@endsection
