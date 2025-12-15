<?php
include 'conn.php';

$query = "SELECT * FROM kos ORDER BY id DESC";
$result = mysqli_query($connect, $query);
$json = array();

// GANTI IP INI SESUAI IP LAPTOP ANDA (Cek via cmd -> ipconfig)
// Jangan pakai localhost, karena Emulator HP punya localhost sendiri.
$ip_address = "192.168.1.27"; 

while ($row = mysqli_fetch_assoc($result)) {
    // Tambahkan URL lengkap untuk gambar
    $row['foto_url'] = "http://" . $ip_address . "/marikos_api/uploads/" . $row['foto'];
    $json[] = $row;
}

echo json_encode($json);
?>