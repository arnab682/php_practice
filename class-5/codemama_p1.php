<?php

fscanf(STDIN, "%d", $a);
fscanf(STDIN, "%d", $b);
    function sum($a, $b){
        return $a+$b;
    }

if($a == 10 || $b == 10 || sum($a, $b) == 10){

     echo "True";
            
}else{

     echo "False";
        
}