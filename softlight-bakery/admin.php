<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
</head>
<body>
  <h2>Welcome, <?= $_SESSION['admin_username'] ?? 'Admin' ?>!</h2>
  <p>This is the admin dashboard.</p>
  <a href="admin_logout.php">Logout</a>
</body>
</html>
