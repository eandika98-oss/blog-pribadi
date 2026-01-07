# Blog Pribadi Berbasis Web 

## Deskripsi Singkat
Blog Pribadi merupakan aplikasi web sederhana yang digunakan untuk membuat, menampilkan, mengedit, dan menghapus postingan blog. Web ini dikembangkan sebagai bagian dari proyek kelompok pada mata kuliah Back-End Web Development dengan tujuan meningkatkan kemampuan mahasiswa dalam merancang dan membangun aplikasi web, khususnya pada pengembangan sisi server menggunakan PHP native dan MySQL sebagai sistem basis data.

Fungsionalitas utama aplikasi ini meliputi Pembuatan, penampilan, pengeditan, dan penghapusan postingan blog peribadi. Pengembangan aplikasi dilakukan secara bertahap dengan pembagian tugas yang jelas antar anggota kelompok.

---

## Daftar Anggota Tim

1. **I Wayan Rusdiana Putra**  
   NIM: 240030287
   GitHub: https://github.com/Rusdianaputra17
   Peran: Perancangan database dan konfigurasi koneksi database, pembuatan autentikasi login, dan fitur dashboard.
2. **I Kadek Edi Andika**  
   NIM: 240030208
   GitHub: https://github.com/eandika98-oss
   Peran: Inisiasi repository GitHub, penyusunan struktur project, implementasi model, controllers dan membuat css pada folder public.

3. **Surya Bayu Samodra**  
   NIM: 240030244
   GitHub: https://github.com/suryaaaa11
   Peran: Implementasi fitur-fitur blog-pribadi (create, delete, edit, index, dan update).

---

## Pembagian Tugas Kelompok
Pembagian tugas dalam project ini dibagi berdasarkan mstruktur dan fungsi blog-peibadi. Pada tahap awal, para anggota kelompok sudah mulai mengerjakan bagian inisiasi, perancangan database, pembuatan autentikasi login dan pembuatan backend dasar. Pengembangan modul berikutnya akan dikerjakan secara bertahap oleh seluruh anggota sesuai peran masing‑masing

---

## Lingkungan Pengembangan
Alat dan teknologi yang digunakan dalam pengembangan proyek ini:

* **Bahasa Pemrograman:** PHP-8.4.13, HTML5, CSS3, **Boxicons (Icon Library)**.
* **Sistem Operasi:** Windows (menyesuaikan perangkat masing-masing anggota).
* **Database:** MySQL.
* **Web Server:** PHP Built-in Web Server.
* **Database Driver:** PHP PDO (PHP Data Objects).
* **Code Editor:** Visual Studio Code.
* **Browser:** Google Chrome, Microsoft Edge.

## Hasil Pengembangan (Fitur Utama)
Implementasi fitur berdasarkan modul yang telah dikembangkan:

1.  **Dashboard Blog (Read)**
    * Menampilkan seluruh daftar postingan blog pribadi.
    * Menampilkan detail judul, gambar, deskripsi, dan tanggal memposting plog.

2.  **Tambah Post (Create)**
    * Fitur untuk menambah postingan blog pribadi.

3.  **Edit Blog (Update)**
    * fitur untuk memperbarui postingan blog pribadi.
    * Form otomatis terisi dengan data lama sebelum diedit.

4.  **Hapus Blog (Delete)**
    * Fitur untuk menghapus postingan blog.


## Struktur Folder
Berikut adalah susunan file dan folder dalam proyek ini:

```text
/projek-buku-alamat
│
├── /auth
│   ├── login.php          
│   └── logout.php        
│   └── /css
|       └── style.css
│       └── pg.jpg
| 
├── /config
│   └── database.php         
│
├── /models
|   └── blogModel.php 
|                               
├──  /controllers
|    └── blogController.php      
|                                
├── /public
|   └── index.php
|   └── create.php  
|   └── delete.php  
|   └── edit.php
|   └── update.php
|  
├── /dashboard
|   └── tampilanBlog.php  
|            
├── /uploads              
├── database.sql                              
└── README.md                     
```

## Cara Instalasi dan Menjalankan Aplikasi
Langkah-langkah menjalankan project:

1. **Persiapan Database**
* Buka aplikasi manajemen database (MySQL).
* Impor file `database.sql` yang disertakan dalam folder proyek untuk membuat database `blog_pribadi` yang telah disiapkan beserta data dummy awal.


2. **Konfigurasi Koneksi**
* Buka file `config/database.php`.
* Sesuaikan konfigurasi database dengan server lokal Anda:
```php
const DB_HOST = 'localhost';
const DB_USER = 'root';       // sesuaikan dengan user MySQL
const DB_PASS = '';           // Sesuaikan dengan password MySQL 
const DB_NAME = 'blog_pribadi';

```

3. **Menjalankan Aplikasi**
* Buka aplikasi Visual Studio Code.
* Jalankan PHP Built-in Web Server dengan mengketik `php -S localhost:8000` pada terminal.
* Setelah itu tambahkakan file yang ingin di jalankan, misalnya `php -S localhost:8000/public/index.php` di browser.

## Catatan Pengembangan
Project ini masih berada pada tahap awal pengembangan (inisiasi dan perancangan). Implementasi fitur CRUD secara lengkap akan dilakukan pada tahap pengembangan selanjutnya sesuai dengan rencana yang telah disusun oleh anggota kelompok.