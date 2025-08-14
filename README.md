# AFR-Minilemontest-API Project 🚀

[](https://opensource.org/licenses/MIT)
[](https://www.google.com/search?q=https://github.com/NAMA_USER/NAMA_REPO/stargazers)

> Sebuah api yang disusun dengan PHP Laravel untuk memanajemen Data User (CRUD).

## Fitur Unggulan ✨

-   **Fitur 1:** Dapat Menginput Data User (Create)
-   **Fitur 2:** Dapat Membaca Data User Yang Telah Ada (Read)
-   **Fitur 3:** Dapat Memperbaharui Data User Yang Telah Ada (Update)
-   **Fitur 4:** Dapat Menghapus Data User Yang Telah Ada (Delete)

## 🛠️ Instalasi & Cara Menjalankan
Ikuti langkah-langkah mudah ini untuk menjalankan proyek secara lokal.

### Prasyarat

Pastikan Anda sudah menginstal perangkat lunak berikut:

-   [PHP](https://www.php.net/) (Minimal Versi 8.1)
-   [Composer](https://getcomposer.org/) (Usahakan Versi Terbaru)
-   [Laravel](https://laravel.com/) (Minimal Versi 11)
-   [MySQL](https://www.mysql.com/) (Versi Terbaru Lebih Baik)
-   [Docker / Docker Compose](https://www.docker.com/) (Direkomendasikan)
-   [Git](https://git-scm.com/)

### Langkah-langkah

1.  **Clone repositori ini:**
    ```bash
    https://github.com/fafa123id/afr-minilemontest-api.git
    cd afr-minilemontest-api
    ```
2.  **Masuk ke direktori repositori yang telah diclone**
    ```bash
    cd afr-minilemontest-api
    ```
3. **Ubah nama .env.example menjadi .env**
**(Opsional) anda dapat mengubah field .env yang diperlukan seperti (DB_USERNAME, DB_PASSWORD) sesuai kebutuhan!**

### Bila Menggunakan Local Laravel + PHP Mysql  (Development Cycle)
4.  **Nyalakan MySQL Service**
    untuk Windows:
    ```bash
    net start mysql
    ```
    *bisa juga melalui xampp atau Laragon untuk Windows*
    untuk Linux:
    ```bash
    sudo systemctl start mysql
    ```    
6.  **Instal dependensi**
    ```bash
    composer install
    ```
7.  **Jalankan Script Yang Diperlukan**
    ```bash
    php artisan key:generate
    php artisan migrate
    php artisan config:clear
    php artisan cache:clear
    php artisan view:clear
    ```
8.  **Jalankan Server Laravel**
    ```bash
    php artisan serve
    ```
9.  **Selesai, Api sudah bisa diakses pada url http://localhost:8000**

### Bila Menggunakan Docker (Production Cycle)
4.  **Jalankan Build**
    ```bash
    docker compose build
    ```
5.  **Aktifkan Seluruh Kontainer Yang Telah Dibuild**
    ```bash
    docker compose up -d
    ```
6.  **Tunggu sebentar hingga seluruh kontainer aktif**
7.  **Selesai, Api sudah bisa diakses pada url http://localhost:8000**

## 📖 Dokumentasi API

API Ini dirancang dengan fitur CRUD Manajemen User Sederhana yang dilengkapi dengan dokumentasi dari swagger

### Base URL: `/`
Base url ini berisi website portal api berisi informasi link repository project ini dan link dokumentasi swagger

### Endpoint Utama

#### [GET]`api/documentation`: Menampilkan detail lengkap dokumentasi API, Mulai dari kriteria request, standar respons, dan lainnya (Disusun menggunakan Swagger).
#### [GET]`api/users`: Mengambil daftar semua pengguna.
#### [GET]`api/users/(id)`: Mengambil detail pengguna berdasarkan ID.
#### [POST]`api/users`: Membuat pengguna baru.
#### [PUT/PATCH]`api/users/(id)`: Memperbarui data pengguna berdasarkan ID.
#### [DELETE]`api/users/(id)`: Menghapus pengguna berdasarkan ID.

Dibuat oleh [Ahmad Fauzan Roziqin](https://github.com/fafa123id)
