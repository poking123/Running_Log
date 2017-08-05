

<?php

$newRow = 1;
$lastMonth = date('F', strtotime("previous month"));
$lastYear = date('Y', strtotime("previous month"));
$nextMonth = date('F', strtotime("next month"));
$nextYear = date('Y', strtotime("next month"));
$dayCounter = 1;
$dayNumber = date('N');
$totalDays = date('t');
$day = date('j');
$month = date('F');
$year = date('Y');
$combined = $month.$year;
$final = $combined.".php";
$file = fopen($final, "w");
fwrite($file, "<!DOCTYPE html5>");
fwrite($file, "\n\n<html>");
fwrite($file, "\n\n\t<head>");
fwrite($file, "\n\t\t<title>Running Log</title>");
fwrite($file, "\n\t\t<link rel=stylesheet type=text/css href=\"../../table.css\" />");
fwrite($file, "\n\t</head>");
fwrite($file, "\n\n\t<body>");
fwrite($file, "\n\t\t<?php");
fwrite($file, "\n\t\t\trequire \"../Login-account/auth.php\";");
fwrite($file, "\n\t\t\t\$username = \$_SESSION[\"username\"];");
fwrite($file, "\n\t\t\t\$userid = \$_SESSION[\"userid\"];");
fwrite($file, "\n\t\t?>");
fwrite($file, "\n\t\t<a href=\"".$final."\"><img id=logo src=\"../../images/ablogo2.png\"/></a>");
fwrite($file, "\n\n\t\t<ul class=menu>");
fwrite($file, "\n\t\t\t<li><a href=".$final.">Home</a></li>");
fwrite($file, "\n\t\t\t<li><a href=add.php>Add A Run</a></li>");
fwrite($file, "\n\t\t\t<li><a href=logout.php>Logout</a></li>");
fwrite($file, "\n\t\t</ul>");
fwrite($file, "\n\n\t\t<ul class=back>");
if ($month == 1) {
    fwrite($file, "\n\t\t\t<li class=back><a href=LastMonthViewer.php><i class=left></i>Go To ".$lastMonth." ".$lastYear."</a></li>");
} else {
    fwrite($file, "\n\t\t\t<li class=back><a href=LastMonthViewer.php><i class=left></i>Go To ".$lastMonth." ".$year."</a></li>");
}
if ($month == 12) {
    fwrite($file, "\n\t\t\t<li class=move <?php if (date('n') == ".date('n').") echo \"style=\\\"display:none;\\\"\"; ?>><a href=NextMonthViewer.php>Go To ".$nextMonth. " ".$nextYear."<i class=right></i></a></li>");
} else {
    fwrite($file, "\n\t\t\t<li class=move <?php if (date('n') == ".date('n').") echo \"style=\\\"display:none;\\\"\"; ?>><a href=NextMonthViewer.php>Go To ".$nextMonth. " ".$year."<i class=right></i></a></li>");
}

fwrite($file, "\n\t\t</ul>");
fwrite($file, "\n\n\t\t<?php");
fwrite($file, "\n\t\t\tfunction checkDatabase(\$day) {");
fwrite($file, "\n\t\t\t\t\$userid = \$_SESSION[\"userid\"];");
fwrite($file, "\n\t\t\t\t\$month = \$_SESSION[\"month\"];");
fwrite($file, "\n\t\t\t\t\$db = mysqli_connect(\"localhost\", \"root\", \"\", \"running_log\");");
fwrite($file, "\n\t\t\t\t\$sql = sprintf(\"SELECT * FROM runs WHERE Userid='%f' AND Month='%f' AND Day='%f'\",                     
                               \$userid,
                               \$day,
                               \$month);");
fwrite($file, "\n\t\t\t\t\$result = mysqli_query(\$db, \$sql);");
fwrite($file, "\n\t\t\t\t\$row = mysqli_fetch_assoc(\$result);");
fwrite($file, "\n\t\t\t\tif (\$row) {");
fwrite($file, "\n\n\t\t\t\t\techo \"style=\\\"cursor:pointer\\\" onclick=\\\"location.href='RunViewer.php'\\\" class=changeCellColor\";");
fwrite($file, "\n\n\t\t\t\t}");
fwrite($file, "\n\n\t\t\t}");
fwrite($file, "\n\n\t\t?>");
fwrite($file, "\n\n\t\t<table>");
fwrite($file, "\n\t\t\t<caption><?php echo \$_SESSION[\"username\"].\"'s\";?> ".$month." ".$year." Running Mileage</caption>");
fwrite($file, "\n\t\t\t<tr>");
fwrite($file, "\n\t\t\t\t<th>Monday</th>");
fwrite($file, "\n\t\t\t\t<th>Tuesday</th>");
fwrite($file, "\n\t\t\t\t<th>Wednesday</th>");
fwrite($file, "\n\t\t\t\t<th>Thursday</th>");
fwrite($file, "\n\t\t\t\t<th>Friday</th>");
fwrite($file, "\n\t\t\t\t<th>Saturday</th>");
fwrite($file, "\n\t\t\t\t<th>Sunday</th>");
fwrite($file, "\n\t\t\t</tr>");
fwrite($file, "\n\t\t\t<tr>");
fwrite($file, "\n\t\t\t\t");
for ($i = 1; $i <= 7; $i++) {
    if ($i >= $dayNumber) {
        fwrite($file, "\n\t\t\t\t<td <?php\n\t\t\t\tif (date('j') == ".$dayCounter.") {
        \t\t\t\techo \"class=ab\";\n\t\t\t\t}\n\t\t\t\tcheckDatabase(".$dayCounter.")\n\t\t\t?>>".$dayCounter."</td>");
        $dayCounter++;
    } else {
        fwrite($file, "\n\t\t\t\t<td></td>");
    }
}
fwrite($file, "\n\t\t\t</tr>");
while ($dayCounter <= $totalDays) {
    if ($newRow % 7 == 1) {
        fwrite($file, "\n\t\t\t<tr>");
    }
    fwrite($file, "\n\t\t\t\t<td <?php\n\t\t\t\tif (date('j') == ".$dayCounter.") {
        \t\t\t\techo \"class=ab\";\n\t\t\t\t}\n\t\t\t\tcheckDatabase(".$dayCounter.")\n\t\t\t?>>".$dayCounter."</td>");
    $dayCounter++;
    $newRow++;
    if ($newRow % 7 == 1) {
        fwrite($file, "\n\t\t\t</tr>");
    }
}
//fwrite($file, "<td></td>");
fwrite($file, "\n\t\t</table>");
fwrite($file, "\n\n\t</body>");
fwrite($file, "\n\n</html>");
fwrite($file, "");
fwrite($file, "");
fwrite($file, "");
fwrite($file, "");
fwrite($file, "");

?>