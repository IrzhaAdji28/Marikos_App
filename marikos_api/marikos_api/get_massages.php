<?php
include 'conn.php';

$user_id = $_GET['user_id'];
$other_id = $_GET['other_id'];

// Ambil pesan dimana (Pengirim=Saya & Penerima=Dia) ATAU (Pengirim=Dia & Penerima=Saya)
$query = "SELECT * FROM messages 
          WHERE (sender_id = '$user_id' AND receiver_id = '$other_id') 
          OR (sender_id = '$other_id' AND receiver_id = '$user_id') 
          ORDER BY created_at ASC";

$result = mysqli_query($connect, $query);
$messages = array();

while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = $row;
}

echo json_encode($messages);
?>