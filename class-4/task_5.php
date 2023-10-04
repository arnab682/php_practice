<?php

function generatePassword($length){
    $chars = "abcdABCDEfsfwroigjsdfg094383!@#$%^&*()_+";
    $password = "";

    for($n=0; $n<$length; $n++){
        $randomIndex = rand(0, strlen($chars) -1);
        $password .= $chars[$randomIndex];
    }

    return $password;
}
$lenght = 12;
$pass = generatePassword($lenght);

echo "Genarated Password is {$pass}";