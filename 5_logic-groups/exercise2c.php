<?php
$imageBasePath = "/images/";
function createImageTag($filename, $alt = '', $height = '', $width = '') {
    global $imageBasePath;

    print "<img src='" . $imageBasePath . $filename . "'" .
          ($alt ? " alt='$alt'" : '') .
          ($height ? " height='$height'" : '') .
          ($width ? " width='$width'" : '') .
          " />";
}

createImageTag("Donkey.png", "A beautiful donkey", 150, 200);
?>
