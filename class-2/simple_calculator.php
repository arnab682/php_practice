<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
</head>
<body>
    <h2>Simple Calculator</h2><hr>
    <form method="post">
        <label for="num1">Enter the first number:</label>
        <input type="number" name="num1" id="num1" required>
        <label for="num2">Enter the second number:</label>
        <input type="number" name="num2" id="num2" required><br><br>
        <label for="operation">Select an operation:</label>
        <select name="operation" id="operation">
            <option value="add"> + </option>
            <option value="subtract"> - </option>
            <option value="multiply"> * </option>
            <option value="divide"> / </option>
        </select>
        
        <input type="submit" name="calculate" value="Calculate">
    </form>

<?php
    if(isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = 0;
        switch($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    echo "Division by zero is not allowed.";
                    exit;
                }
                break;
            default:
                echo 'Unknown';

        }

        echo "<p>Result: $result</p>";
    }
?>
</body>
</html>