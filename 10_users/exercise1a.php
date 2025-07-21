<?php
if (isset($_COOKIE['views'])) {
    $views = $_COOKIE['views'] + 1;
} else {
    $views = 1;
}

// Set the cookie again with a 1-year expiry time
setcookie('views', $views, time() + (365 * 24 * 60 * 60));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page Views</title>
</head>
<body>
    <h1>Number of views: <?php echo $views; ?></h1>
</body>
</html>
