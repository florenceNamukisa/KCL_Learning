<?php
session_start();

$bgcolor = isset($_SESSION['bgcolor']) ? $_SESSION['bgcolor'] : 'white';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Favorite Color</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($bgcolor); ?>;">
  <h1>This page has your favorite color as background!</h1>
  <p>Selected color: <strong><?php echo htmlspecialchars($bgcolor); ?></strong></p>
  <a href="color_form.php">Choose another color</a>
</body>
</html>
