<?php

fscanf(STDIN, "%s %s", $a, $b);
//$a = 'abababab';
//$b = 'ab';
$count = 0;
for($i=0; $i<strlen($a); $i++){
   
    $m = true;
    for($j=0; $j<strlen($b); $j++){
        
        if($a[$i+$j] != $b[$j]){
            $m = false;
        }
        //$a[0+0] != $b[0] a != a 
    }
    if($m) $count++;

    
}

print $count;

?>