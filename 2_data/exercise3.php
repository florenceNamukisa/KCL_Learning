<?php
// Prices
$hamburger_price = 4.95;
$milkshake_price = 1.95;
$cola_price = 0.85;

// Quantities
$hamburgers = 2;
$milkshakes = 1;
$colas = 1;

// Calculations
$hamburger_total = $hamburgers * $hamburger_price;
$milkshake_total = $milkshakes * $milkshake_price;
$cola_total = $colas * $cola_price;

$subtotal = $hamburger_total + $milkshake_total + $cola_total;
$tax_rate = 0.075;
$tip_rate = 0.16;

$tax = $subtotal * $tax_rate;
$tip = $subtotal * $tip_rate;
$post_tax_total = $subtotal + $tax;
$grand_total = $subtotal + $tax + $tip;

// Output the formatted bill
print "----------------------------------------\n";
print "ITEM            QTY   PRICE   TOTAL\n";
print "----------------------------------------\n";
printf("%-15s %3d  \$%5.2f  \$%6.2f\n", "Hamburger", $hamburgers, $hamburger_price, $hamburger_total);
printf("%-15s %3d  \$%5.2f  \$%6.2f\n", "Milkshake", $milkshakes, $milkshake_price, $milkshake_total);
printf("%-15s %3d  \$%5.2f  \$%6.2f\n", "Cola", $colas, $cola_price, $cola_total);
print "----------------------------------------\n";
printf("%-26s \$%6.2f\n", "Subtotal (pre-tax):", $subtotal);
printf("%-26s \$%6.2f\n", "Tax (7.5%):", $tax);
printf("%-26s \$%6.2f\n", "Total with tax:", $post_tax_total);
printf("%-26s \$%6.2f\n", "Tip (16%):", $tip);
printf("%-26s \$%6.2f\n", "Grand Total:", $grand_total);
print "----------------------------------------\n";
?>
