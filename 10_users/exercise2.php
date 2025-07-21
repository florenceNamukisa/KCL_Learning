<?php

if (isset($_COOKIE['views'])) {
    $views = $_COOKIE['views'] + 1;
} else {
    $views = 1;
}

// Handling  20th view: reset the count by deleting the cookie
if ($views >= 20) {
    setcookie('views', '', time() - 3600); 
    echo "You've reached 20 views. Counter has been reset!<br>";
    $views = 0; 
} else {
    setcookie('views', $views, time() + 3600); 
}


if ($views > 0) {
    echo "Number of views: $views <br>";

    // Show special messages at specific counts
    if ($views == 5) {
        echo " Wow! You've viewed this page 5 times!";
    } elseif ($views == 10) {
        echo "10 visits! You're really into this!";
    } elseif ($views == 15) {
        echo " 15 times? You're amazing!";
    }
}
?>
