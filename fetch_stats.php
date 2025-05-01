<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$password = "";
$database = "hotel_booking"; // Make sure this matches your DB

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

// Total bookings
$totalBookings = $conn->query("SELECT COUNT(*) AS total FROM bookings")->fetch_assoc()['total'];

// Active bookings: optional logic — here using current date between check-in and check-out
$today = date('Y-m-d');
$activeBookingsQuery = "SELECT COUNT(*) AS active FROM bookings WHERE check_in_date <= '$today' AND check_out_date >= '$today'";
$activeBookings = $conn->query($activeBookingsQuery)->fetch_assoc()['active'];

// Total users
$totalUsers = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];

echo json_encode([
    "totalBookings" => $totalBookings,
    "activeBookings" => $activeBookings,
    "totalUsers" => $totalUsers
]);

$conn->close();
?>
