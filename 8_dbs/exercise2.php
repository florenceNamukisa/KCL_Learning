<?php
$mysqli = new mysqli("localhost", "username", "password", "your_database");


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$min_price = null;
$dishes = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['price'])) {
    $min_price = floatval($_POST['price']);
    $stmt = $mysqli->prepare("SELECT dish_name, price FROM dishes WHERE price >= ? ORDER BY price");
    $stmt->bind_param("d", $min_price);
    $stmt->execute();
    $result = $stmt->get_result();


    while ($row = $result->fetch_assoc()) {
        $dishes[] = $row;
    }

    $stmt->close();
}
?>

<form method="post" action="">
    <label>Enter minimum price:</label>
    <input type="text" name="price" required>
    <button type="submit">Find Dishes</button>
</form>

<?php if ($min_price !== null): ?>
    <h2>Dishes priced at least $<?= htmlspecialchars(number_format($min_price, 2)) ?>:</h2>
    <?php if (!empty($dishes)): ?>
        <ul>
            <?php foreach ($dishes as $dish): ?>
                <li><?= htmlspecialchars($dish['dish_name']) ?> - $<?= number_format($dish['price'], 2) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No dishes found with that price.</p>
    <?php endif; ?>
<?php endif; ?>

<?php $mysqli->close(); ?>
