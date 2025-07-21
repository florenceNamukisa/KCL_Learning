<?php
session_start();

// Pre-fill values from session if available
$order = $_SESSION['order'] ?? [];
$products = ["Apples", "Bananas", "Oranges", "Tomatoes", "Milk", "Bread"];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Form</title>
</head>
<body>
  <h2>Product Order Form</h2>
  <form method="post" action="show_order.php">
    <?php foreach ($products as $product): ?>
      <label><?= $product ?>:</label>
      <input type="number" name="order[<?= $product ?>]" value="<?= htmlspecialchars($order[$product] ?? 0) ?>" min="0"><br><br>
    <?php endforeach; ?>
    <button type="submit">Submit Order</button>
  </form>
</body>
</html>
