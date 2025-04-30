# Student Management System (MVC Architecture)
This is a simple student management system built using the MVC (Model-View-Controller) architecture. It helps track students, courses, and enrollments.

## Janji
Saya Jihan Aqilah Hartono dengan NIM 2306827 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Desain
![Untitled](https://github.com/user-attachments/assets/1b59f447-1c22-49b5-a0a6-0891a214cae2)

## Penjelasan Skema Database Sistem Manajemen Pendidikan

### Tabel-Tabel Utama

1. **Tabel Users (Pengguna)**
   - Entitas sentral yang menyimpan informasi dasar pengguna (id, username, role)
   - Berfungsi sebagai pusat autentikasi dan otorisasi
   - Terhubung ke posts (sebagai penulis) dan follows (untuk fitur sosial)
   - Timestamp created_at melacak kapan pengguna dibuat

2. **Tabel Students (Siswa)**
   - Berisi detail spesifik siswa (nama, nim, telepon)
   - Kemungkinan merupakan ekstensi khusus dari tabel users untuk siswa
   - Terhubung ke enrollments untuk melacak partisipasi dalam kursus
   - Menyimpan join_date untuk mencatat kapan siswa masuk ke sistem

3. **Tabel Courses (Mata Kuliah)**
   - Berisi informasi mata kuliah (kode, nama, kredit, deskripsi)
   - Konten pendidikan utama yang dikelola
   - Terhubung ke enrollments untuk melacak siswa yang mengambil setiap mata kuliah

4. **Tabel Enrollments (Pendaftaran) - Tabel Penghubung**
   - Menciptakan hubungan many-to-many antara siswa dan mata kuliah
   - Melacak siswa mana yang terdaftar di mata kuliah mana
   - Mencakup tanggal pendaftaran dan informasi nilai
   - Memungkinkan pendaftaran kursus dan pelacakan kinerja

### Fitur Sosial/Konten

5. **Tabel Posts (Postingan)**
   - Fungsionalitas berbagi konten (judul, isi, status)
   - Terhubung dengan pengguna melalui user_id
   - Bisa mewakili pengumuman, tugas, atau diskusi
   - Mencakup timestamp dan field status untuk manajemen alur kerja

6. **Tabel Follows (Pengikut)**
   - Mengimplementasikan fitur koneksi sosial
   - Melacak pengguna mana yang mengikuti pengguna lain
   - Memungkinkan notifikasi atau penyaringan konten berdasarkan koneksi
   - Mencakup timestamp untuk mencatat kapan hubungan pengikut dibuat

### Hubungan Kunci

- **Users → Posts**: One-to-many (satu pengguna dapat membuat banyak post)
- **Users → Follows**: Pengguna dapat mengikuti dan diikuti oleh banyak pengguna
- **Students → Enrollments → Courses**: Hubungan many-to-many melalui enrollments
- **Students → Users**: Berpotensi terhubung, meskipun tidak ditunjukkan langsung dalam skema ini

Desain database ini mendukung platform pendidikan dengan manajemen akademik (mata kuliah, pendaftaran, nilai) dan fitur sosial (post, pengikut), menciptakan sistem manajemen pembelajaran yang komprehensif.

Detail implementasi dalam teks menunjukkan arsitektur MVC dengan styling Bootstrap, operasi CRUD lengkap, dan halaman dashboard yang menampilkan statistik dan entri terbaru.

## How To Use
Saat pengguna pertama kali mengakses sistem, mereka akan tiba di halaman utama ini di mana mereka dapat:

- Melihat total jumlah siswa, mata kuliah, dan pendaftaran
- Mengklik tombol "Kelola" untuk langsung menuju ke bagian yang sesuai
- Melihat dan mengakses siswa dan mata kuliah yang baru saja ditambahkan
- Menavigasi ke bagian lainnya menggunakan menu di bagian atas

Ini menciptakan sistem manajemen siswa yang lebih profesional dan lengkap dengan titik masuk yang tepat.

## Dokumentasi
https://drive.google.com/file/d/15D8VQw-bs3oZmxtiJ1ZBg6ligCOLfgub/view?usp=sharing
