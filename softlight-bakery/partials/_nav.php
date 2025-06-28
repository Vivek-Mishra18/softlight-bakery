<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>
.navbar {
  background-color: #ff6f61;
  padding: 1em;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: white;
  font-size: 1.2em;
  font-weight: bold;
}

.nav-links {
  display: flex;
  gap: 1.5em;
}

.nav-links a, .nav-links span {
  color: white;
  text-decoration: none;
  font-weight: normal;
}

.nav-links a:hover {
  text-decoration: underline;
}
</style>

<div class="navbar">
  <div>🥐 Softlight Bakery</div>
  <div class="nav-links">
    <a href="menu.php">Home</a>
    <a href="cart.php">View Cart</a>
    <a href="order.php">Order</a>

    <?php if (isset($_SESSION['username'])): ?>
      <span>👋 <?= htmlspecialchars($_SESSION['username']) ?></span>
      <a href="logout.php">Logout</a>
    <?php else: ?>
      <a href="login.php">Login</a>
      <a href="signup.php">Sign Up</a>
    <?php endif; ?>
  </div>
</div>
