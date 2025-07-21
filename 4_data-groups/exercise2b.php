<?php
$cities = array(
    "New York, NY" => 8175133,
    "Los Angeles, CA" => 3792621,
    "Chicago, IL" => 2695598,
    "Houston, TX" => 2100263,
    "Philadelphia, PA" => 1526006,
    "Phoenix, AZ" => 1445632,
    "San Antonio, TX" => 1327407,
    "San Diego, CA" => 1307402,
    "Dallas, TX" => 1197816,
    "San Jose, CA" => 945942
);

// Sort by population (descending)
arsort($cities);

print "<h3>Sorted by Population (Descending)</h3>";
print "<table border='1' cellpadding='5'>";
print "<tr><th>City</th><th>Population</th></tr>";

$total_population = 0;

foreach ($cities as $city => $population) {
    print "<tr><td>$city</td><td>" . number_format($population) . "</td></tr>";
    $total_population += $population;
}

print "<tr><th>Total Population</th><th>" . number_format($total_population) . "</th></tr>";
print "</table>";
?>
