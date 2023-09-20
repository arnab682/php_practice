<?php
function printEvenNumbers($start, $end, $step) {
    for ($i = $start; $i <= $end; $i += $step) {
        echo $i . " ";
    }
    echo "<br>";
}

// Using a for loop
echo "Using a for loop: ";
printEvenNumbers(2, 20, 2);



function printEvenNumbersWhile($start, $end, $step) {
    while ($start <= $end) {
        echo $start . " ";
        $start += $step;
    }
    echo "<br>";
}
// Using a while loop
echo "Using a while loop: ";
printEvenNumbersWhile(2, 20, 2);



function printEvenNumbersDoWhile($start, $end, $step) {
    do {
        echo $start . " ";
        $start += $step;
    } while ($start <= $end);
    echo "<br>";
}
// Using a do-while loop
echo "Using a do-while loop: ";
printEvenNumbersDoWhile(2, 20, 2);
