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
                    <h5 class="mb-0 fw-bold">Tambah Buku</h5>
                </div>
                @if (Auth::user()->role == 'petugas' || Auth::user()->role == 'admin')
                    <div class="col-6 d-flex">

                        <a href="{{ route('buku.index') }}" class="btn btn-primary d-lg-inline-block ms-auto">
                            <i class="bi bi-backward"></i> Kembali
                        </a>
                    </div>

                @endif
            </div>
        </div>
        <div class="card shadow-sm border-0 rounded-3">

            <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body p-4">

                    <!-- Grid Form 2 Kolom -->
                    <div class="row g-3">

                        <!-- Kolom Kiri (Input Teks Utama) -->
                        <div class="col-lg-8 col-12">
                            <div class="mb-3">
                                <label for="judul" class="form-label fw-bold">Judul Buku</label>
                                <input type="text" value="{{ $buku->judul }}" name="judul" class="form-control" id="judul"
                                    placeholder="Masukkan judul buku" required>
                            </div>
                            <div class="mb-3">
                                <label for="pengarang" class="form-label fw-bold">Pengarang</label>
                                <input type="text" value="{{ $buku->pengarang }}" name="pengarang" class="form-control"
                                    id="pengarang" placeholder="Masukkan nama pengarang" required>
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label fw-bold">Penerbit</label>
                                <input type="text" value="{{ $buku->penerbit }}" name="penerbit" class="form-control"
                                    id="penerbit" placeholder="Masukkan nama penerbit">
                            </div>
                            <div class="mb-3">
                                <label for="kode_buku" class="form-label fw-bold">Kode buku</label>
                                <input type="text" value="{{ $buku->kode_buku }}" name="kode_buku" class="form-control"
                                    id="kode_buku" placeholder="Contoh: 978-602-06-3317-6">
                            </div>
                            <div class="mb-3">
                                <label for="sinopsis" class="form-label fw-bold">Sinopsis / Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="sinopsis" rows="5"
                                    placeholder="Tuliskan deskripsi singkat buku...">{{ $buku->deskripsi }}</textarea>
                            </div>
                        </div>

                        <!-- Kolom Kanan (Metadata & File) -->
                        <div class="col-lg-4 col-12">
                            <div class="mb-3">
                                <label for="tahun" class="form-label fw-bold">Tahun Terbit</label>
                                <input type="number" class="form-control" value="{{ $buku->tahun_terbit }}"
                                    name="tahun_terbit" id="tahun" placeholder="YYYY" min="1900" max="2099">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label fw-bold">Jumlah (Stok)</label>
                                <input type="number" class="form-control" value="{{ $buku->stok }}" name="stok" id="jumlah"
                                    placeholder="0" min="0" required>
                            </div>
                            <div class="mb-3">
                                <label for="rak" class="form-label fw-bold">Lokasi Rak</label>
                                <select class="form-select" name="rak_id" id="rak" required>
                                    <option value="{{ $buku->rak->id ?? '' }}" selected>{{ $buku->rak->nama_rak ?? '' }}</option>
                                    @foreach ($rak as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_rak }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="sampul" class="form-label fw-bold">Sampul Buku (Cover)</label>

                                {{-- Preview gambar lama --}}
                                @if ($buku->foto)
                                    <div class="mb-2">
                                        <img id="preview-image" src="{{ asset('picture/book/' . $buku->foto) }}"
                                            alt="Sampul Lama" width="150" class="img-thumbnail">
                                    </div>
                                @else
                                    <div class="mb-2">
                                        <img id="preview-image" src="https://via.placeholder.com/150?text=No+Image"
                                            alt="Tidak ada sampul" width="150" class="img-thumbnail">
                                    </div>
                                @endif

                                {{-- Input file --}}
                                <input class="form-control" name="foto" type="file" id="sampul" accept="image/*">
                                <div class="form-text">Maks. 2MB (Format: JPG, PNG)</div>
                            </div>

                            {{-- Script preview saat pilih file baru --}}
                            <script>
                                document.getElementById('sampul').addEventListener('change', function (event) {
                                    const image = document.getElementById('preview-image');
                                    const file = event.target.files[0];
                                    if (file) {
                                        image.src = URL.createObjectURL(file);
                                    }
                                });
                            </script>
                        </div>

                    </div>
                </div> 
                <div class="card-footer bg-white border-0 p-4 pt-0">
                    <hr class="my-3">
                    <div class="d-flex justify-content-end gap-2">
                        {{-- <button type="reset" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-counterclockwise me-2"></i> Reset
                        </button> --}}
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save-fill me-2"></i> Simpan Buku
                        </button>
                    </div>
                </div>

            </form>
        </div>
@endsection