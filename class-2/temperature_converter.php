<!DOCTYPE html>
<html>
<head>
    <title>Temperature Converter</title>
</head>
<body>
    <h2>Temperature Converter</h2>
    <hr>
    <form method="post">
        <label for="temperature">Enter Temperature:</label>
        <input type="text" name="temperature" required>
        <br/>
        <label for="conversion">Select Conversion:</label>
        <select name="conversion">
            <option value="c_to_f">Celsius to Fahrenheit</option>
            <option value="f_to_c">Fahrenheit to Celsius</option>
        </select>
        <br/>
        <input type="submit" name="convert" value="Convert">
    </form>
    <hr>
    <h3>Output:</h3>
    <?php
        if(isset($_POST['convert'])) {
            $temperature = $_POST['temperature'];
            $conversion = $_POST['conversion'];

            if ($conversion == 'c_to_f') {
                $converted_temperature = ($temperature * 9/5) + 32;
                echo "<b>$temperature</b> Celsius is <b>$converted_temperature</b> Fahrenheit";
            } elseif ($conversion == 'f_to_c') {
                $converted_temperature = ($temperature - 32) * 5/9;
                echo "<b>$temperature</b> Fahrenheit is <b>$converted_temperature</b> Celsius";
            }
        }
    ?>
</body>
</html>
