<?php
include 'db_connection.php';
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode([
        'status' => 'error',
        'message' => 'Please log in before booking.'
    ]);
    exit;
}

$user_id = $_SESSION['user_id'];
$room_type = $_POST['room_type'] ?? '';
$check_in_date = $_POST['check_in_date'] ?? '';
$check_out_date = $_POST['check_out_date'] ?? '';
$guests = $_POST['guests'] ?? '';

$stmt = $conn->prepare("INSERT INTO bookings (user_id, room_type, check_in_date, check_out_date, guests) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("isssi", $user_id, $room_type, $check_in_date, $check_out_date, $guests);

if ($stmt->execute()) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Booking successful!',
        'download' => 'download_summary.php'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Database error: ' . $stmt->error
    ]);
}
?>
