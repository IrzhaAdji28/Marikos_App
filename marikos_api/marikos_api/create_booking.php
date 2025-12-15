<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $kos_id = $_POST['kos_id'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $lama_sewa = $_POST['lama_sewa'];
    $total_harga = $_POST['total_harga'];
    $catatan = $_POST['catatan'];

    $query = "INSERT INTO booking (user_id, kos_id, tanggal_masuk, lama_sewa, total_harga, catatan, status) 
              VALUES ('$user_id', '$kos_id', '$tanggal_masuk', '$lama_sewa', '$total_harga', '$catatan', 'pending')";

    if (mysqli_query($connect, $query)) {
        echo json_encode(['success' => true, 'message' => 'Booking Berhasil Diajukan']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal Booking']);
    }
}
?>