<?php
include 'conn.php';

// IP Laptop (GANTI DENGAN IP ANDA)
$ip_address = "192.168.1.27"; 

$pemilik = $_GET['pemilik']; // Kita filter berdasarkan nama pemilik

$query = "SELECT * FROM kos WHERE pemilik = '$pemilik' ORDER BY id DESC";
$result = mysqli_query($connect, $query);

$response = array();

if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        $foto_url = "http://" . $ip_address . "/marikos_api/uploads/" . $row['foto'];
        
        $images_list = array($foto_url);
        $facilities_list = array();
        if (!empty($row['fasilitas'])) {
            $facilities_list = array_map('trim', explode(',', $row['fasilitas']));
        }

        $data_item = array(
            "id" => $row['id'],
            "name" => $row['nama'],
            "location" => "Bandung",
            "address" => $row['alamat'],
            "price" => (double)$row['harga'],
            "type" => strtolower($row['jenis_kos']),
            "description" => "Fasilitas: " . $row['fasilitas'],
            "images" => $images_list, 
            "facilities" => $facilities_list,
            "rating" => 4.5,
            "review_count" => 0,
            "owner_name" => $row['pemilik'],
            "is_available" => ($row['status'] == 'tersedia'),
            "latitude" => -6.9175,
            "longitude" => 107.6191
        );
        $response[] = $data_item;
    }
}
echo json_encode($response);
?>