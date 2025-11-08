# 📚 MyLibraryUnib

MyLibraryUnib adalah sistem manajemen perpustakaan berbasis web yang dikembangkan menggunakan **Laravel 12**, bertujuan untuk mempermudah proses pengelolaan data buku, anggota, peminjaman, dan pengembalian secara digital.  
Aplikasi ini mendukung multi-role (Admin, Petugas, dan Anggota) dengan antarmuka modern dan responsif.

---

## 🚀 Fitur Utama

- 🔐 **Autentikasi Multi-Role**
  - Login & Register untuk Admin, Petugas, dan Anggota
  - Middleware role-based access

- 📖 **Manajemen Buku**
  - CRUD Buku & Rak Buku
  - Pencarian dan filter berdasarkan judul, pengarang, atau tahun terbit

- 👥 **Manajemen Anggota**
  - Registrasi dan update profil anggota
  - Penomoran otomatis kode anggota

- 📚 **Peminjaman & Pengembalian**
  - Input transaksi peminjaman
  - Pengembalian otomatis dengan perhitungan denda

- 💰 **Denda Otomatis**
  - Konfigurasi nominal denda per hari keterlambatan
  - Laporan rekap denda

- 🧾 **Laporan & Cetak**
  - Cetak resi peminjaman
  - Laporan harian, bulanan, dan tahunan

- 📱 **UI Modern & Responsif**
  - Desain berbasis Bootstrap 5 dan icon library Lucide/Bootstrap Icons

---

## 🛠️ Teknologi yang Digunakan

| Komponen | Teknologi |
|-----------|------------|
| Backend | Laravel 10 (PHP 8.2) |
| Frontend | Blade, Bootstrap 5, jQuery |
| Database | MySQL / MariaDB |
| Auth | Laravel Breeze / Custom Middleware |
| Hosting | Laravel Shared Hosting / Localhost (Laragon) |

---

## ⚙️ Instalasi di Lokal

### 1. Clone repository
```bash
git clone https://github.com/Rivan012/MyLibrary.git
cd MyLibrary
