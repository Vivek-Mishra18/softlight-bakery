<?php
session_start();
include 'partials/_dbconnect.php';
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST["username"]);
  $password = $_POST["password"];

  $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $username;
      header("Location: menu.php");
      exit;
    } else {
      $msg = "❌ Incorrect password.";
    }
  } else {
    $msg = "❌ User not found.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login – Softlight Bakery</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'partials/_nav.php'; ?>
  <div class="container">
    <h2 style="text-align:center;">🔐 User Login</h2>
    <form method="POST" class="form-container">
      <input name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
      <p style="color:red"><?= $msg ?></p>
    </form>
  </div>
</body>
</html>
