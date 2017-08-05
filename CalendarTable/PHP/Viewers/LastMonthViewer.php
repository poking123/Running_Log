<?php
    $month = date('F');
    $lastMonth = date('F', strtotime("previous month"));
    $year = date('Y');
    $lastYear = date('Y', strtotime("previous year"));
    if ($lastMonth == 12) {
        $combined = $lastMonth.$lastYear;
    } else {
        $combined = $lastMonth.$year;
    }
    $final = $combined.".php";
    include("../Calendar/" . $final);
?>