<?php
    $month = date('F');
    $nextMonth = date('F', strtotime("next month"));
    $year = date('Y');
    $nextYear = date('Y', strtotime("next year"));
    if ($nextMonth == 12) {
        $combined = $nextMonth.$nextYear;
    } else {
        $combined = $nextMonth.$year;
    }
    $final = $combined.".php";
    include($final);
?>