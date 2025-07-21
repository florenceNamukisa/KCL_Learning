<?php
$fahrenheit = -50;

print "<table border='1' cellpadding='5'>";
print "<tr><th>Fahrenheit (°F)</th><th>Celsius (°C)</th></tr>";

while ($fahrenheit <= 50) {
    $celsius = ($fahrenheit - 32) * 5 / 9;
    print "<tr><td>$fahrenheit</td><td>" . round($celsius, 2) . "</td></tr>";
    $fahrenheit += 5;
}

print "</table>";
?>
