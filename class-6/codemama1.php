<?php

fscanf(STDIN, "%d", $a);
fscanf(STDIN, "%d", $b);

$a = (int) fgets(STDIN);
$b = (int) fgets(STDIN);

function calculatePrice($originalPrice, $discount) {
    $finalPrice = $originalPrice - ($originalPrice * ($discount / 100));
    return number_format($finalPrice, 2, '.', '');
}

$price = calculatePrice($a, $b);
echo $price;