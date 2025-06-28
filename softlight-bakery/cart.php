<!DOCTYPE html>
<html>
<head>
  <title>My Cart – Softlight Bakery</title>
  <link rel="stylesheet" href="style.css">
  <script src="scripts/cart.js" defer></script>
  <style>
    .cart-item {
      display: flex;
      justify-content: space-between;
      background: #fff3cd;
      margin-bottom: 10px;
      padding: 10px;
      border-radius: 6px;
    }
    .cart-item button {
      background-color: #e53e3e;
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 4px;
      cursor: pointer;
    }
    .cart-item button:hover {
      background-color: #c53030;
    }
  </style>
</head>
<body>
  <?php include 'partials/_nav.php'; ?>

  <div class="container">
    <h2 style="text-align:center;">🛒 Your Cart</h2>
    <div id="cart-items"></div>
    <div style="text-align:center; margin-top:1em;">
      <a href="order.php" class="action-link">Proceed to Order</a>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const cartDiv = document.getElementById('cart-items');
      const cart = JSON.parse(localStorage.getItem('cart')) || [];

      if (cart.length === 0) {
        cartDiv.innerHTML = "<p>Your cart is empty.</p>";
        return;
      }

      let html = '';
      cart.forEach((item, index) => {
        html += `<div class="cart-item">
          <div><strong>${item.name}</strong> – ₹${item.price}</div>
          <button onclick="removeFromCart(${index})">Remove</button>
        </div>`;
      });
      cartDiv.innerHTML = html;
    });

    function removeFromCart(index) {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      cart.splice(index, 1);
      localStorage.setItem('cart', JSON.stringify(cart));
      location.reload();
    }
  </script>
</body>
</html>
