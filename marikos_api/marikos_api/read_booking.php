<?php
include 'conn.php';

// IP Laptop (GANTI DENGAN IP ANDA YANG SEKARANG)
$ip_address = "192.168.1.27"; 

$user_id = $_GET['user_id'];

$query = "SELECT booking.*, kos.nama as nama_kos, kos.alamat, kos.foto 
          FROM booking 
          JOIN kos ON booking.kos_id = kos.id 
          WHERE booking.user_id = '$user_id' 
          ORDER BY booking.id DESC";

$result = mysqli_query($connect, $query);
$json = array();

while ($row = mysqli_fetch_assoc($result)) {
    // Tambahkan URL foto
    $row['foto_url'] = "http://" . $ip_address . "/marikos_api/uploads/" . $row['foto'];
    
    // Pastikan angka dikirim sebagai angka (bukan string)
    $row['total_harga'] = (double)$row['total_harga'];
    $row['lama_sewa'] = (int)$row['lama_sewa'];
    
    $json[] = $row;
}

echo json_encode($json);
?>