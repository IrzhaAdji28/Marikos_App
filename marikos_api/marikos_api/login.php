<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari request Flutter
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Mencegah SQL Injection sederhana
    $email = mysqli_real_escape_string($connect, $email);
    $password = mysqli_real_escape_string($connect, $password);

    // Cek user di database
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // PENTING: Struktur JSON ini disesuaikan dengan User.fromJson di Flutter
        echo json_encode([
            'success' => true,
            'message' => 'Login Berhasil',
            'user' => [ // Key ini harus 'user', bukan 'data'
                'id' => $row['id'],
                
                // Mapping kolom Database (nama) ke Model Flutter (name)
                'name' => $row['nama'], 
                
                'email' => $row['email'],
                
                // Mapping kolom Database (no_telp) ke Model Flutter (phone)
                'phone' => $row['no_telp'], 
                
                'role' => $row['role'],
                
                // Karena tabel users belum punya kolom foto, kita kirim string kosong
                // agar Flutter tidak error null.
                'profile_image' => '' 
            ]
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Email atau Password Salah'
        ]);
    }
}
?>