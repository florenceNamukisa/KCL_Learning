<?php
// Prices
$hamburger_price = 4.95;
$milkshake_price = 1.95;
$cola_price = 0.85;

// Quantities
$hamburgers = 2;
$milkshakes = 1;
$colas = 1;

// Compute subtotal
$subtotal = ($hamburger_price * $hamburgers) + ($milkshake_price * $milkshakes) + ($cola_price * $colas);

// Tax and tip
$tax_rate = 0.075;
$tip_rate = 0.16;

$tax = $subtotal * $tax_rate;
$tip = $subtotal * $tip_rate;

// Total cost
$total = $subtotal + $tax + $tip;


print "Meal cost breakdown:\n";
print "Subtotal: $" . number_format($subtotal, 2) . "\n";
print "Tax (7.5%): $" . number_format($tax, 2) . "\n";
print "Tip (16%): $" . number_format($tip, 2) . "\n";
print "Total: $" . number_format($total, 2) . "\n";
?>
