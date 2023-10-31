<?php
$input_string = trim(fgets(STDIN));

$result_string = "";

$seen_characters = [];

for ($i = 0; $i < strlen($input_string); $i++) {
    $char = $input_string[$i];
   
    if (!isset($seen_characters[$char])) {
        $result_string .= $char;
        $seen_characters[$char] = true;
    }
}

echo "Output:\n";
echo $result_string . "\n";
