<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Optional: Ambil nama file gambar dulu untuk dihapus dari folder (agar server bersih)
    $q_gambar = mysqli_query($connect, "SELECT foto FROM kos WHERE id='$id'");
    $data = mysqli_fetch_assoc($q_gambar);
    $file_path = "uploads/" . $data['foto'];
    
    if (file_exists($file_path)) {
        unlink($file_path); // Hapus file fisik
    }

    // Hapus dari database
    $query = "DELETE FROM kos WHERE id='$id'";

    if (mysqli_query($connect, $query)) {
        echo json_encode(['success' => true, 'message' => 'Data Berhasil Dihapus']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Gagal Menghapus Data']);
    }
}
?>