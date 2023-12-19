<!-- Positivity
Problem Statement

Write a program to check if an array contains more positivity than negativity.An array has more positivity if it contains strictly more unique positive values than unique negative values. If the number of positive and negative values are equal then it is also taken as negativity.
Input

The program will take an integer NN as the size of an array. Then it will take the integer values of the array M[]M[].
Output

The output will print either "Positivity" or "Negativity"
Constraints

    0 ≤ |N| ≤ 10000
    -10000 ≤ |M[]| ≤ 10000

Example:

Enter numbers
Input:

5
1 -3 6 -2 -8

Output:

Negativity -->



<?php

    function checkPositivityNegativity($arr) {
  
        $positiveValues = [];
        $negativeValues = [];

    foreach ($arr as $value) {
        if ($value >= 0 && !in_array($value, $positiveValues)) {
            
            $positiveValues[] = $value;

        } elseif ($value < 0 && !in_array($value, $negativeValues)) {
            
            $negativeValues[] = $value;

        }
    }
//echo $negativeValues;
    if (count($positiveValues) > count($negativeValues)) {
        
        return "Positivity";

    } else {

        return "Negativity";
        
    }
}

fscanf(STDIN, "%d\n", $n);
$numbers = explode(" ",trim(fgets(STDIN)));
//$a[] = explode(" ",$numbers);
$result = checkPositivityNegativity($numbers);
echo $result;
?>