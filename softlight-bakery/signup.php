<?php
session_start();
include 'partials/_dbconnect.php';
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $username, $email, $password);

  if ($stmt->execute()) {
    $msg = "✅ Signup successful. Please login.";
  } else {
    $msg = "❌ Signup failed. Username might already exist.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up – Softlight Bakery</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'partials/_nav.php'; ?>
  <div class="container">
    <h2 style="text-align:center;">👤 Create Your Account</h2>

    <form method="POST" class="form-container">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      
      <!-- ✅ This is the missing button -->
      <button type="submit">Sign Up</button>

      <?php if ($msg): ?>
        <p style="color:green;"><?= htmlspecialchars($msg) ?></p>
      <?php endif; ?>
    </form>
  </div>
</body>
</html>
