<!-- Sorting String By Length
Problem Statement

Write a program to create a function that returns an array of strings sorted by length in ascending order.
Input

The program will take an integer NN as the length of an array. Then it will take the string values of the array M[]M[].
Output

The output will print the strings in sorted order.
Constraints

    0 ≤ |N| ≤ 100000
    0 ≤ |M[]| ≤ 10000

Example:

Enter numbers
Input:

6
abcde abc abcd abcdef ab a

Output:

a ab abc abcd abcde abcdef
 -->


<?php

  function sortByLength($arr) {
    $length = count($arr);
    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if (strlen($arr[$j]) > strlen($arr[$j + 1])) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
  }

    //$a = 'abcde abc abcd abcdef ab a';
    fscanf(STDIN, "%d\n", $n);
    $a = fgets(STDIN);
    //$a = explode(" ", fgets(STDIN)); //
    //$a = "apple bag orange book class";
    $numbers = explode(" ", $a);

    $result = sortByLength($numbers);

    print_r(implode(" ", $result));


?>