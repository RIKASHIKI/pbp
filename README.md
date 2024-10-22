# PBP

PBP adalah sebuah proyek berbasis web yang dirancang untuk mempermudah pengelolaan data pengguna dengan fitur-fitur utama seperti registrasi, pengeditan, dan pembaruan informasi user. Proyek ini dibangun menggunakan framework Laravel.

## Fitur Utama

- **Registrasi User**: Fitur untuk mendaftarkan user baru dengan validasi data yang ketat.
- **Edit User**: Admin dapat mengedit informasi user yang sudah terdaftar.
- **Update Data**: Admin bisa memperbarui data user termasuk mengubah level akses (user/admin).
- **Pesan Status**: Feedback kepada user dengan pesan sukses atau error.

## Struktur Direktori

```
/app
    /Http
        /Controllers
            - Cadmin.php
            - Cuser.php
/resources
    /views
        /auth
            - register.blade.php
        /admin
            - edit.blade.php
            - index.blade.php
        /layout
            - menu.blade.php
```

## Instalasi

Untuk memulai menggunakan proyek ini, ikuti langkah-langkah berikut:

1. **Clone repositori**:
    ```bash
    git clone https://github.com/RIKASHIKI/pbp.git
    ```

2. **Install dependencies**:
    ```bash
    composer install
    npm install && npm run dev
    ```

3. **Setup environment**:
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Migrasi database**:
    ```bash
    php artisan migrate
    ```

5. **Jalankan server lokal**:
    ```bash
    php artisan serve
    ```

## Penggunaan

### Registrasi User
Halaman registrasi memungkinkan user baru untuk mendaftar dengan mengisi form yang sudah tersedia. Pastikan data yang dimasukkan sudah benar sesuai validasi.

### Edit dan Update User
Admin dapat mengakses halaman edit untuk memperbarui informasi user. Gunakan tombol "Update" untuk menyimpan perubahan.

### Notifikasi Status
Sistem menggunakan notifikasi berbasis JavaScript (Swal) untuk memberikan umpan balik kepada user mengenai status operasi yang dilakukan.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan mengikuti langkah berikut:
1. Fork proyek ini
2. Buat branch baru (`git checkout -b fitur-baru`)
3. Commit perubahan Anda (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat pull request di GitHub

## Lisensi

Proyek ini menggunakan lisensi MIT. Silakan lihat file [LICENSE](LICENSE) untuk informasi lebih lanjut.

## Kontak

Jika ada pertanyaan atau saran, silakan hubungi:
- **Email**: hariamd210@outlook.com
- **GitHub**: [RIKASHIKI](https://github.com/RIKASHIKI)
```

README ini dibuat untuk memberikan informasi lengkap dan jelas kepada siapa saja yang ingin menggunakan atau berkontribusi pada proyek "PBP".