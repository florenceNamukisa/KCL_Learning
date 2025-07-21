<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['order'] = $_POST['order'];
} elseif (isset($_POST['checkout'])) {
    unset($_SESSION['order']);
    $checkedOut = true;
}

$order = $_SESSION['order'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Summary</title>
</head>
<body>
  <h2>Order Summary</h2>

  <?php if (!empty($order)): ?>
    <ul>
      <?php foreach ($order as $product => $qty): ?>
        <?php if ((int)$qty > 0): ?>
          <li><?= htmlspecialchars($product) ?>: <?= (int)$qty ?></li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  <?php elseif (!empty($checkedOut)): ?>
    <p><strong>Thank you! Your order has been checked out and cleared.</strong></p>
  <?php else: ?>
    <p>No items in your order.</p>
  <?php endif; ?>

  <br>
  <a href="order_form.php">← Back to Order Form</a>

  <?php if (!empty($order)): ?>
    <form method="post" action="show_order.php" style="margin-top:20px;">
      <input type="hidden" name="checkout" value="1">
      <button type="submit">Check Out</button>
    </form>
  <?php endif; ?>
</body>
</html>
