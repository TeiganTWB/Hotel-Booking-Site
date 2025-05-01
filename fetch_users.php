<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "hotel_booking";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT u.id, u.username, u.email, u.is_admin, 
               (SELECT COUNT(*) FROM bookings b WHERE b.user_id = u.id) AS bookings_count 
        FROM users u
        ORDER BY u.id DESC
        LIMIT 10";

$result = $conn->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode($users);
$conn->close();
?>
