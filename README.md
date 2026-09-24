# 88 Group - Website Landing Page (CodeIgniter 4)

Website landing page untuk 88 Group, perusahaan pengolahan hasil tembakau di Bondowoso, Jawa Timur.

## 🚀 Fitur

- ✅ Halaman Home dengan Hero Carousel
- ✅ Halaman Produk dengan Filter SKT/SKM
- ✅ Halaman Tentang Perusahaan
- ✅ Halaman Karir dengan Form Lamaran
- ✅ Responsive Design
- ✅ Animasi Smooth
- ✅ CodeIgniter 4 Framework

## 📁 Struktur Proyek

```
ci4-88group/
├── app/
│   ├── Controllers/
│   │   ├── Home.php          # Controller halaman utama
│   │   ├── Produk.php        # Controller halaman produk
│   │   ├── Tentang.php       # Controller halaman tentang
│   │   └── Karir.php         # Controller halaman karir
│   ├── Views/
│   │   ├── templates/
│   │   │   ├── head.php      # Template head HTML
│   │   │   ├── navbar.php    # Template navigasi
│   │   │   └── footer.php    # Template footer
│   │   ├── styles/
│   │   │   ├── produk_style.php
│   │   │   ├── tentang_style.php
│   │   │   └── karir_style.php
│   │   ├── home.php          # View halaman home
│   │   ├── produk.php        # View halaman produk
│   │   ├── tentang.php       # View halaman tentang
│   │   └── karir.php         # View halaman karir
│   └── Config/
│       └── Routes.php        # Routing URLs
└── public/
    ├── style.css             # CSS utama
    ├── js/
    │   └── carousel.js       # JavaScript carousel
    ├── foto/                 # Folder gambar banner
    └── foto_produk/          # Folder gambar produk
```

## 🛠️ Instalasi

### Cara 1: Development Server (Recommended)

```bash
cd ci4-88group
php spark serve
```

Buka browser: **http://localhost:8080**

### Cara 2: XAMPP

1. Copy folder `ci4-88group` ke `C:\xampp\htdocs\`
2. Akses: **http://localhost/ci4-88group/public/**

## 📍 URL Routing

| Halaman | URL | Controller |
|---------|-----|------------|
| Home | `/` | Home::index |
| Produk | `/produk` | Produk::index |
| Tentang | `/tentang` | Tentang::index |
| Karir | `/karir` | Karir::index |

## 🎨 Halaman

### 1. Home
- Hero carousel dengan 3 slide
- Product carousel (6 produk)
- Section keunggulan perusahaan
- Quote & CTA banner

### 2. Produk
- Filter produk (SKM/SKT)
- 6 produk dengan detail:
  - Deluxe Bold (SKM)
  - Double Eight (SKT)
  - Executive (SKM)
  - Golden International (SKM)
  - Golden Taste (SKM)
  - Revo (SKT)
- Proses produksi

### 3. Tentang
- Hero section dengan foto perusahaan
- Info grid (tahun berdiri, lokasi, produk)
- Sejarah & statistik
- Jenis produk (SKT & SKM)
- Kontribusi sosial

### 4. Karir
- Stats karyawan
- 5 lowongan kerja tersedia
- Benefit karyawan (6 item)
- Program peningkatan SDM (3 program)
- Form lamaran kerja

## ⚙️ Konfigurasi

### Base URL

Edit `app/Config/App.php`:

```php
// Development
public string $baseURL = 'http://localhost:8080/';

// Production (XAMPP)
public string $baseURL = 'http://localhost/ci4-88group/public/';
```

### Environment

Copy `.env.example` ke `.env`:

```bash
cp env .env
```

Edit `.env`:

```
CI_ENVIRONMENT = development
```

## 🎯 Pengembangan Lanjutan

### Tambah Database untuk Produk

1. Buat tabel `products` di MySQL
2. Edit `app/Config/Database.php`
3. Buat Model `app/Models/ProductModel.php`:

```php
<?php
namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $allowedFields = ['name', 'desc', 'img', 'cat', 'tipe', 'rasa', 'aroma'];
}
```

4. Update Controller untuk fetch data dari DB

### Handler Form Karir

Buat method di `app/Controllers/Karir.php`:

```php
public function submit()
{
    $validation = \Config\Services::validation();
    
    $validation->setRules([
        'nama' => 'required|min_length[3]',
        'hp' => 'required|numeric',
        'posisi' => 'required',
    ]);
    
    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }
    
    // Simpan ke database atau kirim email
    
    return redirect()->to('karir')->with('success', 'Lamaran berhasil dikirim!');
}
```

## 📝 Tech Stack

- **Framework**: CodeIgniter 4.7.4
- **PHP**: 8.2+
- **CSS**: Custom CSS dengan animasi
- **JavaScript**: Vanilla JS (carousel)
- **Icons**: Font Awesome 6.0

## 🐛 Troubleshooting

### CSS tidak muncul?
- Cek `$baseURL` di `app/Config/App.php`
- Pastikan file `public/style.css` ada

### 404 Not Found?
- Cek routing di `app/Config/Routes.php`
- Pastikan `.htaccess` ada di `public/`

### Foto tidak tampil?
- Cek folder `public/foto` dan `public/foto_produk` sudah terisi
- Gunakan `<?= base_url('foto/...') ?>` di view

## 📄 License

© 2026 88 Group · Bondowoso, Jawa Timur

---

**Dibuat oleh:** Kiro AI Assistant  
**Tanggal:** 31 Agustus 2026
