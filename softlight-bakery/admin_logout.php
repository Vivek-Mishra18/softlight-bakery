<?php
session_start();
// Only destroy admin session, not user session if both exist
unset($_SESSION['admin_logged_in']);
unset($_SESSION['admin_username']);

header("Location: admin_login.php");
exit;
