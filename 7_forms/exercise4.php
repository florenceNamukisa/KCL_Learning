<?php
function isValidState($state) {
    $states = [
        'AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA',
        'KS','KY','LA','ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ',
        'NM','NY','NC','ND','OH','OK','OR','PA','RI','SC','SD','TN','TX','UT','VT',
        'VA','WA','WV','WI','WY'
    ];
    return in_array(strtoupper($state), $states);
}

function isValidZip($zip) {
    // Matches 5-digit ZIP or ZIP+4 format
    return preg_match('/^\d{5}(-\d{4})?$/', $zip);
}

function validate_input($data) {
    $errors = [];

    // Weight
    if (!is_numeric($data['weight']) || $data['weight'] <= 0 || $data['weight'] > 150) {
        $errors[] = "Weight must be a positive number no greater than 150 pounds.";
    }

    // Dimensions
    foreach (['length', 'width', 'height'] as $dim) {
        if (!is_numeric($data[$dim]) || $data[$dim] <= 0 || $data[$dim] > 36) {
            $errors[] = ucfirst($dim) . " must be a positive number no greater than 36 inches.";
        }
    }

    // States
    if (!isValidState($data['from_state'])) {
        $errors[] = "From State must be a valid US state abbreviation.";
    }
    if (!isValidState($data['to_state'])) {
        $errors[] = "To State must be a valid US state abbreviation.";
    }

    // ZIP Codes
    if (!isValidZip($data['from_zip'])) {
        $errors[] = "From ZIP code is invalid.";
    }
    if (!isValidZip($data['to_zip'])) {
        $errors[] = "To ZIP code is invalid.";
    }

    // Simple checks for required address fields (optional)
    foreach (['from_address', 'to_address'] as $field) {
        if (empty(trim($data[$field]))) {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . " cannot be empty.";
        }
    }

    return $errors;
}

function process_form() {
    $data = [];
    foreach (['from_address','from_state','from_zip','to_address','to_state','to_zip','length','width','height','weight'] as $field) {
        $data[$field] = $_POST[$field] ?? '';
    }

    $errors = validate_input($data);

    if ($errors) {
        print "<div style='color: red;'><strong>Errors:</strong><ul>";
        foreach ($errors as $err) {
            print "<li>" . htmlspecialchars($err) . "</li>";
        }
        print "</ul></div>";
        return false;
    }

    // If valid, print formatted report:
    print "<h3>Package Shipping Information</h3>";
    print "<strong>From:</strong><br>";
    print nl2br(htmlspecialchars($data['from_address'])) . "<br>";
    print htmlspecialchars(strtoupper($data['from_state'])) . ", " . htmlspecialchars($data['from_zip']) . "<br><br>";

    print "<strong>To:</strong><br>";
    print nl2br(htmlspecialchars($data['to_address'])) . "<br>";
    print htmlspecialchars(strtoupper($data['to_state'])) . ", " . htmlspecialchars($data['to_zip']) . "<br><br>";

    print "<strong>Dimensions (inches):</strong> ";
    print "Length: " . htmlspecialchars($data['length']) . ", ";
    print "Width: " . htmlspecialchars($data['width']) . ", ";
    print "Height: " . htmlspecialchars($data['height']) . "<br>";

    print "<strong>Weight:</strong> " . htmlspecialchars($data['weight']) . " lbs<br>";

    return true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Package Shipping Form</title>
</head>
<body>
    <h2>Enter Package Shipping Information</h2>

    <form method="POST" action="">
        <fieldset>
            <legend>From Address</legend>
            Address:<br>
            <textarea name="from_address" rows="3" cols="40"><?= htmlspecialchars($_POST['from_address'] ?? '') ?></textarea><br>
            State (e.g., NY): <input type="text" name="from_state" maxlength="2" size="2" value="<?= htmlspecialchars($_POST['from_state'] ?? '') ?>"><br>
            ZIP Code: <input type="text" name="from_zip" maxlength="10" value="<?= htmlspecialchars($_POST['from_zip'] ?? '') ?>"><br>
        </fieldset>

        <fieldset>
            <legend>To Address</legend>
            Address:<br>
            <textarea name="to_address" rows="3" cols="40"><?= htmlspecialchars($_POST['to_address'] ?? '') ?></textarea><br>
            State (e.g., CA): <input type="text" name="to_state" maxlength="2" size="2" value="<?= htmlspecialchars($_POST['to_state'] ?? '') ?>"><br>
            ZIP Code: <input type="text" name="to_zip" maxlength="10" value="<?= htmlspecialchars($_POST['to_zip'] ?? '') ?>"><br>
        </fieldset>

        <fieldset>
            <legend>Package Dimensions & Weight</legend>
            Length (inches): <input type="text" name="length" size="5" value="<?= htmlspecialchars($_POST['length'] ?? '') ?>"><br>
            Width (inches): <input type="text" name="width" size="5" value="<?= htmlspecialchars($_POST['width'] ?? '') ?>"><br>
            Height (inches): <input type="text" name="height" size="5" value="<?= htmlspecialchars($_POST['height'] ?? '') ?>"><br>
            Weight (pounds): <input type="text" name="weight" size="5" value="<?= htmlspecialchars($_POST['weight'] ?? '') ?>"><br>
        </fieldset>

        <input type="submit" value="Submit">
    </form>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        process_form();
    }
    ?>
</body>
</html>
