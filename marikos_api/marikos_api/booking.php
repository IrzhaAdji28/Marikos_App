<?php
include 'conn.php';

// Terima input
$user_id = $_POST['user_id'];
$kos_id = $_POST['kos_id'];
$tanggal_masuk = $_POST['check_in']; // Flutter kirim 'check_in'
$lama_sewa = $_POST['duration'];     // Flutter kirim 'duration'
$total_harga = $_POST['total_price']; // Flutter kirim 'total_price'

// Validasi sederhana
if(!$user_id || !$kos_id) {
    echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
    exit;
}

$query = "INSERT INTO booking (user_id, kos_id, tanggal_masuk, lama_sewa, total_harga, status, created_at) 
          VALUES ('$user_id', '$kos_id', '$tanggal_masuk', '$lama_sewa', '$total_harga', 'pending', NOW())";

if (mysqli_query($connect, $query)) {
    echo json_encode(['success' => true, 'message' => 'Booking Berhasil']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal: ' . mysqli_error($connect)]);
}
?>