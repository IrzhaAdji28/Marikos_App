<?php
include 'conn.php';

// Data dikirim dari Flutter dengan nama key 'no_hp'
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password']; 
$no_hp = $_POST['no_hp']; 

// Default role langsung 'user' (karena user bisa jadi pencari & pemilik sekaligus)
$role = 'user'; 

// 1. Cek email apakah kembar
$checkQuery = "SELECT * FROM users WHERE email = '$email'";
$checkResult = mysqli_query($connect, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Email sudah terdaftar!'
    ]);
} else {
    // 2. Insert Data
    // PERHATIKAN: Kita masukkan variabel $no_hp ke kolom 'no_telp'
    $query = "INSERT INTO users (nama, email, password, no_telp, role) 
              VALUES ('$nama', '$email', '$password', '$no_hp', '$role')";
    
    if (mysqli_query($connect, $query)) {
        echo json_encode([
            'success' => true,
            'message' => 'Registrasi berhasil'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            // Menampilkan error asli biar ketahuan kalau ada salah
            'message' => 'Gagal Database: ' . mysqli_error($connect)
        ]);
    }
}
?>