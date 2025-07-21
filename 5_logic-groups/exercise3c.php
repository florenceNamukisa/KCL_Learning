<?php

// Global variable for the base image path
$imageBasePath = "/images/";

function createImageTag($filename, $alt = '', $height = '', $width = '') {
    global $imageBasePath;

    print "<img src='" . $imageBasePath . $filename . "'" .
          ($alt ? " alt='$alt'" : '') .
          ($height ? " height='$height'" : '') .
          ($width ? " width='$width'" : '') .
          " />";
}
?>
