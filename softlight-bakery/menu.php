<?php
include 'partials/_dbconnect.php';
$result = mysqli_query($conn, "SELECT * FROM bakery_items");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Menu – Softlight Bakery</title>
  <link rel="stylesheet" href="style.css">
  <script src="script/cart.js" defer></script>
  <style>
    .products {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2em;
      margin-top: 1.5em;
    }

    .product {
      background-color: #fff;
      padding: 1em;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      text-align: center;
      transition: 0.3s ease;
    }

    .product:hover {
      transform: scale(1.03);
    }

    .product img {
      width: 100%;
      max-height: 180px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 0.5em;
    }

    .action-link {
      display: inline-block;
      margin-top: 2em;
      padding: 10px 20px;
      background-color: #48bb78;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      transition: 0.2s;
    }

    .action-link:hover {
      background-color: #38a169;
    }

    .navbar {
      background-color: #ff6f61;
      padding: 1em;
      color: white;
      font-size: 1.3em;
      text-align: center;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <?php include 'partials/_nav.php'; ?>

  <div class="container">
    <h2 style="text-align:center; margin-top: 1em;">Our Menu</h2>
    <div class="products">
      <?php while($item = mysqli_fetch_assoc($result)): 
        $img = strtolower(str_replace(' ', '_', $item['name'])) . ".jpg";
        $imgPath = "images/$img";
      ?>
      <div class="product">
        <img src="<?= file_exists($imgPath) ? $imgPath : 'images/default.jpg' ?>" alt="<?= $item['name'] ?>">
        <h3><?= htmlspecialchars($item['name']) ?></h3>
        <p>Category: <?= htmlspecialchars($item['category']) ?></p>
        <p><strong>₹<?= $item['price'] ?></strong></p>
        <button onclick="addToCart('<?= $item['name'] ?>', <?= $item['price'] ?>)">Add to Cart</button>
      </div>
      <?php endwhile; ?>
    </div>
    <div style="text-align:center;">
      <a href="cart.php" class="action-link">🛒 View Cart</a>
    </div>
  </div>
</body>
</html>
