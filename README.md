# Web Admin Toko Elektronik (JWD Competency Test)

Project ini dibuat untuk memenuhi tugas **Uji Kompetensi BNSP - Skema Junior Web Developer (JWD)**.
Aplikasi ini berbasis web untuk mengelola data produk elektronik (CRUD) dengan fitur login admin dan dashboard monitoring.

## Tech Stack

Yang dipake di project ini:

- **Framework:** CodeIgniter 4
- **Database:** MySQL (via XAMPP)
- **Frontend:** Bootstrap 5 (Template SB Admin 2)
- **Fitur Utama:** Login, CRUD Produk (+Upload Gambar), Dashboard, Landing Page.

---

## Cara Jalanin (Localhost XAMPP)

### 1. Persiapan Folder

- Download atau Clone repo ini.
- Simpan foldernya di `htdocs` (kalau pake XAMPP).
- Buka folder project-nya di Terminal / CMD / VS Code.

### 2. Setup Database

Ada dua cara, pilih salah satu aja:

**Cara A (Paling Gampang - Import SQL):**

1. Buka **phpMyAdmin**.
2. Buat database baru dengan nama: `toko-elektronik`
3. Klik tab **Import**, lalu pilih file `data.sql` yang ada di folder utama project ini.
4. Klik **Go**. Selesai.

**Cara B (Pake Migration & Seeder):**
Kalau mau generate ulang dari kodingan:

```bash
php spark migrate
php spark db:seed UserSeeder
php spark db:seed ProdukSeeder
```
