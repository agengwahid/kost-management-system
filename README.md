# 🌿 Senopati Residence — Boutique Living & Kost Management System

> **Platform Web Profil & Manajemen Operasional Kost Butik Eksklusif**  
> Dibangun dengan **Laravel 12**, **Tailwind CSS v4**, **Vite 7**, dan **Blade Engine**, menghadirkan antarmuka residensial premium (*quiet luxury*) yang terintegrasi langsung dengan alur reservasi WhatsApp.

---

## ✨ Fitur Unggulan

### 1. Sisi Penghuni & Calon Penyewa (Public-Facing)
- **Boutique Sanctuary Hero Banner**: Informasi ketersediaan kamar kosong secara *real-time* (*live inventory tracking*).
- **Katalog Kamar Interaktif**: Filter tipe kamar (Deluxe, Superior, Standard), spesifikasi detail (luas, kasur orthopedic, AC, kamar mandi dalam air panas), dan modal pratinjau spesifikasi.
- **Studio Estimasi Biaya Sewa (Kalkulator)**: Kalkulasi sewa instan dengan diskon berjenjang (3 bulan: diskon 5%, 6 bulan: diskon 8%, 1 tahun: diskon 12%) serta layanan opsional (slot parkir mobil, laundry express).
- **Formulir Reservasi Survey Terintegrasi**: Pengajuan jadwal kunjungan tersimpan ke database dan otomatis membuat tautan konfirmasi WhatsApp ke pengelola.
- **Galeri Suasana Properti**: Lightbox foto autentik resolusi tinggi.
- **Aksesibilitas SCBD & Transportasi**: Informasi jarak tempuh dan peta lokasi interaktif.
- **Concierge WhatsApp Floating Button**: Komunikasi langsung calon penyewa dengan pengelola kost.

### 2. Sisi Pengelola Kost (Protected Admin Area)
- **Keamanan & Autentikasi**: Terproteksi penuh oleh middleware `auth` dengan tombol akses yang diskret (tidak mengganggu calon penyewa).
- **Dashboard Ringkasan Operasional**: Statistik total unit, okupansi kamar, dan antrean survey terbaru.
- **Manajemen Kamar**: Operasi CRUD data kamar, harga bulanan/tahunan, dan *toggle switch* ketersediaan kamar instan.
- **Pelacakan Pengajuan Survey**: Pembaruan status pemohon (Pending, Dihubungi, Selesai, Batal).
- **Galeri Foto Kost**: Manajemen dokumentasi visual properti.
- **Pengaturan Umum**: Konfigurasi dinamis nama properti, nomor WhatsApp, alamat, aturan tata tertib tinggal, dan poin lokasi strategis.

---

## 🛠️ Tech Stack

- **Backend**: Laravel 12.x (PHP 8.3+)
- **Frontend**: Blade Templating Engine
- **Styling**: Tailwind CSS v4.x (`@tailwindcss/vite`)
- **Build Tool**: Vite 7.x
- **Icons**: Lucide Icons
- **Database**: SQLite (dapat beralih ke MySQL / PostgreSQL)
- **Typography**: Playfair Display (Editorial Display) & Plus Jakarta Sans

---

## 🚀 Panduan Instalasi Lokal

### 1. Clone Repository
```bash
git clone https://github.com/agengwahid/kost-senopati-residence.git
cd kost-senopati-residence
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Lingkungan (.env)
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Setup Database & Seeder
```bash
touch database/database.sqlite
php artisan migrate --seed
```

### 5. Kompilasi Aset Frontend
```bash
npm run build
# Atau untuk mode pengembangan (hot reload):
# npm run dev
```

### 6. Jalankan Server
```bash
php artisan serve
```
Buka browser Anda di `http://127.0.0.1:8000`.

---

## 🔐 Kredensial Akun Demo Admin

| Role | Email | Password | URL Akses |
| :--- | :--- | :--- | :--- |
| **Admin Pengelola** | `admin@kost.com` | `password123` | `http://127.0.0.1:8000/login` |

---

## 📄 Lisensi
Didistribusikan di bawah lisensi [MIT License](LICENSE).

