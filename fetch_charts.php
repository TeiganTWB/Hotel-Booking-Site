<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$password = "";
$database = "hotel_booking";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    echo json_encode(["error" => "Connection failed"]);
    exit;
}

// Booking trends - group by month
$bookingTrends = [];
$trendQuery = "
    SELECT DATE_FORMAT(check_in_date, '%b') AS month, COUNT(*) AS count
    FROM bookings
    WHERE check_in_date IS NOT NULL
    GROUP BY month
    ORDER BY STR_TO_DATE(month, '%b') ASC
";
$result = $conn->query($trendQuery);
while ($row = $result->fetch_assoc()) {
    $bookingTrends[] = $row;
}

// Room types distribution
$roomTypes = [];
$typeQuery = "
    SELECT room_type, COUNT(*) AS count
    FROM bookings
    WHERE room_type IS NOT NULL
    GROUP BY room_type
";
$result = $conn->query($typeQuery);
while ($row = $result->fetch_assoc()) {
    $roomTypes[] = $row;
}

echo json_encode([
    "bookingTrends" => $bookingTrends,
    "roomTypes" => $roomTypes
]);

$conn->close();
?>
