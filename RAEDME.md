# Test Seleksi Magang Software Engineer

documentation <u>REST API</u> and <u>Web</u> using Framework Spring-Boot JAVA for REST API and Codeigniter3 for Web

- Muhamad Farhan

## Struktur Proyek

    |--webptsei/
    ||--*
    |--restapiptsei/
    ||--*
    |--db_erd_ptsei.sql
    |--README.md

## Website

Menggunakan `Codeigniter 3` dan `mysql`

- Instalasi :

1. Pastikan PHP telah terinstal di sistem Anda. Jika belum, Anda dapat mengunduhnya dari [php.net](https://www.php.net/)

2. Download file `Zip` source code github ini, dan ekstrak.

3. Jika meggunakan `xampp` pindahkan folder `webptsei` ke folder `htdoc` , jika menggunakan `laragon` ke folder `www` lalu jalankan `Apache` dan `Mysql` nya.

4. Akses di website dengan url:

   ```bash
   http://localhost/webptsei/
   ```

   Dengan ini harus nya website sudah `jalan` namun akan `ERROR` karena harus setup `RESTAPI` nya terlebih dahulu.

## REST API

Menggunakan Framework `Spring-Boot` JAVA

- instalasi :

1. Pastikan JAVA telah terinstal dan juga persiapan lainnya untuk menjalankan java di sistem Anda. Jika belum, Anda dapat mengunduhnya dari [oracle](https://www.oracle.com/java/technologies/downloads/) dan saya menggunakan `Maven` untuk menjalankan restapi nya [maven](https://maven.apache.org/)

2. Pindahkan folder `restapiptsei` ke folder anda untuk menyimpan `RESTAPI` nya.

3. Lalu buat `database` dengan nama `db_erd_ptsei` kemudian import file `sql` nya.

4. Lalu Jalankan :

   ```bash
   mvn spring-boot:run
   ```

   Dengan ini harus nya `RESTAPI` sudah `jalan` dan akan berjalan di url:

   ```bash
   http://localhost:8080/
   ```

   Untuk melihat `Endpoint` nya lebih detail bisa dilihat disini:

   - [Proyek](/restapiptsei/docs/proyek.md)
   - [Lokasi](/restapiptsei/docs/lokasi.md)

   Dan saya mengetes restapi dengan file `http` di `http/*`
