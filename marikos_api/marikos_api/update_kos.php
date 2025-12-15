<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $harga = $_POST['harga'];
    $fasilitas = $_POST['fasilitas'];
    $jenis_kos = $_POST['jenis_kos'];
    $pemilik = $_POST['pemilik'];
    $status = $_POST['status'];

    // Cek apakah ada file gambar baru yang diupload
    if (!empty($_FILES['foto']['name'])) {
        $image_name = $_FILES['foto']['name'];
        $image_temp = $_FILES['foto']['tmp_name'];
        $new_name = time() . "_" . $image_name;
        $upload_path = "uploads/" . $new_name;

        move_uploaded_file($image_temp, $upload_path);

        // Update termasuk gambar
        $query = "UPDATE kos SET nama='$nama', alamat='$alamat', harga='$harga', fasilitas='$fasilitas', 
                  jenis_kos='$jenis_kos', pemilik='$pemilik', status='$status', foto='$new_name' WHERE id='$id'";
    } else {
        // Update tanpa mengubah gambar
        $query = "UPDATE kos SET nama='$nama', alamat='$alamat', harga='$harga', fasilitas='$fasilitas', 
                  jenis_kos='$jenis_kos', pemilik='$pemilik', status='$status' WHERE id='$id'";
    }

    if (mysqli_query($connect, $query)) {
        echo json_encode(['success' => true, 'message' => 'Data Berhasil Diupdate']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal Update Data']);
    }
}
?>