<!-- Lexicographically At The End
Problem Statement

Write a program to create a function that returns the lexicographically last rearrangements of a lowercase string.
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

ollhe -->

<?php
   function lexicographicallyLast($str) {
        $arr = str_split($str);
        rsort($arr); 
        $ret = implode('', $arr);
    return $ret;
    }

fscanf(STDIN, "%s\n", $s);


    $output = lexicographicallyLast($s);

echo $output;

?>