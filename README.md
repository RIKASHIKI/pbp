

# Sistem Manajemen Pengguna

Sistem Manajemen Pengguna ini adalah aplikasi berbasis web yang dibangun dengan Laravel, dirancang untuk mengelola data pengguna dan memberikan fungsionalitas pendaftaran serta pengeditan informasi pengguna. Aplikasi ini cocok digunakan untuk kebutuhan administrasi yang memerlukan pengelolaan data pengguna dengan efisien.

## Fitur

- **Pendaftaran Pengguna**: Pengguna baru dapat mendaftar dengan memasukkan informasi seperti nama, username, email, dan password.
- **Pengelolaan Pengguna**: Admin dapat melihat daftar semua pengguna, serta mengedit informasi pengguna yang ada.
- **Validasi Data**: Seluruh inputan dari pengguna divalidasi untuk memastikan data yang dimasukkan benar dan sesuai format yang diinginkan.

## Teknologi yang Digunakan

- **Laravel**: Framework PHP untuk pengembangan aplikasi web.
- **MySQL**: Database untuk penyimpanan data pengguna.
- **HTML/CSS**: Untuk tampilan antarmuka pengguna.

## Instalasi

1. **Clone Repository**
   ```bash
   git clone <URL_REPOSITORY>
   cd <NAMA_FOLDER>
   ```

2. **Instalasi Dependensi**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**
   - Salin file `.env.example` menjadi `.env`
   ```bash
   cp .env.example .env
   ```
   - Sesuaikan pengaturan database pada file `.env`.

4. **Generate Kunci Aplikasi**
   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database**
   ```bash
   php artisan migrate
   ```

6. **Jalankan Server**
   ```bash
   php artisan serve
   ```

7. Akses aplikasi melalui browser di [http://localhost:8000](http://localhost:8000).

## Struktur Kode

- **app/Http/Controllers**
  - `Cuser.php`: Mengelola pendaftaran dan pengeditan pengguna.
  - `Cadmin.php`: Mengelola tampilan dan pengeditan data admin.

- **resources/views**
  - `auth/register.blade.php`: Formulir pendaftaran pengguna.
  - `admin/index.blade.php`: Halaman untuk menampilkan daftar pengguna.
  - `admin/edit.blade.php`: Formulir untuk mengedit informasi pengguna.

## Cara Menggunakan

1. Untuk mendaftar, akses halaman pendaftaran di [http://localhost:8000/register](http://localhost:8000/register).
2. Setelah mendaftar, admin dapat mengelola pengguna melalui halaman admin.
3. Admin dapat mengedit informasi pengguna dengan mengklik tombol edit pada daftar pengguna.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buat branch baru dan kirim pull request. Kami sangat menghargai masukan dan kontribusi Anda.

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

## Kontak

Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi saya di:
- **Email**: admin@gmail.com
```


