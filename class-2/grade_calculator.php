<?php
    
    $score1 = 66;
    $score2 = 95;
    $score3 = 39;

        // Calculate the average
        $average = ($score1 + $score2 + $score3) / 3;

        $grade = '';
            if ($average >= 90) {
                $grade = 'A';
            } elseif ($average >= 80) {
                $grade = 'B';
            } elseif ($average >= 70) {
                $grade = 'C';
            } elseif ($average >= 60) {
                $grade = 'D';
            } else {
                $grade = 'F';
            }

    echo "Average Score: $average<br/>"; 
    echo "Your grade is-$grade</p>";
    