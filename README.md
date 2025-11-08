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
| Backend | Laravel 12 (PHP 8.3) |
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
```

### 2. Install dependencies
```bash
composer install
npm install
npm run dev
```
### 3. Konfigurasi .env
Salin file contoh:
```bash
cp .env.example .env
```
Lalu ubah koneksi database:
```bash
DB_DATABASE=mylibrary
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate key
```bash
php artisan key:generate
```
### 5. Migrasi database & seed data awal
```bash
php artisan migrate --seed
```
### 6. Jalankan server
```bash
php artisan serve
```
### Akses di browser:
```bash
http://localhost:8000
```
### 👤 Role Default (Seeder)
| Role    | Email                                                 | Password   |
| ------- | ----------------------------------------------------- | ---------- |
| Admin   | [admin@mylibrary.com](mailto:admin@mylibrary.com)     | admin123   |
| Petugas | [petugas@mylibrary.com](mailto:petugas@mylibrary.com) | petugas123 |
| Anggota | [anggota@mylibrary.com](mailto:anggota@mylibrary.com) | anggota123 |


**📂 Struktur Folder Penting**
MyLibrary/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Providers/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   └── js/
├── routes/
│   └── web.php
├── public/
│   └── assets/
└── README.md

💡 Kontributor

👨‍💻 Rivan Alfatoni
Program Studi Sistem Informasi, Fakultas Teknik
Universitas Bengkulu
📧 rivanalfatoni195@gmail.com
🔗 instagram.com/projectvan_


🌟 Dukungan

Kalau repo ini bermanfaat, kasih ⭐ di GitHub ya biar makin semangat update versi berikutnya 😄

