<?php
header('Content-Type: application/json');
$host = "localhost";
$user = "root";
$password = "";
$database = "hotel_booking";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["success" => false, "error" => "Connection failed"]);
    exit;
}

$id = $_POST['id'] ?? null;
$room_type = $_POST['room_type'] ?? '';
$check_in = $_POST['check_in_date'] ?? '';
$check_out = $_POST['check_out_date'] ?? '';
$guests = $_POST['guests'] ?? '';

if (!$id) {
    echo json_encode(["success" => false, "error" => "No ID provided"]);
    exit;
}

$stmt = $conn->prepare("UPDATE bookings SET room_type=?, check_in_date=?, check_out_date=?, guests=? WHERE id=?");
$stmt->bind_param("sssii", $room_type, $check_in, $check_out, $guests, $id);
$success = $stmt->execute();

echo json_encode(["success" => $success]);
$conn->close();
?>
