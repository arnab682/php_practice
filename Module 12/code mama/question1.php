<!-- Find Number From String
Problem Statement

Write a program to find a number from a string. An input string will contain english letters along with a number.There will be only one number in the string.You will have to find that number and print it.
Input

The program will take a string SS
Output

The output will print a number.
Constraints

    0 ≤ |N| ≤ 10000

Example:

Enter string
Input:

ab1cd

Output:

1 -->

<?php

    function findNumberFromString($str) {
        preg_match_all('!\d+!', $str, $matches);
        return $matches[0][0];
    }

fscanf(STDIN, "%s", $n);
$result = findNumberFromString($n);

echo $result;