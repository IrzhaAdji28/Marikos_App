<?php
include 'conn.php';

$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$message = $_POST['message'];

if ($sender_id && $receiver_id && $message) {
    // Mencegah karakter aneh merusak database
    $message = mysqli_real_escape_string($connect, $message);

    $query = "INSERT INTO messages (sender_id, receiver_id, message) 
              VALUES ('$sender_id', '$receiver_id', '$message')";

    if (mysqli_query($connect, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => mysqli_error($connect)]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
}
?>