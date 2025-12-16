# 🏠 MariKos - Aplikasi Pencari Kos

![Flutter](https://img.shields.io/badge/Flutter-02569B?style=for-the-badge&logo=flutter&logoColor=white)
![Dart](https://img.shields.io/badge/Dart-0175C2?style=for-the-badge&logo=dart&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

Aplikasi mobile berbasis Android untuk mempermudah pencarian dan pemesanan rumah kos secara online dengan fitur lengkap seperti booking, pembayaran digital, dan komunikasi real-time.

## 📋 Deskripsi Project

MariKos adalah aplikasi pencari kos yang dikembangkan sebagai project Ujian Akhir Semester (UAS) mata kuliah Pemrograman Perangkat Bergerak. Aplikasi ini menyediakan platform digital untuk menghubungkan pencari kos dengan pemilik kos, dilengkapi dengan fitur pencarian, detail informasi, booking, pembayaran, dan komunikasi langsung.

**Project ini fokus pada implementasi:**
- ✅ CRUD (Create, Read, Update, Delete) operations
- ✅ PHP REST API integration
- ✅ MySQL database management
- ✅ Flutter cross-platform development

## 👥 Tim Pengembang

| Nama | NIM |
|------|-----|
| **Irzha Adji Prabowo** | 2310631250093 |
| **Yogi Cahyono** | 2310631250039 |
| **Muhammad Aziz Sutawijaya** | 2310631250095 |


**Dosen Pengampu:** Purwantoro, S.Kom., M.Kom  
**Program Studi:** Sistem Informasi  
**Universitas:** Universitas Singaperbangsa Karawang  
**Tahun:** 2025

## ✨ Fitur Utama

### 🔐 Autentikasi & Otorisasi
- Login dan Register dengan role-based access (Admin & User)
- Validasi data pengguna
- Session management

### 🔍 Pencarian & Filter
- Pencarian kos berdasarkan nama, lokasi, dan fasilitas
- Filter berdasarkan harga, jenis kos (Putra/Putri/Campur)
- Sorting hasil pencarian

### 🏘️ Manajemen Kos (Admin)
- CRUD data kos (Create, Read, Update, Delete)
- Upload foto kos
- Update status ketersediaan
- Kelola informasi detail (fasilitas, harga, lokasi)

### 📱 Detail Informasi Kos
- Tampilan detail lengkap kos
- Informasi fasilitas
- Harga dan lokasi
- Kontak pemilik

### 📅 Sistem Booking
- Pemesanan kos online
- Pilih tanggal masuk dan durasi sewa
- Perhitungan otomatis total biaya
- Status booking (Pending, Disetujui, Ditolak, Lunas)

### 💳 Pembayaran Digital
- Informasi pembayaran
- Konfirmasi pembayaran
- Riwayat transaksi

### 💬 Fitur Chat
- Komunikasi real-time antara user dan pemilik kos
- Chat list untuk manajemen percakapan

### 👤 Profil Pengguna
- Kelola data pribadi
- Riwayat pemesanan
- Logout

## 🛠️ Teknologi yang Digunakan

### Frontend
- **Framework:** Flutter 3.x
- **Language:** Dart
- **State Management:** setState / Provider
- **HTTP Client:** http package
- **UI Components:** Material Design

### Backend
- **Language:** PHP Native
- **Architecture:** RESTful API
- **Database:** MySQL
- **Server:** Apache (XAMPP/WAMP)

### Database
- **DBMS:** MySQL
- **Database Name:** db_marikos
- **Tables:** users, kos, booking

## 📁 Struktur Project

```
Marikos_App/
├── Marikos/                    # Flutter Application
│   └── Marikos/
│       ├── lib/
│       │   ├── main.dart      # Entry point aplikasi
│       │   ├── models/        # Data models
│       │   ├── pages/         # UI screens
│       │   │   ├── login_page.dart
│       │   │   ├── register_page.dart
│       │   │   ├── home_page.dart
│       │   │   ├── search_page.dart
│       │   │   ├── detail_kos_page.dart
│       │   │   ├── booking_page.dart
│       │   │   ├── chat_page.dart
│       │   │   ├── profile_page.dart
│       │   │   └── ...
│       │   ├── services/      # API services
│       │   └── widgets/       # Reusable widgets
│       └── pubspec.yaml
│
├── marikos_api/               # PHP REST API Backend
│   └── marikos_api/
│       ├── config/            # Database configuration
│       ├── api/               # API endpoints
│       │   ├── login.php
│       │   ├── register.php
│       │   ├── get_kos.php
│       │   ├── create_kos.php
│       │   ├── update_kos.php
│       │   ├── delete_kos.php
│       │   ├── booking.php
│       │   └── ...
│       └── uploads/           # Upload directory
│
└── db_marikos.sql             # Database schema
```

## 📊 Struktur Database

### Tabel: users
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- nama (VARCHAR)
- email (VARCHAR)
- password (VARCHAR)
- role (ENUM: 'admin', 'user')
- alamat (TEXT)
- no_telp (VARCHAR)
- ktp (VARCHAR)
```

### Tabel: kos
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- nama (VARCHAR)
- alamat (TEXT)
- harga (INT)
- fasilitas (TEXT)
- jenis_kos (VARCHAR: 'Putra', 'Putri', 'Campur')
- pemilik (VARCHAR)
- status (ENUM: 'tersedia', 'penuh')
- foto (VARCHAR)
```

### Tabel: booking
```sql
- id (INT, PRIMARY KEY, AUTO_INCREMENT)
- user_id (INT, FOREIGN KEY)
- kos_id (INT, FOREIGN KEY)
- tanggal_masuk (DATE)
- lama_sewa (INT)
- total_harga (INT)
- status (ENUM: 'pending', 'disetujui', 'ditolak', 'lunas')
- catatan (TEXT)
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

## 🚀 Cara Instalasi

### Prerequisites
- Flutter SDK (3.x atau lebih baru)
- Dart SDK
- Android Studio / VS Code
- XAMPP / WAMP (untuk PHP & MySQL)
- Git

### Langkah Instalasi

#### 1. Clone Repository
```bash
git clone https://github.com/IrzhaAdji28/Marikos_App.git
cd Marikos_App
```

#### 2. Setup Database
```bash
# Buka phpMyAdmin
# Import file db_marikos.sql
# Atau via command line:
mysql -u root -p < db_marikos.sql
```

#### 3. Setup Backend API
```bash
# Copy folder marikos_api ke htdocs (XAMPP) atau www (WAMP)
cp -r marikos_api C:/xampp/htdocs/

# Edit config database di marikos_api/config/database.php
# Sesuaikan dengan konfigurasi MySQL Anda
```

#### 4. Setup Flutter App
```bash
cd Marikos/Marikos

# Install dependencies
flutter pub get

# Edit base URL API di lib/services/api_service.dart
# Sesuaikan dengan IP/domain server Anda

# Run aplikasi
flutter run
```

#### 5. Build APK (Opsional)
```bash
flutter build apk --release
```

## 📱 Screenshot Aplikasi

<div align="center">

| Login | Home | Detail Kos |
|-------|------|------------|
| <img width="200" alt="Login" src="https://github.com/user-attachments/assets/29f9a24f-777d-4c44-bf6c-bc3a588b83f3"/> | <img width="200" alt="Home" src="https://github.com/user-attachments/assets/b1fe7d62-e58b-465f-bf46-8bbc27e1756e"/> | <img width="200" alt="DetailKos" src="https://github.com/user-attachments/assets/5d12e2a7-b4db-482d-af35-5c3e9733ff78"/> |


| Booking | Cari Kos | Profile |
|---------|------|---------|
| <img width="200" alt="Booking" src="https://github.com/user-attachments/assets/1eb3f62c-1f82-4105-aecc-1e652ed4ca9f"/> | <img width="200" alt="CariKos" src="https://github.com/user-attachments/assets/c17f9636-d879-4dbb-9022-3710db3f5354"/> | <img width="200" alt="Profile" src="https://github.com/user-attachments/assets/23a7a6f0-1aed-48e2-8356-4f44e47982a9"/> |

</div>

## 🔧 API Endpoints

### Authentication
```
POST /api/login.php          - Login user
POST /api/register.php       - Register user baru
```

### Kos Management
```
GET  /api/get_kos.php        - Get semua data kos
GET  /api/get_kos.php?id=1   - Get detail kos by ID
POST /api/create_kos.php     - Create kos baru (Admin)
PUT  /api/update_kos.php     - Update data kos (Admin)
DELETE /api/delete_kos.php   - Delete kos (Admin)
GET  /api/search_kos.php     - Search dan filter kos
```

### Booking
```
GET  /api/get_booking.php    - Get semua booking
POST /api/create_booking.php - Create booking baru
PUT  /api/update_booking.php - Update status booking
```

### User
```
GET  /api/get_profile.php    - Get user profile
PUT  /api/update_profile.php - Update user profile
```

## 🎯 Use Case Diagram

Sistem memiliki 2 aktor utama:
- **User (Customer)**: Mencari kos, booking, chat dengan pemilik
- **Admin (Pemilik Kos)**: Kelola kos, kelola booking, chat dengan customer

## 📈 Pengembangan Lebih Lanjut

Fitur yang dapat ditambahkan di masa mendatang:
- [ ] Integrasi payment gateway (Midtrans/Xendit)
- [ ] Notifikasi push
- [ ] Rating dan review kos
- [ ] Integrasi Google Maps untuk lokasi
- [ ] Fitur wishlist/favorit
- [ ] Export laporan untuk admin
- [ ] Verifikasi email/SMS
- [ ] Multiple payment methods

## 📝 Lisensi

Project ini dibuat untuk keperluan akademik sebagai tugas UAS Pemrograman Perangkat Bergerak.

## 📞 Kontak

Untuk pertanyaan atau diskusi lebih lanjut, silakan hubungi:

- **Irzha Adji Prabowo** - [GitHub](https://github.com/IrzhaAdji28)
- **Email**: -
- **Institution**: Universitas Singaperbangsa Karawang

## 🙏 Acknowledgments

- Terima kasih kepada Bapak Purwantoro, S.Kom., M.Kom. sebagai dosen pengampu
- Flutter dan Dart community
- Stack Overflow dan developer community
- Semua pihak yang telah membantu dalam pengembangan project ini

---

<div align="center">

**⭐ Star project ini jika bermanfaat!**

Made with ❤️ by Kelompok 8 - Sistem Informasi UNSIKA

</div>
