<?php
include 'conn.php';

// Menangkap data teks
$nama_kos = $_POST['nama_kos'];
$harga = $_POST['harga'];
$fasilitas = $_POST['fasilitas'];
$lokasi = $_POST['lokasi'];
$deskripsi = $_POST['deskripsi'];

// Menangkap file gambar (upload)
$image = $_FILES['gambar']['name'];
$imagePath = "uploads/" . $image;
move_uploaded_file($_FILES['gambar']['tmp_name'], $imagePath);

// Insert ke Database
$query = "INSERT INTO kost (nama_kos, harga, fasilitas, lokasi, deskripsi, gambar) 
          VALUES ('$nama_kos', '$harga', '$fasilitas', '$lokasi', '$deskripsi', '$image')";

if(mysqli_query($connect, $query)){
    echo json_encode([
        "status" => "success", 
        "message" => "Data Kos Berhasil Ditambahkan"
    ]);
} else {
    echo json_encode([
        "status" => "failed", 
        "message" => "Gagal Menambahkan Data"
    ]);
}
?>