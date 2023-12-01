
<!-- Postfix Expression Evaluation
Problem Statement

Write a program to evaluate Postfix expression.A postfix expression is an expression where the operator appears after the operands.
Input

The program will take a string SS as input.
Output

The output will print the result after evaluation which will be an integer.
Constraints

    0 ≤ |S| ≤ 100000

Example:

Enter string
Input:

56*

Output:

30 -->




<?php
  
   function evaluatePostfix($expression) {
    $stack = [];
    
    for ($i = 0; $i < strlen($expression); $i++) {

        if (is_numeric($expression[$i])) {
            array_push($stack, intval($expression[$i]));

        } else {
            
            $operand2 = array_pop($stack);
            $operand1 = array_pop($stack);
            

            switch ($expression[$i]) {

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
                
            }
        }
    }
    
    return array_pop($stack);
}

fscanf(STDIN, '%s', $input);
$result = (int)evaluatePostfix($input);
echo $result;
    
?>