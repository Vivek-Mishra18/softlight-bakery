<?php
session_start();
include 'partials/_dbconnect.php';

$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $phone   = htmlspecialchars($_POST['phone']);
    $items   = htmlspecialchars($_POST['items']);  // comma-separated list
    $message = htmlspecialchars($_POST['message']);
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    $stmt = $conn->prepare(
      "INSERT INTO enquiries (user_id, name, email, phone, item, message) 
       VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("isssss", $user_id, $name, $email, $phone, $items, $message);
    
    if ($stmt->execute()) {
        header("Location: thankyou.php");
        exit;
    } else {
        $msg = "❌ Submission failed. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Order Enquiry – Softlight Bakery</title>
  <link rel="stylesheet" href="style.css">
  <script src="scripts/cart.js" defer></script>
</head>
<body>
  <?php include 'partials/_nav.php'; ?>

  <div class="container">
    <h2 style="text-align:center;">📝 Place Your Order</h2>

    <form method="POST" class="form-container" id="order-form">
      <label for="name">Your Name</label>
      <input id="name" name="name" required placeholder="John Doe">

      <label for="email">Email</label>
      <input id="email" name="email" type="email" required placeholder="email@example.com">

      <label for="phone">Phone</label>
      <input id="phone" name="phone" required placeholder="+1234567890">

      <label for="items">Items</label>
      <textarea id="items" name="items" readonly required></textarea>

      <label for="message">Additional Message</label>
      <textarea id="message" name="message" placeholder="Any special instructions..."></textarea>

      <button type="submit">Submit Enquiry</button>
    </form>

    <?php if ($msg): ?>
      <p style="color:red; text-align:center;"><?= $msg ?></p>
    <?php endif; ?>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const cart = JSON.parse(localStorage.getItem('cart')) || [];
      const itemsField = document.getElementById('items');
      if (cart.length === 0) {
        itemsField.value = "No items in cart.";
      } else {
        itemsField.value = cart.map(i => `${i.name} (₹${i.price})`).join(", ");
      }
    });
  </script>
</body>
</html>
