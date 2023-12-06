<!-- Prefix Expression Evaluation
Problem Statement

Write a program to evaluate Prefix expression.A prefix expression is an expression where the operator appears before the operands.
Input

The program will take a string SS as input.
Output

The output will print the result after evaluation which will be an integer.
Constraints

    0 ≤ |S| ≤ 100000

Example:

Enter string
Input:

*56

Output:

30 -->


<?php
    function evaluatePrefixExpression($expression) {
    $stack = [];

    // Iterate through the expression from right to left
    for ($i = strlen($expression) - 1; $i >= 0; $i--) {
        $char = $expression[$i];

        if (is_numeric($char)) {
            array_push($stack, (int)$char);
        } else {
            $operand1 = array_pop($stack);
            $operand2 = array_pop($stack);

            switch ($char) {
                case '+':
                    array_push($stack, $operand1 + $operand2);
                    break;
                case '-':
                    array_push($stack, $operand1 - $operand2);
                    break;
                case '*':
                    array_push($stack, $operand1 * $operand2);
                    break;
                case '/':
                    array_push($stack, $operand1 / $operand2);
                    break;

                default:
                  
                    return "Error: Invalid character '$char' in the expression.";
            }
        }
    }
    return intval($stack[0]); 
}

$inputString = trim(fgets(STDIN));

$result = evaluatePrefixExpression($inputString);

echo $result . PHP_EOL;

?>