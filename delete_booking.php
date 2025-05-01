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
if (!$id) {
    echo json_encode(["success" => false, "error" => "No ID provided"]);
    exit;
}

$stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
$stmt->bind_param("i", $id);
$success = $stmt->execute();

echo json_encode(["success" => $success]);
$conn->close();
?>
