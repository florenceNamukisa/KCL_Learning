<?php
function webColor($r, $g, $b) {
    $color = "#" . str_pad(dechex($r), 2, "0", STR_PAD_LEFT)
                 . str_pad(dechex($g), 2, "0", STR_PAD_LEFT)
                 . str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
    print $color;
}
webColor(255, 0, 255); 
?>
