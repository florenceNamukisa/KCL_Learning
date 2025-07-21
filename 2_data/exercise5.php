<?php
// Initializing the counter
$number = 1;
$power = 2;

print "Number\tPower of 2\n";
print "---------------------\n";
// Loop from 1 to 5
while ($number <= 5) {
    print $number . "\t" . $power . "\n";
    
    $number++;      // Increment the number
    $power *= 2;    // Multiply power by 2
}
?>
