<?php
$mysqli = new mysqli("localhost", "username", "password", "your_database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$dish_options = [];
$result = $mysqli->query("SELECT dish_id, dish_name FROM dishes ORDER BY dish_name");
while ($row = $result->fetch_assoc()) {
    $dish_options[] = $row;
}

$selected_dish = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dish_id'])) {
    $dish_id = intval($_POST['dish_id']); 

    $stmt = $mysqli->prepare("SELECT * FROM dishes WHERE dish_id = ?");
    $stmt->bind_param("i", $dish_id);
    $stmt->execute();
    $selected_dish = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}
?>

<form method="post" action="">
    <label for="dish_id">Select a dish:</label>
    <select name="dish_id" id="dish_id" required>
        <option value="">-- Choose a dish --</option>
        <?php foreach ($dish_options as $dish): ?>
            <option value="<?= $dish['dish_id'] ?>" <?= (isset($dish_id) && $dish['dish_id'] == $dish_id) ? 'selected' : '' ?>>
                <?= htmlspecialchars($dish['dish_name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Show Details</button>
</form>


<?php if ($selected_dish): ?>
    <h2>Dish Details</h2>
    <ul>
        <li><strong>ID:</strong> <?= $selected_dish['dish_id'] ?></li>
        <li><strong>Name:</strong> <?= htmlspecialchars($selected_dish['dish_name']) ?></li>
        <li><strong>Price:</strong> $<?= number_format($selected_dish['price'], 2) ?></li>
        <li><strong>Spicy:</strong> <?= $selected_dish['is_spicy'] ? 'Yes' : 'No' ?></li>
    </ul>
<?php endif; ?>

<?php $mysqli->close(); ?>
