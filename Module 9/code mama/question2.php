<!-- Lexicographically First
Problem Statement

Write a program to create a function that returns the lexicographically first rearrangements of a lowercase string.
Input

The program will take a string SS as input.
Output

The output will print a string.
Constraints

    0 ≤ |S| ≤ 100000

Example:

Enter string
Input:

hello

Output:

ehllo -->



<?php
    function lexicographicallyFirst($str) {
        $arr = str_split($str); 
        sort($arr); 
        $ret = implode('', $arr);
        return $ret;
    }

fscanf(STDIN, "%s", $a);
$output = lexicographicallyFirst($a);

echo $output;
?>