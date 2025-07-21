<?php
$mysqli = new mysqli("localhost", "username", "password", "your_database");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$dish_options = [];
$dish_result = $mysqli->query("SELECT dish_id, dish_name FROM dishes ORDER BY dish_name");
while ($row = $dish_result->fetch_assoc()) {
    $dish_options[] = $row;
}

// Handle form submission
$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $favorite_dish_id = intval($_POST['favorite_dish_id']);

    if ($name && $phone && $favorite_dish_id) {
        $stmt = $mysqli->prepare("INSERT INTO customers (name, phone, favorite_dish_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $name, $phone, $favorite_dish_id);

        if ($stmt->execute()) {
            $success = true;
        } else {
            $error = "Failed to add customer: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<h2>Add New Customer</h2>
<?php if ($success): ?>
    <p style="color: green;">Customer successfully added!</p>
<?php elseif ($error): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post" action="">
    <label for="name">Customer Name:</label><br>
    <input type="text" name="name" id="name" required><br><br>

    <label for="phone">Phone Number:</label><br>
    <input type="text" name="phone" id="phone" required><br><br>

    <label for="favorite_dish_id">Favorite Dish:</label><br>
    <select name="favorite_dish_id" id="favorite_dish_id" required>
        <option value="">-- Select a dish --</option>
        <?php foreach ($dish_options as $dish): ?>
            <option value="<?= $dish['dish_id'] ?>"><?= htmlspecialchars($dish['dish_name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Add Customer</button>
</form>

<?php $mysqli->close(); ?>
