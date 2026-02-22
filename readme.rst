# Dombaku - Sistem Manajemen Ternak Domba & Kambing

**Dombaku** adalah aplikasi manajemen peternakan berbasis web yang dirancang khusus untuk mempermudah pencatatan dan pemantauan ternak domba dan kambing secara digital. Aplikasi ini membantu pemilik peternakan dan operator dalam mengelola data populasi, kesehatan, hingga aspek finansial peternakan dalam satu sistem terpusat.

---

## 🚀 Fitur Utama

Sistem ini memiliki berbagai modul yang mencakup siklus hidup ternak:

- **Manajemen Identitas Ternak**: Pencatatan detail ternak (jenis, tgl lahir, asal) dilengkapi dengan **QR Code** untuk identifikasi cepat.
- **Pemantauan Pertumbuhan**: Pencatatan berat, tinggi, dan panjang badan secara berkala serta laporan **ADG (Average Daily Gain)** untuk melihat efektivitas pakan.
- **Manajemen Kesehatan**: Riwayat penyakit, diagnosis dokter, tindakan medis, dan penjadwalan **Vaksinasi**.
- **Siklus Reproduksi**: Manajemen riwayat perkawinan, pemantauan siklus birahi, hingga estimasi **Hari Perkiraan Lahir (HPL)**.
- **Manajemen Pakan**: Pengaturan stok pakan dan jadwal pemberian pakan harian per kandang.
- **Laporan Keuangan**: Pencatatan transaksi penjualan, pembelian, biaya operasional, dan konfigurasi harga pasar.
- **User Management**: Mendukung multi-user dengan hak akses berbeda (**Administrator** dan **Operator**).

---

## 🛠️ Teknologi yang Digunakan

Aplikasi ini dibangun menggunakan stack teknologi berikut:

- **Framework**: CodeIgniter 3 (PHP)
- **Database**: MySQL
- **Template**: AdminLTE (Dashboard)
- **Library**:
  - `mpdf/mpdf`: Untuk pembuatan laporan PDF.
  - `picqer/php-barcode-generator`: Untuk pembuatan barcode/QR code ternak.
  - `Bootstrap`: Framework CSS untuk antarmuka responsif.

---

## 📥 Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal atau server:

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/dombaku.git
   cd dombaku
   ```

2. **Setup Database**
   - Buat database baru di MySQL (misal: `kambing`).
   - Import file SQL yang tersedia di `/db/kambing.sql`.

3. **Konfigurasi Database**
   - Buka file `application/config/database.php`.
   - Sesuaikan `hostname`, `username`, `password`, dan `database` dengan environment Anda.

4. **Instalasi Dependency (Opsional)**
   Sistem ini sudah menyertakan folder `vendor`. Jika ingin memperbarui library, jalankan:
   ```bash
   composer install
   ```

5. **Jalankan Aplikasi**
   - Pindahkan folder proyek ke direktori server web Anda (misal: `htdocs` atau `/var/www/html/`).
   - Akses melalui browser: `http://localhost/dombaku`.

---

## 🔑 Akses Login Default

- **URL Login**: `http://localhost/dombaku/autentikasi`
- **Administrator**:
  - Username: `admin`
  - Password: `admin`

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah **MIT License**. Silakan lihat file `license.txt` untuk informasi lebih lanjut.

---

**Dombaku** - *Digitalisasi Peternakan untuk Masa Depan yang Lebih Maju.*
