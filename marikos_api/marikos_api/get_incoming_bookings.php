<?php
include 'conn.php';

$pemilik = $_GET['pemilik'];

// QUERY FINAL (Hanya mengambil kolom yang pasti ada)
$query = "SELECT booking.*, kos.nama as nama_kos, users.nama as user_name
          FROM booking
          JOIN kos ON booking.kos_id = kos.id
          JOIN users ON booking.user_id = users.id
          WHERE kos.pemilik = '$pemilik'
          ORDER BY booking.id DESC";

$result = mysqli_query($connect, $query);
$response = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Kita kosongkan foto dulu agar tidak error, karena di UI Kelola Booking 
        // kita pakai icon orang (Avatar), jadi tidak masalah.
        $row['foto_url'] = ""; 

        // Pastikan format angka benar
        $row['total_harga'] = (double)$row['total_harga'];
        $row['lama_sewa'] = (int)$row['lama_sewa'];
        
        $response[] = $row;
    }
}

echo json_encode($response);
?>