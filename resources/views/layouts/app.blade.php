<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- 
      [PERBAIKAN] Menambahkan @stack('styles') 
      agar halaman turunan bisa menambahkan CSS kustom
    -->
    @stack('styles')

    <style>
        /* Menggunakan font Inter sebagai default */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            /* Latar belakang abu-abu muda */
        }

        /* Warna primer kustom */
        :root {
            --bs-primary-rgb: 108, 99, 255;
            /* Warna ungu modern: #6c63ff */
        }

        .btn-primary {
            background-color: #6c63ff;
            border-color: #6c63ff;
        }

        .btn-primary:hover {
            background-color: #5a52d4;
            border-color: #5a52d4;
        }

        /* --- Sidebar (Desktop) --- */
        .sidebar {
            width: 280px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
        }

        .sidebar .nav-link {
            padding: 0.75rem 1.25rem;
            color: #495057;
            /* Abu-abu gelap */
            font-weight: 500;
            border-radius: 0.5rem;
            /* Sudut membulat */
            margin-bottom: 0.25rem;
            transition: all 0.2s ease-in-out;
        }

        .sidebar .nav-link:hover {
            background-color: #f1f3f5;
            /* Abu-abu sangat muda */
            color: #212529;
        }

        .sidebar .nav-link.active {
            background-color: #6c63ff;
            color: #fff;
            box-shadow: 0 4px 8px rgba(108, 99, 255, 0.2);
        }

        .sidebar .nav-link .bi {
            font-size: 1.1rem;
            width: 2rem;
            /* Menjaga ikon tetap rapi */
            margin-right: 0.5rem;
        }

        .sidebar-brand {
            color: #212529;
            font-weight: 700;
        }

        .sidebar-brand .bi {
            color: #6c63ff;
        }

        /* --- Main Content --- */
        .content-wrapper {
            transition: margin-left 0.3s ease;
        }

        /* Penyesuaian untuk tampilan desktop */
        @media (min-width: 992px) {
            .content-wrapper {
                margin-left: 280px;
                /* Lebar sidebar */
            }
        }

        /* Penyesuaian untuk tampilan mobile */
        @media (max-width: 991.98px) {
            .content-wrapper {
                margin-left: 0;
                /* Memberi ruang di bawah agar tidak tertutup bottom-nav */
                padding-bottom: 80px;
            }

            /* Judul Halaman di Mobile (opsional) */
            .mobile-header {
                padding: 1rem;
                background-color: #fff;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                border-bottom: 1px solid #dee2e6;
            }
        }

        /* --- Bottom Navigation (Mobile) --- */
        .bottom-nav {
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            border-top: 1px solid #dee2e6;
            padding-top: 0.75rem;
            padding-bottom: 0.5rem;
        }

        .bottom-nav-item {
            font-size: 0.75rem;
            /* Teks kecil */
            font-weight: 500;
            color: #6c757d;
            /* Warna abu-abu muted */
        }

        .bottom-nav-item.active {
            color: #6c63ff;
            /* Warna primer */
        }

        .bottom-nav-item .bi {
            font-size: 1.5rem;
            /* Ikon besar */
            margin-bottom: 2px;
        }

        /* --- Utility & Cards --- */
        .stat-card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease-in-out;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card .card-icon {
            padding: 1rem;
            font-size: 1.75rem;
            border-radius: 0.5rem;
        }

        /* Style Card Buku dari file buku/index.blade.php */
        .card-title-book {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Jumlah baris yang diinginkan */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 2.5em;
            /* (font-size * line-height * 2 baris) */
            line-height: 1.25em;
        }

        .card-img-top-book {
            width: 100%;
            height: 200px;
            /* Anda bisa sesuaikan tinggi ini */
            object-fit: cover;
            /* Membuat gambar tidak penyok/stretch */
        }

        /* Style Detail List dari file peminjaman_show.html */
        .details-list dt {
            font-weight: 500;
            color: #6c757d;
            /* Abu-abu */
        }

        .details-list dd {
            font-weight: 600;
            color: #212529;
            /* Hitam */
        }

        .category-grid .category-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: #495057;
        }

        .category-grid .icon-wrapper {
            width: 56px;
            height: 56px;
            border-radius: 1.25rem;
            /* Sudut membulat seperti di gambar */
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f1f3f5;
            /* Latar belakang abu-abu */
            font-size: 1.75rem;
            /* Ukuran ikon */
            margin-bottom: 0.5rem;
            color: #6c63ff;
            /* Warna ikon ungu */
        }

        .category-grid .category-item span {
            font-size: 0.8rem;
            font-weight: 500;
            text-align: center;
        }

        /* Banner Promo (Carousel) */
        .promo-banner {
            border-radius: 0.75rem;
            overflow: hidden;
            background-color: #6c63ff;
            /* Fallback */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 150px;
            /* Tinggi banner */
        }

        .promo-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <div class="d-none d-lg-flex flex-column vh-100 position-fixed top-0 start-0 p-3 sidebar">
        <!-- Sidebar isi dari file aslinya -->
        <a href="#" class="d-flex align-items-center mb-3 text-decoration-none sidebar-brand">
            <i class="bi bi-book-half fs-3 me-2"></i>
            <span class="fs-4">PerpusDigital</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <!-- [PERBAIKAN] Menambahkan route('dashboard') pada href -->
                <a href="{{ route('home.index') }}" class="nav-link {{ Route::is('home.*') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                </a>
            </li>

            @if (Auth::user()->role == 'petugas' || Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('anggota.index') }}" class="nav-link {{ Route::is('anggota.*') ? 'active' : '' }}">
                        <i class="bi bi-collection"></i> Anggota
                    </a>
                </li>
                <li>
                    <a href="{{ route('rak.index') }}" class="nav-link {{ Route::is('rak.*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i> Rak Buku
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('petugas.index') }}" class="nav-link {{ Route::is('petugas.*') ? 'active' : '' }}">
                        <i class="bi bi-person-badge-fill"></i> Petugas
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('buku.index') }}" class="nav-link {{ Route::is('buku.*') ? 'active' : '' }}">
                    <i class="bi bi-book-fill"></i> Buku
                </a>
            </li>

            <li>
                <a href="{{ route('pinjam.index') }}" class="nav-link {{ Route::is('pinjam.*') ? 'active' : '' }}">
                    <i class="bi bi-box-arrow-up-right"></i> Data Peminjaman
                </a>
            </li>

            <li>
                <a href="{{ route('profile.index') }}" class="nav-link {{ Route::is('profile.*') ? 'active' : '' }}">
                    <i class="bi bi-person-circle"></i> Profil
                </a>
            </li>
        </ul>

        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle"
                id="dropdownUser" data-bs-toggle="dropdown">
                <img src="https://placehold.co/32x32/6c63ff/white?text=A" alt="Admin" width="32" height="32"
                    class="rounded-circle me-2">
                <strong>{{ Auth::user()->name }}</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="{{ route('profile.index') }}">Lihat Profil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ url('logout') }}">Keluar</a></li>
            </ul>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="content-wrapper p-3 p-lg-4">
        @yield('content')
    </main>
    <nav class="d-lg-none position-fixed bottom-0 start-0 w-100 bottom-nav">
        <div class="d-flex justify-content-around w-100">
            <!-- Home (Dashboard) -->
            <a href="{{ route('home.index') }}"
                class="d-flex flex-column align-items-center text-decoration-none bottom-nav-item {{ Route::is('home.*') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill"></i><span>Home</span>
            </a>

            <!-- Buku -->
            <a href="{{ route('buku.index') }}"
                class="d-flex flex-column align-items-center text-decoration-none bottom-nav-item {{ Route::is('buku.*') ? 'active' : '' }}">
                <i class="bi bi-book"></i><span>Buku</span>
            </a>

            <!-- Pinjam -->
            <a href="{{ route('pinjam.index') }}"
                class="d-flex flex-column align-items-center text-decoration-none bottom-nav-item {{ Route::is('pinjam.*') ? 'active' : '' }}">
                <i class="bi bi-box-arrow-up-right"></i><span>Pinjam</span>
            </a>

            <!-- Profil -->
            <a href="{{ route('profile.index') }}"
                class="d-flex flex-column align-items-center text-decoration-none bottom-nav-item {{ Route::is('profile.*') ? 'active' : '' }}">
                <i class="bi bi-person"></i><span>Profil</span>
            </a>
        </div>
    </nav>

    <!-- Script -->
    <script>
        function confirmDelete(event, element) {
            // ... (Fungsi Anda sudah benar) ...
            event.preventDefault();
            const deleteUrl = element.href;
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus data!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }
            });
        }

        function confirmDeleteForm(event, form) {
            // ... (Fungsi Anda sudah benar) ...
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus data!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>

    {{-- Notifikasi SweetAlert (Sudah Benar) --}}
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: {{ Js::from(session('success')) }},
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: {{ Js::from(session('error')) }},
                icon: 'error',
                confirmButtonText: 'Tutup'
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 
      [PERBAIKAN] Menambahkan @stack('scripts') 
      agar halaman turunan bisa menambahkan JS kustom
    -->
    @stack('scripts')
</body>

</html>