<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
require 'db_connection.php';

$checkIn = $_POST['check_in_date'] ?? '';
$checkOut = $_POST['check_out_date'] ?? '';
$guests = $_POST['guests'] ?? '';
$roomType = $_POST['room_type'] ?? '';
$userId = 999; // Admin/system user

if (!$checkIn || !$checkOut || !$guests || !$roomType) {
    echo json_encode(['success' => false, 'error' => 'Missing required fields']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO bookings (check_in_date, check_out_date, guests, room_type, user_id) VALUES (?, ?, ?, ?, ?)");
if ($stmt) {
    $stmt->bind_param("ssisi", $checkIn, $checkOut, $guests, $roomType, $userId);
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Execute failed']);
    }
    $stmt->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Prepare failed']);
}

$conn->close();
?>
