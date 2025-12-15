<?php
include 'conn.php';

$user_id = $_GET['user_id'];

// Query agak kompleks: Mencari lawan bicara unik dari tabel messages
// dan mengambil nama mereka dari tabel users
$query = "
    SELECT DISTINCT 
        u.id as partner_id, 
        u.nama as partner_name,
        (SELECT message FROM messages m2 
         WHERE (m2.sender_id = u.id AND m2.receiver_id = '$user_id') 
            OR (m2.sender_id = '$user_id' AND m2.receiver_id = u.id)
         ORDER BY m2.created_at DESC LIMIT 1) as last_message
    FROM users u
    JOIN messages m ON (m.sender_id = u.id OR m.receiver_id = u.id)
    WHERE (m.sender_id = '$user_id' OR m.receiver_id = '$user_id')
    AND u.id != '$user_id'
";

$result = mysqli_query($connect, $query);
$rooms = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rooms[] = $row;
    }
}

echo json_encode($rooms);
?>