<?php
// Konfigurasi Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_marikos";

$connect = mysqli_connect($host, $user, $pass, $db);

if (!$connect) {
    die("Koneksi Database Gagal: " . mysqli_connect_error());
}

// Header agar bisa diakses dari Flutter (CORS)
header('Content-Type: application/json');
?>