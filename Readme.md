# Panduan Membuka CodeIgniter 3 (CI3)

Berikut adalah langkah-langkah untuk membuka CodeIgniter 3 (CI3) di XAMPP:

1. Pastikan XAMPP telah terinstal di komputer Anda. Jika belum, Anda dapat mengunduhnya dari situs resmi XAMPP dan mengikuti petunjuk instalasinya.

2. Buka XAMPP Control Panel dan pastikan Apache dan MySQL sudah berjalan. Jika belum, klik tombol "Start" untuk menjalankannya.

3. Buka browser web dan ketikkan `http://localhost/phpmyadmin` di bilah alamat. Ini akan membuka phpMyAdmin, antarmuka pengelolaan database MySQL.

4. Buatlah sebuah database baru dengan nama yang sesuai untuk proyek CodeIgniter Anda.

5. Unduh CodeIgniter 3 dari situs resmi CodeIgniter (https://codeigniter.com/download) dan ekstrak file zip-nya.

6. Pindahkan folder hasil ekstraksi CodeIgniter ke direktori `C:/xampp/htdocs/` atau direktori htdocs yang sesuai dengan instalasi XAMPP Anda.

7. Buka file `application/config/config.php` dalam folder CodeIgniter dan ubah nilai `$config['base_url']` sesuai dengan URL lokal Anda. Misalnya, jika Anda mengakses proyek melalui `http://localhost/SistemPenggajian/`, maka ubah menjadi `$config['base_url'] = 'http://localhost/Nama sesuai dengan folder yang ada dinama folder/';`.

8. Buka file `application/config/database.php` dalam folder CodeIgniter dan ubah pengaturan database sesuai dengan pengaturan MySQL Anda. Isi nilai `$db['default']['hostname']`, `$db['default']['username']`, `$db['default']['password']`, dan `$db['default']['database']` dengan informasi yang sesuai.

9. Buka browser web dan ketikkan URL lokal proyek CodeIgniter Anda. Misalnya, `http://localhost/Nama sesuai dengan folder yang ada dinama folder/';`. Jika semuanya berhasil, Anda akan melihat halaman selamat datang CodeIgniter.

Selamat! Anda telah berhasil membuka CodeIgniter 3 (CI3) menggunakan XAMPP.
