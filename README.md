# Coffee Shop Management System

Sistem manajemen terintegrasi untuk mengelola operasional coffee shop, termasuk penjualan, inventori, laporan, dan manajemen customer dengan sistem poin loyalitas.

## 📋 Daftar Isi

- [Deskripsi](#deskripsi)
- [Fitur](#fitur)
- [Teknologi](#teknologi)
- [Struktur Proyek](#struktur-proyek)
- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)
- [Role & Akses](#role--akses)
- [Struktur Halaman](#struktur-halaman)

## 📝 Deskripsi

Coffee Shop Management System adalah aplikasi web berbasis CodeIgniter 3 yang dirancang untuk mengelola seluruh operasional coffee shop. Sistem ini mendukung multi-role dengan akses berbeda untuk Admin, Manager, Kasir, dan Customer.

## ✨ Fitur

### 🎯 Fitur Umum
- ✅ Multi-role system (Admin, Manager, Kasir, Customer)
- ✅ Dashboard dengan grafik interaktif
- ✅ Light/Dark mode
- ✅ Responsive design
- ✅ UI/UX modern dengan AdminLTE

### 👨‍💼 Admin Panel
- **Dashboard**: Grafik penjualan, metode pembayaran, pertumbuhan user
- **Pembelian (POS)**: Sistem kasir untuk transaksi pembelian
- **Kelola Produk**: 
  - Original (Signature espresso dan house blend)
  - Topping (Sirup, jelly, dan crunchy topping)
  - Extra (Shot espresso tambahan dan susu alternatif)
  - Lain-lain (Merchandise, kemasan, perlengkapan)
- **Kelola User**: 
  - Admin (Kontrol penuh sistem)
  - Kasir (Tim frontliner POS)
  - Customer (Program loyalitas dengan poin)
- **Laporan**:
  - Penjualan (Ringkasan transaksi kasir)
  - Pembelian (Monitoring purchase order)
- **Profil Saya**: Edit profil dan ganti password
- **Pengaturan**: Nama sistem, deskripsi sistem, tema tampilan

### 👔 Manager Panel
- **Dashboard**: Kontrol insight harian sampai tahunan
- **Kelola User**: Customer dan Kasir
- **Laporan**: Penjualan dan Pembelian
- **Profil Saya**: Edit profil dan ganti password
- **Pengaturan**: Konfigurasi sistem

### 💰 Kasir Panel (POS)
- **Katalog Produk**: Grid produk dengan filter kategori
- **Keranjang Aktif**: Tambah/kurang qty, hapus item
- **Metode Pembayaran**: Tunai, QRIS Static, QRIS Dinamis, Kartu Debit, Split Bill
- **Aksi Transaksi**: Batalkan, Hold pesanan, Bayar & cetak struk
- **Ringkasan Shift**: Statistik transaksi harian

### 👤 Customer Panel
- **Dashboard**: Tampilan customer dengan poin loyalitas
- **Riwayat Transaksi**: History pembelian
- **Profil**: Kelola data pribadi

## 🛠 Teknologi

### Backend
- **Framework**: CodeIgniter 3.x
- **PHP**: 7.4+
- **Database**: MySQL (dapat dikonfigurasi)

### Frontend
- **CSS Framework**: AdminLTE 3.2
- **JavaScript Library**: 
  - jQuery 3.6.4
  - Chart.js 4.4.0
  - DataTables 1.13.7
  - SweetAlert2 11
- **Icons**: Font Awesome 5.15.4
- **Font**: Inter (Google Fonts)

## 📁 Struktur Proyek

```
template_coffee-shop_kasir/
├── application/
│   ├── controllers/
│   │   ├── Admin.php          # Controller untuk halaman admin
│   │   ├── Manager.php        # Controller untuk halaman manager
│   │   ├── Kasir.php          # Controller untuk halaman kasir
│   │   └── Customer.php       # Controller untuk halaman customer
│   ├── views/
│   │   ├── admin/             # Views untuk admin panel
│   │   │   ├── dashboard.php
│   │   │   ├── pembelian.php
│   │   │   ├── produk.php
│   │   │   ├── users.php
│   │   │   ├── laporan.php
│   │   │   ├── profil.php
│   │   │   └── pengaturan.php
│   │   ├── manager/           # Views untuk manager panel
│   │   ├── kasir/             # Views untuk kasir panel
│   │   ├── customer/          # Views untuk customer panel
│   │   └── inc/               # Include files (header, footer, sidebar, navbar)
│   │       ├── admin/
│   │       ├── manager/
│   │       ├── kasir/
│   │       └── customer/
│   ├── config/                # Konfigurasi aplikasi
│   └── helpers/               # Helper functions
├── assets/
│   ├── style/                 # CSS files
│   │   ├── css/
│   │   └── frontend/
│   └── js/                    # JavaScript files
│       └── js/
├── system/                    # Core CodeIgniter
└── index.php                  # Entry point aplikasi
```

## 🚀 Instalasi

### Persyaratan
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Web server (Apache/Nginx) atau XAMPP/WAMP
- Composer (opsional)

### Langkah Instalasi

1. **Clone atau download proyek**
   ```bash
   git clone <repository-url>
   cd template_coffee-shop_kasir
   ```

2. **Konfigurasi Database**
   - Buka `application/config/database.php`
   - Sesuaikan konfigurasi database:
   ```php
   $db['default'] = array(
       'dsn'   => '',
       'hostname' => 'localhost',
       'username' => 'root',
       'password' => '',
       'database' => 'coffee_shop_db',
       // ...
   );
   ```

3. **Import Database** (jika ada file SQL)
   ```bash
   mysql -u root -p coffee_shop_db < database.sql
   ```

4. **Konfigurasi Base URL**
   - Buka `application/config/config.php`
   - Sesuaikan base_url:
   ```php
   $config['base_url'] = 'http://localhost/template_coffee-shop_kasir/';
   ```

5. **Set Permissions** (Linux/Mac)
   ```bash
   chmod -R 755 application/cache
   chmod -R 755 application/logs
   ```

6. **Akses Aplikasi**
   - Buka browser: `http://localhost/template_coffee-shop_kasir/`
   - Atau sesuai konfigurasi virtual host Anda

## 📖 Penggunaan

### Akses Halaman

#### Admin Panel
```
http://localhost/template_coffee-shop_kasir/admin
http://localhost/template_coffee-shop_kasir/admin/dashboard
http://localhost/template_coffee-shop_kasir/admin/pembelian
http://localhost/template_coffee-shop_kasir/admin/produk/original
http://localhost/template_coffee-shop_kasir/admin/users/admin
http://localhost/template_coffee-shop_kasir/admin/laporan/penjualan
http://localhost/template_coffee-shop_kasir/admin/profil
http://localhost/template_coffee-shop_kasir/admin/pengaturan
```

#### Manager Panel
```
http://localhost/template_coffee-shop_kasir/manager
http://localhost/template_coffee-shop_kasir/manager/users/customer
http://localhost/template_coffee-shop_kasir/manager/laporan/penjualan
http://localhost/template_coffee-shop_kasir/manager/profil
http://localhost/template_coffee-shop_kasir/manager/pengaturan
```

#### Kasir Panel (POS)
```
http://localhost/template_coffee-shop_kasir/kasir
```

#### Customer Panel
```
http://localhost/template_coffee-shop_kasir/customer
```

### Navigasi Antar Role
Gunakan dropdown "Navigasi" di navbar untuk berpindah antar role (Admin, Manager, Kasir, Customer).

## 👥 Role & Akses

### 🔐 Admin
**Akses Penuh:**
- ✅ Dashboard dengan semua statistik
- ✅ Pembelian (POS) - dapat berperan sebagai kasir
- ✅ Kelola Produk (Original, Topping, Extra, Lain-lain)
- ✅ Kelola User (Admin, Kasir, Customer)
- ✅ Laporan (Penjualan & Pembelian)
- ✅ Profil & Pengaturan Sistem

### 👔 Manager
**Akses Terbatas:**
- ✅ Dashboard dengan insight harian-tahunan
- ✅ Kelola User (Customer & Kasir saja)
- ✅ Laporan (Penjualan & Pembelian)
- ✅ Profil & Pengaturan

### 💰 Kasir
**Akses POS:**
- ✅ Katalog Produk
- ✅ Keranjang & Transaksi
- ✅ Metode Pembayaran
- ✅ Ringkasan Shift

### 👤 Customer
**Akses Publik:**
- ✅ Dashboard Customer
- ✅ Riwayat Transaksi
- ✅ Profil & Poin Loyalitas

## 📄 Struktur Halaman

### Admin - Kelola Produk
- **URL Pattern**: `/admin/produk/{kategori}`
- **Kategori**: `original`, `topping`, `extra`, `lainnya`
- **Fitur**: CRUD produk dengan DataTables, filter, pagination

### Admin - Kelola User
- **URL Pattern**: `/admin/users/{role}`
- **Role**: `admin`, `kasir`, `customer`, `semua`
- **Fitur**: 
  - Kolom berbeda untuk Customer (nama, email, telepon, poin)
  - Kolom berbeda untuk Admin/Kasir (username, role, status)

### Admin - Laporan
- **URL Pattern**: `/admin/laporan/{jenis}`
- **Jenis**: `penjualan`, `pembelian`
- **Fitur**: DataTables dengan filter kolom, export, ringkasan

### Manager - Kelola User
- **URL Pattern**: `/manager/users/{role}`
- **Role**: `customer`, `kasir`
- **Fitur**: CRUD dengan DataTables

### Manager - Laporan
- **URL Pattern**: `/manager/laporan/{jenis}`
- **Jenis**: `penjualan`, `pembelian`

## 🎨 Fitur UI/UX

### DataTables
- Filter per kolom
- Pagination (5, 10, 15, 20, 50, Semua)
- Pencarian global
- Responsive design

### SweetAlert2
- Notifikasi sukses/error
- Konfirmasi untuk aksi penting
- Toast notifications

### Chart.js
- Line chart untuk tren penjualan
- Doughnut chart untuk metode pembayaran
- Bar chart untuk pertumbuhan user

### Light/Dark Mode
- Toggle tema di halaman Pengaturan
- Disimpan di localStorage
- Tidak ada notifikasi pop-up saat perubahan

## 🔧 Konfigurasi

### Mengubah Base URL
Edit `application/config/config.php`:
```php
$config['base_url'] = 'http://your-domain.com/';
```

### Mengubah Database
Edit `application/config/database.php`:
```php
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'your_username';
$db['default']['password'] = 'your_password';
$db['default']['database'] = 'your_database';
```

## 📝 Catatan Penting

- ⚠️ **Mode Dummy**: Saat ini aplikasi menggunakan data dummy untuk preview tampilan
- ⚠️ **Database**: Belum ada struktur database yang diimplementasikan
- ⚠️ **Authentication**: Sistem autentikasi belum diimplementasikan
- ✅ **UI/UX**: Semua tampilan sudah lengkap dan interaktif
- ✅ **Responsive**: Semua halaman sudah responsive

## 🐛 Troubleshooting

### Halaman tidak muncul
- Pastikan base_url sudah benar di `config.php`
- Pastikan mod_rewrite aktif (Apache)
- Cek file `.htaccess` di root

### CSS/JS tidak muncul
- Pastikan path assets sudah benar
- Cek console browser untuk error 404
- Pastikan folder `assets` ada dan dapat diakses

### Database error
- Pastikan MySQL service berjalan
- Cek kredensial database di `database.php`
- Pastikan database sudah dibuat

## 📞 Kontak & Support

- **Email**: mynameisabdul14@gmail.com
- **WhatsApp**: +62 813-1608-8986

## 📄 License

Proyek ini menggunakan CodeIgniter 3 yang berlisensi MIT License.
