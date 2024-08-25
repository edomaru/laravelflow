# Laravel 11, Vue 3 & Inertia - Full-Stack Web Developer

## Prerequisite
- [x] Install PHP, MySQL (Bisa gunakan Xampp, Wamp, Herd atau Valet)
- [x] Install Node.js
- [x] Install Code editor

## Instalasi projek di lokal

1. Buka projek di terminal

```
# Asumsi nama project laravelflow
cd laravelflow
```

2. Install dependensi untuk Laravel

```
composer install
```

3. Generate application key

```
php artisan key:generate
```

4. Migrasi database beserta sampel data

```
php artisan migrate --seed
```

5. Install dependensi untuk Vue dan frontend stuff

```
npm i
```

6. Jalankan PHP developmen server (Tidak diperlukan jika menggunakan Herd atau Valet)

```
php artisan serve
```

7. Jalankan Developmen server untuk vite

```
npm run dev
```


