<?php
    $month = date('F');
    $year = date('Y');
    $combined = $month.$year;
    $final = $combined.".php";
    include("../Calendar/".$final);
?>