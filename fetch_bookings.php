<?php
$host = "localhost"; // or 127.0.0.1
$user = "root";
$password = ""; // your MySQL password
$database = "hotel_booking"; // update this if different

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT b.id, b.user_id, u.username, b.room_type, b.check_in_date, b.check_out_date, b.guests 
        FROM bookings b
        JOIN users u ON b.user_id = u.id
        ORDER BY b.id DESC
        LIMIT 10";

$result = $conn->query($sql);

$bookings = [];
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}

echo json_encode($bookings);
$conn->close();
?>
