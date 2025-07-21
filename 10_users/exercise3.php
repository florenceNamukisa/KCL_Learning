<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Select Your Favorite Color</title>
</head>
<body>
  <h2>Select Your Favorite Color</h2>
  <form method="post" action="set_color.php">
    <label for="color">Choose a color:</label>
    <select name="color" id="color">
      <option value="white">White</option>
      <option value="lightblue">Light Blue</option>
      <option value="lightgreen">Light Green</option>
      <option value="lightpink">Light Pink</option>
      <option value="lightyellow">Light Yellow</option>
    </select>
    <br><br>
    <button type="submit">Set Color</button>
  </form>
</body>
</html>
