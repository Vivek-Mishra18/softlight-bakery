// Called when user clicks "Add to Cart"
function addToCart(name, price) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push({ name: name, price: parseFloat(price) });
  localStorage.setItem('cart', JSON.stringify(cart));
  alert(`${name} added to cart!`);
}

// Load and display cart items in cart.php
document.addEventListener('DOMContentLoaded', function () {
  const cartDiv = document.getElementById('cart-items');
  if (!cartDiv) return; // Only run on cart.php

  const cart = JSON.parse(localStorage.getItem('cart')) || [];

  if (cart.length === 0) {
    cartDiv.innerHTML = "<p>Your cart is empty.</p>";
    return;
  }

  let total = 0;
  let html = '<ul class="cart-list">';
  cart.forEach((item, index) => {
    total += item.price;
    html += `<li class="cart-item">
      <strong>${item.name}</strong> – ₹${item.price}
      <button onclick="removeFromCart(${index})">Remove</button>
    </li>`;
  });
  html += `</ul><p><strong>Total: ₹${total.toFixed(2)}</strong></p>`;
  cartDiv.innerHTML = html;
});

// Remove item from cart
function removeFromCart(index) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.splice(index, 1);
  localStorage.setItem('cart', JSON.stringify(cart));
  location.reload();
}
