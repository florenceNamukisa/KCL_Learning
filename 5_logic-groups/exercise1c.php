<?php
function createImageTag($url, $alt = '', $height = '', $width = '') {
    print "<img src='$url'" .
        ($alt ? " alt='$alt'" : '') .
        ($height ? " height='$height'" : '') .
        ($width ? " width='$width'" : '') .
        " />";
}

createImageTag("pot.jpg", "Clay Pot", 100, 150);
?>
