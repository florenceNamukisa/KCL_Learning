<?php
$cities = [
    "New York, NY" => 8175133,
    "Los Angeles, CA" => 3792621,
    "Chicago, IL" => 2695598,
    "Houston, TX" => 2100263,
    "Philadelphia, PA" => 1526006,
    "Phoenix, AZ" => 1445632,
    "San Antonio, TX" => 1327407,
    "San Diego, CA" => 1307402,
    "Dallas, TX" => 1197816,
    "San Jose, CA" => 945942,
];

$state_totals = [];

foreach ($cities as $location => $population) {
    $parts = explode(',', $location);
    $state = trim($parts[1]);

    if (!isset($state_totals[$state])) {
        $state_totals[$state] = 0;
    }
    $state_totals[$state] += $population;
}

print "<h2>US Cities Population (2010)</h2>";
print "<table border='1' cellpadding='5'>";
print "<tr><th>City</th><th>Population</th></tr>";

$total = 0;

foreach ($cities as $city => $pop) {
    print "<tr><td>$city</td><td>$pop</td></tr>";
    $total += $pop;
}

print "<tr><th colspan='2'>— State Totals —</th></tr>";
foreach ($state_totals as $state => $state_total) {
    print "<tr><td><b>Total for $state</b></td><td><b>$state_total</b></td></tr>";
}


print "<tr><th>Total Population (All Cities)</th><th>$total</th></tr>";
print "</table>";
?>
