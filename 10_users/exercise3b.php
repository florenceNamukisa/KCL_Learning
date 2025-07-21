<?php
session_start();

if (isset($_POST['color'])) {
    $_SESSION['bgcolor'] = $_POST['color'];
}

// Redirect to the display page
header("Location: show_color.php");
exit;
