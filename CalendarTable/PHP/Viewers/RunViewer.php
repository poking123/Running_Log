<?php
    require "../Login-account/auth.php";
//    $username = $_SESSION["username"];
//    $userid = $_SESSION["userid"];
?>

<!DOCTYPE html5>

<html>
<head>
    <title>Add Runs</title>
    <link rel=stylesheet type=text/css href="../../../CSS/add.css" />
</head>

<body style="background-image: url(../../../images/handmadepaper.png); background-repeat: repeat;
    background-position: top center;">
        <a href="CalendarViewer.php"><img id=logo src="../../../images/ablogo2.png"/></a>
        
    <ul>
        <li><a href="../CalendarViewer.php">Home</a></li>
        <li><a href="../../Calendar/add.php">Add A Run</a></li>
        <li><a href=../Login-account/logout.php>Logout</a></li>
    </ul>
    
    <?php
        
        function getFromDatabase($col) {
            $userid = $_SESSION["userid"];
            $year = urldecode($_GET["year"]);
            $month = urldecode($_GET["month"]);
            $day = urldecode($_GET["day"]);
            $db = mysqli_connect("localhost", "root", "", "running_log");
            $sql = sprintf("SELECT ".$col." FROM runs WHERE userid='%d' AND year='%d' AND month='%d' AND day='%d'",
                          $userid,
                          $year,
                          $month,
                          $day);
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row[$col]; 
        }
    ?>
    
    <div class=vertical_line>
        
    </div>
    
    <form method=post action="">
    
    <br><br>
    <p class=questions>Title:</p>    
    <input style="width: 175px; text-align:center;" type=text name=title value="<?php 
        echo getFromDatabase("Title");               
    ?>">
        
    <br><br>    
    <p class=questions>Date: </p>
    <input style="width: 72px; text-align:center;" type=text value="<?php 
        echo getFromDatabase("Month"); 
        echo "/";
        echo getFromDatabase("Day");
        echo "/";
        echo getFromDatabase("Year");
    ?>">
        
    <br><br>
    <p class=questions>Miles:</p>
    <input style="width: 60px; text-align:center;" type=text name=distance value="<?php 
        echo getFromDatabase("Distance") . " mi";               
    ?>">
    
    <br><br>
    <p class=questions>Time:</p>
    <input style="width: 60px; text-align:center;" type=text value="<?php
        $hours = getFromDatabase("Hours");
        $minutes = getFromDatabase("Minutes");
        $seconds = getFromDatabase("Seconds");                                                            
        if ($hours> 0) {
            echo $hours . ":";
        }
        if ($minutes < 10) {
            echo "0" . getFromDatabase("Minutes") . ":";
        } else {
            echo getFromDatabase("Minutes") . ":";
        }                                                            
        if ($seconds < 10) {
            echo "0" . getFromDatabase("Seconds");
        } else {
            echo getFromDatabase("Seconds");
        } 
        
    ?>">     
        
    <br><br>
    <p class=questions>Pace:</p>
    <input style="width: 70px; text-align:center;" type=text value="<?php
        $distance = getFromDatabase("Distance");                                                            
        $totalSeconds = getFromDatabase("Hours")*3600 + getFromDatabase("Minutes")*60 + getFromDatabase("Seconds");
        $secondsPerMile = $totalSeconds / $distance;                                                            
        $minutesPace = ($secondsPerMile)/60;
        $fakeMinutesPace = ($secondsPerMile - ($secondsPerMile % 60))/60;
        $secondsPace = (($secondsPerMile / 60) - $fakeMinutesPace) * 60;
        echo intval($minutesPace) . ":";                                                                                                                     
        if ($secondsPace < 10) {
            echo "0" . round($secondsPace);
        } else {
//            echo number_format($secondsPace, 2, ".", "");
            echo round($secondsPace);
        }                                                            
        echo "/mi";
    ?>"> 
        
    <br><br>
    <p class=questions>Shoes:</p>
    <input style="width: 120px; text-align:center;" type=text name=shoes value="<?php 
        echo getFromDatabase("Shoes");               
    ?>">
        
    
    <input style = "margin-top: 23px;" type=submit name=submit value="Update!">

    </form>
    
</body>    
    
</html>