<!-- Bracket Matching
Problem Statement

Write a program to verify that all the brackets in a given string are correctly matched and nested.
Input

The program will take a string SS as input.
Output

The output will either print "Brackets are balanced." if the brackets are matched or print "Brackets are not balanced."
Constraints

    0 ≤ |S| ≤ 100000

Example:

Enter string
Input:

[{{()}}]

Output:

Brackets are balanced. -->

<?php
    
function areBracketsBalanced($s) {
    $stack = [];
    $brackets = [')' => '(', '}' => '{', ']' => '['];

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        if (array_key_exists($char, $brackets)) {
            if (empty($stack) || array_pop($stack) != $brackets[$char]) {
                return "Brackets are not balanced.";
            }
        } elseif (in_array($char, $brackets)) {
            array_push($stack, $char);
        }
    }

    return empty($stack) ? "Brackets are balanced." : "Brackets are not balanced.";
}

$inputString = trim(fgets(STDIN));

$result = areBracketsBalanced($inputString);

echo $result . PHP_EOL;

?>