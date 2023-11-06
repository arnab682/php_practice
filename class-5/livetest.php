Task 1:
<?php

 

$file = './data.txt';

 

// Open the file
$fp = fopen($file,'r');


// Read the content of the file
while($line = fgets($fp)) {
    echo "<pre>";
    echo $line;
    echo "</pre>";
}


// Close the file
fclose($fp);


// Display the content
echo "\n";
//$data = file_get_contents(".".DIRECTORY_SEPARATOR."data.txt");
$data = file_get_contents($file);
echo nl2br($data);


?>

Task 2: 
<?php

 

$file = './data.txt';

$data = 'Anik';

 

// Open the file in append mode
$fp = fopen($file,'a');


// Write the data to the file
fwrite($fp, $data."\n");
echo "Data appended successfully.";

// Close the file
fclose($fp);


?>