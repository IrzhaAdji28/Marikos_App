<?php
include 'conn.php';

// --- PENTING: PASTIKAN IP LAPTOP SESUAI DENGAN WIFI SAAT INI ---
$ip_address = "192.168.1.27"; 

// 1. QUERY DATABASE
// Kita ambil data kos, DAN kita cari ID User si pemilik (untuk fitur chat)
$query = "SELECT *, 
          (SELECT id FROM users WHERE users.nama = kos.pemilik LIMIT 1) as found_owner_id 
          FROM kos 
          ORDER BY id DESC";

$result = mysqli_query($connect, $query);

$response = array();

if ($result) {
    while($row = mysqli_fetch_assoc($result)) {
        
        // 2. SIAPKAN DATA FOTO
        // Gabungkan IP address dengan nama file dari database
        $foto_url = "http://" . $ip_address . "/marikos_api/uploads/" . $row['foto'];
        $images_list = array($foto_url); // Flutter butuh array/list

        // 3. SIAPKAN FASILITAS
        $facilities_list = array();
        if (!empty($row['fasilitas'])) {
            $facilities_list = array_map('trim', explode(',', $row['fasilitas']));
        }

        // 4. SIAPKAN OWNER ID (Untuk Chat)
        // Jika tidak ketemu di users, set default ke "0"
        $owner_id_val = empty($row['found_owner_id']) ? "0" : $row['found_owner_id'];

        // 5. MAPPING (PENERJEMAHAN) - INI KUNCINYA!
        // Kiri: Kunci yang dibaca Flutter ("name", "price")
        // Kanan: Nama kolom di Database Anda ("nama", "harga")
        $data_item = array(
            "id" => $row['id'],
            
            // Masalah "Kosong" Anda terjadi di sini sebelumnya:
            "name" => $row['nama'],           // DB: nama -> Flutter: name
            "price" => (double)$row['harga'], // DB: harga -> Flutter: price
            "address" => $row['alamat'],      // DB: alamat -> Flutter: address
            "type" => strtolower($row['jenis_kos']), // DB: jenis_kos -> Flutter: type
            
            "location" => "Bandung",          // Hardcode sementara (atau ambil dari alamat)
            "description" => "Fasilitas: " . $row['fasilitas'],
            
            "images" => $images_list, 
            "facilities" => $facilities_list,
            
            "rating" => 4.5,                  // Default value
            "review_count" => 10,             // Default value
            
            "owner_name" => $row['pemilik'],  // DB: pemilik -> Flutter: owner_name
            "owner_id" => $owner_id_val,      // ID hasil subquery tadi
            
            "is_available" => ($row['status'] == 'tersedia'),
            
            // Koordinat Default Bandung
            "latitude" => -6.9175,
            "longitude" => 107.6191
        );

        $response[] = $data_item;
    }
}

echo json_encode($response);
?>