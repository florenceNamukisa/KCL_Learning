<?php
function process_form() {
    foreach ($_POST as $key => $value) {
        echo htmlspecialchars($key) . ': ' . htmlspecialchars($value) . "<br>";
    }
}
?>
