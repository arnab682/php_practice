<?php
  
$temperature = 7; 


if ($temperature <= 0) {
    echo "It's freezing.";
} elseif ($temperature > 0 && $temperature <= 15) {
    echo "It's cool.";
} else {
    echo "It's warm.";
}
