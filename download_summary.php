<?php
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

include 'db_connection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Please log in to download your booking summary.";
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id = ? ORDER BY id DESC LIMIT 1");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "No booking details found.";
    exit;
}

$booking = $result->fetch_assoc();
$user_id = htmlspecialchars($_SESSION['user_id'] ?? 'N/A');
$room_type = htmlspecialchars($booking['room_type'] ?? 'N/A');
$check_in_date = htmlspecialchars($booking['check_in_date'] ?? 'N/A');
$check_out_date = htmlspecialchars($booking['check_out_date'] ?? 'N/A');
$guests = htmlspecialchars($booking['guests'] ?? 'N/A');

// Absolute paths for images
$logo_path = realpath('images/NLogoB.JPG');
$hotel_image_path = realpath('images/HotelOutside.JPG');

// Base64 encode images
$logo_base64 = $logo_path ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($logo_path)) : '';
$hotel_image_base64 = $hotel_image_path ? 'data:image/jpeg;base64,' . base64_encode(file_get_contents($hotel_image_path)) : '';

$html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        @page { margin: 0; }
        body { margin: 0; font-family: Arial, sans-serif; background-color: #1b1b1b; color: #ffffff; }
        .container { padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; border-bottom: 2px solid #d4af37; }
        .header img { height: 100px; }
        .company-info { text-align: right; font-size: 14px; color: #d4af37; line-height: 1.5; }
        .title { text-align: center; color: #d4af37; font-size: 36px; margin: 20px 0 40px; font-weight: bold; }
        .content { display: flex; gap: 20px; align-items: flex-start; margin-bottom: 40px; }
        .description { flex: 1; font-size: 16px; line-height: 1.8; text-align: justify; }
        .hotel-image img { width: 100%; max-width: 200px; border-radius: 8px; }
        .details { background-color:rgb(32, 32, 32); border-radius: 8px; padding: 20px; text-align: left; max-width: 600px; margin: 0 auto; }
        .details h3 { text-align: center; color: #d4af37; font-size: 20px; margin-bottom: 20px; }
        .details p { text-align: center; margin: 20px 0; font-size: 14px; line-height: 1.5; }
        .details span {text-align: center; color: #d4af37; font-weight: bold; }
        .footer { margin-top: 40px; text-align: center; color: #d4af37; font-size: 12px; padding-top: 20px; border-top: 1px solid #555; }
        .footer a { color: #d4af37; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="$logo_base64" alt="Company Logo">
            <div class="company-info">
                <p>123 Gold Avenue</p>
                <p>Luxury City, LX 45678</p>
                <p>Tel: +123-456-7890</p>
                <p>Email: support@CrimsonLuxe.com</p>
            </div>
        </div>

        <!-- Title -->
        <div class="title">Booking Summary</div>

        <!-- Content -->
        <div class="content">
            <div class="description">
                <p>Thank you for choosing Crimson Luxe! Your booking has been confirmed, and we’re delighted to have you as our guest. Below, you’ll find the details of your booking. If you have any questions or special requests, feel free to reach out to our team at any time. We’re committed to making your stay memorable and luxurious.</p>
            </div>
            <div class="hotel-image">
                <!--<img src="$hotel_image_base64" alt="Hotel Image"> -->
            </div>
        </div>

        <!-- Details Section -->
        <div class="details">
            <h3>Your Booking Details</h3>
            <p><span>ID:</span> $user_id</p>
            <p><span>Room Type:</span> $room_type</p>
            <p><span>Check-in Date:</span> $check_in_date</p>
            <p><span>Check-out Date:</span> $check_out_date</p>
            <p><span>Guests:</span> $guests</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2025 Crimson Luxe. All rights reserved.</p>
            <p>Contact us: <a href="mailto:support@CrimsonLuxe.com">support@CrimsonLuxe.com</a> | Tel: +123-456-7890</p>
            <p>Follow us on social media: <a href="#">@CrimsonLuxe</a></p>
            <p>Crimson Luxe - Where Comfort Meets Elegance</p>
        </div>
    </div>
</body>
</html>
HTML;

// Generate PDF
$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=Booking_Summary.pdf");
echo $dompdf->output();
exit;
?>
