<?php
session_start();

// Hardcoded admin credentials
$hardcodedUsername = "admin";
$hardcodedPassword = "supersecure123"; // <- change to whatever you want

// Handle form submission
$loginError = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $hardcodedUsername && $password === $hardcodedPassword) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: Admin_Dashboard.html");
        exit;
    } else {
        $loginError = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/log2.css" />
  <title>Admin Login</title>
</head>
<body>
  <div class="container">
    <div class="forms">
      <div class="form login">
        <span class="title">Admin Login</span>

        <form method="POST" action="Admin_Login.php">
          <div class="input-field">
            <input type="text" name="username" placeholder="Enter your username" required />
          </div>
          <div class="input-field">
            <input type="password" name="password" placeholder="Enter your password" required />
          </div>

          <?php if ($loginError): ?>
            <div class="error-message" style="color: red; margin-top: 10px;">
              Invalid username or password.
            </div>
          <?php endif; ?>

          <div class="input-field button">
            <input type="submit" value="Login" />
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
