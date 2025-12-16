-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Des 2025 pada 23.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_marikos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `kos_id` int(10) UNSIGNED NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status` enum('pending','disetujui','ditolak','lunas') DEFAULT 'pending',
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `kos_id`, `tanggal_masuk`, `lama_sewa`, `total_harga`, `status`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-01-01', 6, 5400000, 'disetujui', 'DP sudah dibayar', '2025-12-11 14:00:19', '2025-12-11 14:00:19'),
(2, 3, 2, '2025-02-15', 3, 2400000, 'disetujui', 'Menunggu konfirmasi pemilik kos', '2025-12-11 14:00:19', '2025-12-15 16:35:39'),
(3, 2, 3, '2025-03-01', 1, 700000, 'ditolak', 'Kamar sudah penuh', '2025-12-11 14:00:19', '2025-12-11 14:00:19'),
(4, 1, 3, '2025-12-15', 1, 700000, 'pending', NULL, '2025-12-15 14:13:25', '2025-12-15 14:13:25'),
(5, 1, 3, '2025-12-16', 1, 700000, 'pending', NULL, '2025-12-15 14:14:13', '2025-12-15 14:14:13'),
(6, 1, 3, '2025-12-15', 1, 700000, 'pending', NULL, '2025-12-15 14:24:18', '2025-12-15 14:24:18'),
(7, 1, 3, '2025-12-15', 1, 700000, 'pending', NULL, '2025-12-15 14:39:28', '2025-12-15 14:39:28'),
(8, 1, 3, '2025-12-15', 1, 700000, 'pending', NULL, '2025-12-15 14:59:22', '2025-12-15 14:59:22'),
(10, 1, 3, '2025-12-15', 1, 700000, 'pending', NULL, '2025-12-15 15:16:38', '2025-12-15 15:16:38'),
(11, 1, 2, '2025-12-15', 1, 800000, 'pending', NULL, '2025-12-15 15:17:02', '2025-12-15 15:17:02'),
(12, 2, 2, '2025-12-15', 1, 800000, 'disetujui', NULL, '2025-12-15 15:35:31', '2025-12-15 15:35:41'),
(13, 2, 1, '2025-12-15', 2, 1800000, 'disetujui', NULL, '2025-12-15 15:36:21', '2025-12-15 15:36:38'),
(14, 2, 3, '2025-12-15', 1, 700000, 'disetujui', NULL, '2025-12-15 15:38:31', '2025-12-15 15:38:42'),
(18, 2, 1, '2025-12-15', 1, 900000, 'disetujui', NULL, '2025-12-15 16:09:08', '2025-12-15 16:09:20'),
(24, 4, 9, '2025-12-16', 1, 150000, 'disetujui', NULL, '2025-12-15 17:28:53', '2025-12-15 17:29:33'),
(25, 2, 9, '2025-12-16', 1, 150000, 'pending', NULL, '2025-12-15 18:01:01', '2025-12-15 18:01:01'),
(26, 2, 3, '2025-12-16', 1, 700000, 'pending', NULL, '2025-12-15 18:01:09', '2025-12-15 18:01:09'),
(27, 2, 3, '2025-12-16', 1, 700000, 'pending', NULL, '2025-12-15 18:01:21', '2025-12-15 18:01:21'),
(28, 2, 9, '2025-12-16', 1, 150000, 'pending', NULL, '2025-12-15 18:09:25', '2025-12-15 18:09:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kos`
--

CREATE TABLE `kos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `harga` int(11) NOT NULL,
  `fasilitas` text DEFAULT NULL,
  `jenis_kos` varchar(50) DEFAULT NULL,
  `pemilik` varchar(100) DEFAULT NULL,
  `status` enum('tersedia','penuh') NOT NULL DEFAULT 'tersedia',
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kos`
--

INSERT INTO `kos` (`id`, `nama`, `alamat`, `harga`, `fasilitas`, `jenis_kos`, `pemilik`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Kos Mawar Putri', 'Jl. Mawar No. 2, Bandung', 900000, 'WiFi, Kasur, Lemari, Kamar mandi dalam', 'Putri', 'Ibu Rina', 'tersedia', 'mawar_putri.jpg', '2025-12-11 14:00:19', '2025-12-11 14:00:19'),
(2, 'Kos Melati Putra', 'Jl. Melati No. 7, Bandung', 800000, 'WiFi, Kasur, Meja belajar, Parkir motor', 'Putra', 'Bapak Andi', 'tersedia', 'melati_putra.jpg', '2025-12-11 14:00:19', '2025-12-11 14:00:19'),
(3, 'Kos Kenanga Campur', 'Jl. Kenanga No. 12, Bandung', 700000, 'WiFi, Dapur bersama, Ruang tamu, Parkir', 'Campur', 'Ibu Sari', 'penuh', 'kenanga_campur.jpg', '2025-12-11 14:00:19', '2025-12-11 14:00:19'),
(9, 'Kos Arwana ', 'Jalan HS Ronggo Waluyo ', 150000, 'AC', 'putri', 'Budi Santoso', 'tersedia', '1765819692_1000485495.jpg', '2025-12-15 17:28:12', '2025-12-15 17:28:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `is_read`, `created_at`) VALUES
(1, 2, 1, 'halo', 0, '2025-12-15 16:02:40'),
(2, 2, 1, 'halo', 0, '2025-12-15 16:02:44'),
(3, 2, 1, 'halo', 0, '2025-12-15 16:02:52'),
(4, 2, 1, 'hai', 0, '2025-12-15 16:03:03'),
(5, 2, 1, 'Selamat sore', 0, '2025-12-15 16:04:49'),
(6, 2, 2, 'sore', 0, '2025-12-15 16:24:32'),
(7, 2, 2, 'sore', 0, '2025-12-15 16:24:36'),
(8, 2, 1, 'hai', 0, '2025-12-15 17:04:44'),
(9, 2, 1, 'Halo, Silahkan melakukan serah terima kunci pada jadwal yang telah di tentukan ya!', 0, '2025-12-15 17:24:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `ktp` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `alamat`, `no_telp`, `ktp`, `created_at`, `updated_at`) VALUES
(1, 'Admin Marikos', 'admin@marikos.com', 'admin123', 'admin', 'Jl. Mawar No. 1, Bandung', '081234567890', '3273010101010001', '2025-12-11 14:00:19', '2025-12-11 14:00:19'),
(2, 'Budi Santoso', 'budi@example.com', 'budi123', 'user', 'Jl. Melati No. 5, Bandung', '081298765432', '3273010202020002', '2025-12-11 14:00:19', '2025-12-11 14:00:19'),
(3, 'Siti Aminah', 'siti@example.com', 'siti123', 'user', 'Jl. Kenanga No. 10, Bandung', '081377766655', '3273010303030003', '2025-12-11 14:00:19', '2025-12-11 14:00:19'),
(4, 'Aziz Sutawijaya ', 'azizswijaya@gmail.com', '123', 'user', NULL, '085813400112', NULL, '2025-12-15 17:21:39', '2025-12-15 17:21:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_booking_user` (`user_id`),
  ADD KEY `fk_booking_kos` (`kos_id`);

--
-- Indeks untuk tabel `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kos`
--
ALTER TABLE `kos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_kos` FOREIGN KEY (`kos_id`) REFERENCES `kos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_booking_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
