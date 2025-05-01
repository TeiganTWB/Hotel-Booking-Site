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
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$is_admin = $_POST['is_admin'] ?? 0;

if (!$id || !$username || !$email) {
    echo json_encode(["success" => false, "error" => "Missing parameters"]);
    exit;
}

$stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, is_admin = ? WHERE id = ?");
$stmt->bind_param("ssii", $username, $email, $is_admin, $id);
$success = $stmt->execute();

echo json_encode(["success" => $success]);
$conn->close();
?>
