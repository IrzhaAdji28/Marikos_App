```md
# 🏠 MariKos App
Aplikasi Pencarian dan Booking Kos — **Flutter + PHP REST API + MySQL**

---

## 📌 Deskripsi Proyek
**MariKos** adalah aplikasi mobile berbasis Flutter untuk mencari, melihat detail, dan melakukan pemesanan kos. Aplikasi terhubung ke backend **PHP Native** melalui **REST API** dan menggunakan **MySQL/MariaDB** sebagai database.

Proyek ini dikembangkan untuk **UTS/UAS Pemrograman Perangkat Bergerak (PPB)** dengan fokus implementasi **CRUD + API + integrasi Flutter**.

---

## 🛠️ Teknologi
- **Frontend**: Flutter (Dart)
- **Backend**: PHP Native (REST API)
- **Database**: MySQL / MariaDB
- **Format Data**: JSON
- **Web Server**: Apache (XAMPP)
- **Tools**: phpMyAdmin, Postman, Android Studio / VS Code

---

## ✨ Fitur Utama
### 👤 Autentikasi
- Login user dan admin
- Register user baru
- Role-based access (Admin & User)

### 🏘️ Data Kos
- List kos (dinamis dari API)
- Detail kos (dinamis dari API)
- Pencarian kos
- Status ketersediaan kos

### 📦 Booking Kos
- Booking kos
- Perhitungan total harga otomatis
- Riwayat booking user
- Status booking: `pending`, `disetujui`, `ditolak`

### 🛠️ Admin (CRUD)
- Tambah kos
- Edit kos
- Hapus kos
- CRUD penuh data kos

---

## 🗂️ Struktur Repository

### 📱 Frontend (Flutter)
```

marikos/
├── lib/
│   ├── main.dart
│   ├── home_page.dart
│   ├── login_page.dart
│   ├── kos_detail_page.dart
│   ├── booking_page.dart
│   ├── search_page.dart
│   ├── profile_page.dart
│   ├── chat_page.dart
│   ├── chat_list_page.dart
│   ├── models.dart
│   └── services/
│       └── api_service.dart
└── pubspec.yaml

```

### 🌐 Backend (PHP API)
```

marikos_api/
├── conn.php
├── auth/
│   ├── login.php
│   └── register.php
├── kos/
│   ├── read_kos.php
│   ├── detail_kos.php
│   ├── create_kos.php
│   ├── update_kos.php
│   └── delete_kos.php
└── booking/
├── create_booking.php
└── read_booking_user.php

```

---

## 🗄️ Database
Database: **`db_marikos`** (file: `db_marikos.sql`)

Tabel utama:
- `users`
- `kos`
- `booking`

Relasi:
- `booking.user_id` → `users.id`
- `booking.kos_id` → `kos.id`

---

## 🚀 Cara Menjalankan Proyek

### 1️⃣ Setup Backend (API)
1. Jalankan **XAMPP**
2. Aktifkan **Apache** dan **MySQL**
3. Import database:
   - Buka phpMyAdmin
   - Import file `db_marikos.sql`
4. Letakkan folder `marikos_api` ke:
```

htdocs/

````
5. Cek endpoint contoh:
- `http://localhost/marikos_api/kos/read_kos.php`

---

### 2️⃣ Setup Flutter
1. Masuk ke folder project Flutter
2. Install dependencies:
```bash
flutter pub get
````

3. Pastikan `baseUrl` di `api_service.dart` sesuai:

   ```dart
   static const String baseUrl = "http://10.0.2.2/marikos_api";
   ```

   > Catatan:
   >
   > * `10.0.2.2` khusus Android Emulator (mengarah ke localhost PC).
   > * Untuk HP fisik, ganti dengan IP LAN PC kamu, contoh: `http://192.168.1.10/marikos_api`

4. Jalankan:

   ```bash
   flutter run
   ```

---

## 🔑 Akun Dummy (Testing)

### Admin

* Email: `admin@marikos.com`
* Password: `admin123`

### User

* Email: `budi@example.com`
* Password: `budi123`

---

## 📚 Konsep yang Diterapkan

* CRUD (Create, Read, Update, Delete)
* RESTful API
* Client–Server Architecture
* Relational Database
* Role-Based Access Control
* JSON Data Exchange

---

## 👨‍💻 Tim Pengembang

Proyek ini dikembangkan oleh **Kelompok MariKos** untuk kebutuhan akademik (PPB).

---

## 📄 Lisensi

Proyek ini dibuat untuk **keperluan akademik dan pembelajaran** (non-komersial).

```
```
