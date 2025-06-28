<?php
// Database credentials
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "softlight_bakery";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
?>
