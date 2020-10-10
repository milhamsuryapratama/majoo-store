## How to setup

1. Clone project url
2. Jalankan `composer install`
3. Duplicate file `.env.example` and ubah nama file menjadi `.env`
4. Pengaturan database
      * `DB_CONNECTION`=mysql
      * `DB_HOST`=127.0.0.1
      * `DB_PORT`=3306
      * `DB_DATABASE`=online-shop
      * `DB_USERNAME`=root
      * `DB_PASSWORD`=secret
5. Pengaturan email di `.env`, ini digunakan untuk mengirim email verifikasi dan notifikasi
       * `MAIL_DRIVER` : smtp
       * `MAIL_HOST` : smtp.mailtrap.io
       * `MAIL_PORT` : 2525
       * `MAIL_USERNAME` : d88353424a9e23
       * `MAIL_PASSWORD` : 73b13322beb99e
6. Jalankan `php artisan key:generate`
7. Jalankan `php artisan migrate` untuk membuat tabel pada database
8. Jalankan `php artisan db:seed` mengisi data pada database
9. Jalankan `php artisan serve` untuk memulai

## Login Admin

Admin panel adalah bagian yang bisa digunakan untuk menambah data master seperti data kategori, data produk dan melihat data transaksi dari pengguna.

1. Kunjungi `http://localhost:8000/admin/login` dan `http://localhost:8000/admin/dashboard` untuk halaman dashboard
2. Login dengan
    * `email` : admin@gmail.com
    * `password` : admin123