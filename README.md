Sistem Pemesanan Online Warmindo

Aplikasi web sederhana ini dibangun menggunakan framework Laravel untuk mendigitalkan sistem pemesanan UMKM "Warmindo". Proyek ini dikembangkan untuk memenuhi tugas kelompok mata kuliah Cloud Computing di Universitas Pamulang, berfokus pada migrasi sistem ke infrastruktur cloud.

Prasyarat Sistem

Sebelum menginstal dan menjalankan aplikasi di server lokal maupun cloud (VM), pastikan lingkungan Anda telah terinstal komponen berikut:

PHP (sesuai dengan versi Laravel yang digunakan, minimal PHP 8.1) beserta ekstensi standar (PDO, Mbstring, XML, dll.)

Composer

Web Server (Nginx atau Apache)

Database Server (MySQL atau MariaDB)

Panduan Instalasi (Lokal & Server Cloud)

1. Clone Repository
Tarik kode dari repository Git ke dalam direktori web root Anda (misalnya /var/www/html/ di Linux atau htdocs/www di lokal):

git clone https://github.com/Sero98/warmindo-cloud.git
cd C:\laragon\www\warmindo


2. Instalasi Dependensi
Gunakan Composer untuk menginstal semua library pendukung Laravel:

composer install --optimize-autoloader


3. Konfigurasi Environment dan Database
Sesuai dengan prinsip keamanan, kredensial dan password database tidak disimpan di dalam repository.

Salin file template environment:

cp .env.example .env


Buka file .env (misal dengan nano .env) dan sesuaikan blok konfigurasi database berikut dengan kredensial server Anda:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_warmindo
DB_USERNAME=user_database_anda
DB_PASSWORD=password_database_anda


4. Generate Application Key
Buat kunci enkripsi unik untuk mengamankan sesi aplikasi Anda:

php artisan key:generate


5. Migrasi Database
Jalankan perintah ini untuk membuat tabel pesanan secara otomatis di dalam database Anda:

php artisan migrate


6. Penyesuaian Hak Akses Folder (Khusus Linux / VM Cloud)
Agar aplikasi bisa menyimpan cache dan log tanpa error di server Ubuntu/Linux, berikan hak akses pada folder berikut:

sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache


Identitas Kelompok

Kelompok: 9 - 05SIFM001

Dosen Pengampu: Dendi Sunardi, M.Kom.

Anggota:

Malvin Evander Lopulalan - 241011700903 (Cloud Architect)

Ardiansyah - 241011700904 (Infrastructure Engineer)

Muhammad Syafiy Fakhri - 241011700648 (Security & Governance Officer)

Ezy Arya Putra - 241011701053 (Cost & Operations Analyst)
