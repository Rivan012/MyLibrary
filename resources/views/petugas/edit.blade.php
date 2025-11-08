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
                <a href="{{ route('petugas.index') }}" class="btn btn-primary ms-auto"> Kembali</a>
            </div>
            <div class="card-body">
                <form action="{{ route('petugas.update',$petugas->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" value="{{ $petugas->name }}" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ $petugas->email }}" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label fw-bold">Upload Foto</label>
                        <input type="file" accept="image/*" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="mb-3 text-center">
                        <img id="preview" src="#" alt="Preview Foto"
                            style="display: none; max-width: 250px; border-radius: 10px; box-shadow: 0 0 5px rgba(0,0,0,0.3);" />
                    </div>

                    <script>
                        document.getElementById('foto').addEventListener('change', function (e) {
                            const file = e.target.files[0];
                            const preview = document.getElementById('preview');

                            if (!file) {
                                preview.style.display = 'none';
                                preview.src = '#';
                                return;
                            }
                            if (file.size > 2 * 1024 * 1024) {
                                alert('Ukuran file maksimal 2MB!');
                                e.target.value = ''; // reset input
                                preview.style.display = 'none';
                                preview.src = '#';
                                return;
                            }

                            if (!file.type.startsWith('image/')) {
                                alert('Hanya file gambar yang diperbolehkan!');
                                e.target.value = '';
                                preview.style.display = 'none';
                                preview.src = '#';
                                return;
                            }
                            const reader = new FileReader();
                            reader.onload = function (event) {
                                preview.src = event.target.result;
                                preview.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        });
                    </script>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
@endsection