
# Delivery Order (DO) Apps - Laravel

Applikasi berbasis Laravel untuk membuat data Delivery Order dengan data API Ekspedisi Pengiriman [Biteship](https://biteship.com/) untuk memperoleh biaya kirim dari alamat keberangkatan ke alamat tujuan (pada studi kasus ini, yang menjadi acuan pengiriman adalah kode pos).Terdapat 3 page yaitu :
- Landing
- Cart
- Delivery Order

Pada Delivery Order Page terdapat tombol berikut: 
- Simpan Draft untuk menyimpan sebelum diajukan ke Persetujuan. 
- Ajukan Persetujuan ketika Creator merasa data sudah lengkap dan akan dilakukan persetujuan.


## Environment

Ada beberapa peralatan yang harus kita install untuk memulai Laravel:

- composer
- server PHP 8.2 / xampp / Laragon
- Mysql


## Installation

### Prepare database
- buat database dengan nama db_motasa
- import sql dari file sql yang terdapat pada folder db

### Install do_apps_laravel pada server :

jalankan perintah ini pada terminal 

```bash
  git clone https://github.com/suryo/do_apps_laravel.git
  cd do_apps_laravel
```
  
  copy .env.example and rename -> .env
  (configurasi database sesuai dengan setting DB)

```bash
  example :
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=db_ecommerce
  DB_USERNAME=root
  DB_PASSWORD=12345678
  ```
  jalankan kembali perintah ini pada terminal 
  ```bash
  php artisan key:generate
  php artisan optimize:clear
  php artisan serve
  ```

    
## Documentation

[Documentation](https://linktodocumentation)


## Related

Aplikasi ini terhubung dengan Apps Mobile Android Flutter :

[do_apps_fluter](https://github.com/suryo/do_apps_flutter)


## Authors

- [@suryoatmojo](https://www.github.com/suryo)
