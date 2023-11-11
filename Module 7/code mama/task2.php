<?php
    # Write your PHP code from here
    fscanf(STDIN,"%s %s", $first, $second);

    //  print $first."\n";
    //  print $second."\n";
    
    $matched = false;
    for($i = 0; $i < strlen($first); $i++){
        if ( strcmp($first, $second) == 0){
            $matched = true;
        }    
     $sub1 = substr($first, 0, 1);
     $sub2 = substr($first, 1);
     $first = $sub2.$sub1;
    

}

    if ($matched)   print "True";
    else print "False";

?>