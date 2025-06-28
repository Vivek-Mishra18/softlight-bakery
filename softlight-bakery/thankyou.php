<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Thank You – Softlight Bakery</title>
  <link rel="stylesheet" href="style.css">
  <script>
    // Clear cart after successful order
    localStorage.removeItem('cart');
  </script>
  <style>
    .thankyou-box {
      text-align: center;
      margin-top: 5em;
    }
    .action-link {
      display: inline-block;
      margin-top: 1em;
      padding: 10px 20px;
      background-color: #48bb78;
      color: white;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.2s ease-in-out;
    }
    .action-link:hover {
      background-color: #38a169;
    }
  </style>
</head>
<body>
  <?php include 'partials/_nav.php'; ?>

  <div class="thankyou-box">
    <h2>🎉 Thank you for your enquiry!</h2>
    <p>We’ve received your request and will contact you shortly.</p>
    <a href="menu.php" class="action-link">← Back to Menu</a>
  </div>
</body>
</html>
