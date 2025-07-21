<?php
$conn = new mysqli('localhost', 'your_username', 'your_password', 'your_database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// select dishes ordered by price
$sql = "SELECT dish_name, price, is_spicy FROM dishes ORDER BY price ASC";
$result = $conn->query($sql);

// Displaying results
if ($result->num_rows > 0) {
    echo "<h2>Dishes Sorted by Price</h2><ul>";
    while ($row = $result->fetch_assoc()) {
        $spicy = $row['is_spicy'] ? " (Spicy)" : "";
        echo "<li>{$row['dish_name']} - \${$row['price']}{$spicy}</li>";
    }
    echo "</ul>";
} else {
    echo "No dishes found.";
}

$conn->close();
?>
