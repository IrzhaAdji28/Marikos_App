<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];
    $fasilitas = $_POST['fasilitas'];
    $jenis_kos = $_POST['jenis_kos'];
    $pemilik = $_POST['pemilik'];
    
    // Proses Upload Gambar
    $image_name = $_FILES['foto']['name'];
    $image_temp = $_FILES['foto']['tmp_name'];
    
    // Beri nama unik agar tidak bentrok (tambah timestamp)
    $new_name = time() . "_" . $image_name;
    $upload_path = "uploads/" . $new_name;

    if (move_uploaded_file($image_temp, $upload_path)) {
        $query = "INSERT INTO kos (nama, alamat, harga, fasilitas, jenis_kos, pemilik, foto, status) 
                  VALUES ('$nama', '$alamat', '$harga', '$fasilitas', '$jenis_kos', '$pemilik', '$new_name', 'tersedia')";

        if (mysqli_query($connect, $query)) {
            echo json_encode(['success' => true, 'message' => 'Data Kos Berhasil Ditambahkan']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal Simpan ke Database']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal Upload Gambar']);
    }
}
?>