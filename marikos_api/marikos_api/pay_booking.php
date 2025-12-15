<?php
include 'conn.php';

$id = $_POST['booking_id'];

$query = "UPDATE booking SET status = 'disetujui' WHERE id = '$id'";

if (mysqli_query($connect, $query)) {
    echo json_encode(['success' => true, 'message' => 'Pembayaran Berhasil']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal Update Status']);
}
?>