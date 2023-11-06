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