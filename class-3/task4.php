<?php
function printFibonacci($n) {
    $first = 0;
    $second = 1;

    if ($n >= 1) {
        echo $first . " ";
    }
    if ($n >= 2) {
        echo $second . " ";
    }

    for ($i = 3; $i <= $n; $i++) {
        
        $next = $first + $second;
            echo $next . " ";

        $first = $second;
        $second = $next;
    }
}
printFibonacci(15);