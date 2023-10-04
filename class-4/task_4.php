<?php

$studentGrades = array(
    'student1' => array('Math' => 90, 'English' => 85, 'Science' => 88),
    'student2' => array('Math' => 78, 'English' => 92, 'Science' => 89),
    'student3' => array('Math' => 95, 'English' => 88, 'Science' => 91)
);
function calculateAverageGrades($grades) {
    foreach ($grades as $student => $subjectGrades) {
        $total = array_sum($subjectGrades);
        $count = count($subjectGrades);
        $average = $total / $count;

        echo "Average grade for $student: $average\n";
    }
}

calculateAverageGrades($studentGrades);

