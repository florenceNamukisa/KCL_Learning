<?php
print "<table border='1' cellpadding='5'>";
print "<tr><th>Fahrenheit (°F)</th><th>Celsius (°C)</th></tr>";

for ($fahrenheit = -50; $fahrenheit <= 50; $fahrenheit += 5) {
    $celsius = ($fahrenheit - 32) * 5 / 9;
    print "<tr><td>$fahrenheit</td><td>" . round($celsius, 2) . "</td></tr>";
}

print "</table>";
?>
