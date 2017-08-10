<?php
    require "../Login-account/auth.php";
    $username = $_SESSION["username"];
    $userid = $_SESSION["userid"];
?>

<!DOCTYPE html5>

<html>
<head>
    <title>Add Runs</title>
    <link rel=stylesheet type=text/css href="../../CSS/add.css" />
</head>

<body style="background-image: url(../../images/handmadepaper.png); background-repeat: repeat;
    background-position: top center;">
        <a href="../Viewers/CalendarViewer.php"><img id=logo src="../../images/ablogo2.png"/></a>
        
    <ul>
        <li><a href="../Viewers/CalendarViewer.php">Home</a></li>
        <li><a href="add.php">Add A Run</a></li>
        <li><a href=../Login-account/logout.php>Logout</a></li>
    </ul>

    
    <?php
        function default_month($month) {
            if ($month == date("n")) {
                echo "selected";
            }    
        }   
    
        function default_day($day) {
            if ($day == date("j")) {
                echo "selected";
            }    
        }
    
        function default_year($year) {
            if ($year == date("Y")) {
                echo "selected";
            }    
        }
    
        function date_ending($day) {
            if ($day % 10 == 1) {
                echo "st ";
            } else if ($day % 10 == 2) {
                echo "nd ";
            } else if ($day % 10 == 3) {
                echo "rd ";
            } else {
                echo "th ";
            }
        }
    ?>
    
    <div class=vertical_line>
        
    </div>
    
    <form method=post action="">
    
    <br><br>
    <p class=questions>Title</p>    
    <input type=text name=title value="<?php
        date_default_timezone_set('America/Detroit');
        $month = $_SESSION["month"];
        $day = date('j');
        $userid = $_SESSION["userid"];
        echo date("F");
        echo " ";
        echo date("j");
        date_ending(date("j"));
        echo date("Y");
                                       
        $db = mysqli_connect("localhost", "root", "", "running_log");
        $sql = sprintf("SELECT * FROM runs WHERE Userid='%f' AND Month='%f' AND Day='%f'",
                      $userid,
                      $month,
                      $day);
        $result = mysqli_query($db, $sql);
        $number_of_rows = mysqli_num_rows($result);
        if ($result) {
            echo " Run #" . ($number_of_rows + 1);
        } else {
            echo " Run #1";
        }
    ?>">
    
<!--
    <br><br>
    <p class=questions>Date:</p>
    <input style="width: 75px" type=text name=date value="<?php
        echo date('m') . "/";
        echo date('d') . "/";
        echo date('Y');
    ?>">
-->

    <br><br>    
    <p class=questions>Month &nbsp&nbsp&nbspDay &nbsp&nbsp&nbsp&nbsp&nbspYear</p>
    <select name=month>
        <option value="" hidden>Mo</option>
        <option value="1" <?php
            default_month(1);     
        ?>>1</option>
        <option value="2" <?php
            default_month(2);     
        ?>>2</option>
        <option value="3" <?php
            default_month(3);     
        ?>>3</option>
        <option value="4" <?php
            default_month(4);     
        ?>>4</option>
        <option value="5" <?php
            default_month(5);     
        ?>>5</option>
        <option value="6" <?php
            default_month(6);     
        ?>>6</option>
        <option value="7" <?php
            default_month(7);     
        ?>>7</option>
        <option value="8" <?php
            default_month(8);     
        ?>>8</option>
        <option value="9" <?php
            default_month(9);     
        ?>>9</option>
        <option value="10" <?php
            default_month(10);     
        ?>>10</option>
        <option value="11" <?php
            default_month(11);     
        ?>>11</option>
        <option value="12" <?php
            default_month(12);     
        ?>>12</option>

    </select>
    <select name=day>
        <option value="" hidden>Day</option>
        <option value="1" <?php 
            default_day(1);    
    ?>>1</option>
        <option value="2" <?php 
            default_day(2);    
    ?>>2</option>
        <option value="3" <?php 
            default_day(3);    
    ?>>3</option>
        <option value="4" <?php 
            default_day(4);    
    ?>>4</option>
        <option value="5" <?php 
            default_day(5);    
    ?>>5</option>
        <option value="6" <?php 
            default_day(6);    
    ?>>6</option>
        <option value="7" <?php 
            default_day(7);    
    ?>>7</option>
        <option value="8" <?php 
            default_day(8);    
    ?>>8</option>
        <option value="9" <?php 
            default_day(9);    
    ?>>9</option>
        <option value="10" <?php 
            default_day(10);    
    ?>>10</option>
        <option value="11" <?php 
            default_day(11);    
    ?>>11</option>
        <option value="12" <?php 
            default_day(12);    
    ?>>12</option>
        <option value="13" <?php 
            default_day(13);    
    ?>>13</option>
        <option value="14" <?php 
            default_day(14);    
    ?>>14</option>
        <option value="15" <?php 
            default_day(15);    
    ?>>15</option>
        <option value="16" <?php 
            default_day(16);    
    ?>>16</option>
        <option value="17" <?php 
            default_day(17);    
    ?>>17</option>
        <option value="18" <?php 
            default_day(18);    
    ?>>18</option>
        <option value="19" <?php 
            default_day(19);    
    ?>>19</option>
        <option value="20" <?php 
            default_day(20);    
    ?>>20</option>
        <option value="21" <?php 
            default_day(21);    
    ?>>21</option>
        <option value="22" <?php 
            default_day(22);    
    ?>>22</option>
        <option value="23" <?php 
            default_day(23);    
    ?>>23</option>
        <option value="24" <?php 
            default_day(24);    
    ?>>24</option>
        <option value="25" <?php 
            default_day(25);    
    ?>>25</option>
        <option value="26" <?php 
            default_day(26);    
    ?>>26</option>
        <option value="27" <?php 
            default_day(27);    
    ?>>27</option>
        <option value="28" <?php 
            default_day(28);    
    ?>>28</option>
        <option value="29" <?php 
            default_day(29);    
    ?>>29</option>
        <option value="30" <?php 
            default_day(30);    
    ?>>30</option>
        <option value="31" <?php 
            default_day(31);    
    ?>>31</option>

    </select>
    <select name=year>
        <option value="" hidden>Year</option>
        <option value="2017" <?php
                default_year(2017);
        ?>>2017</option>
        <option value="2018" <?php
                default_year(2018);
        ?>>2018</option>
        <option value="2019" <?php
                default_year(2019);
        ?>>2019</option>
        <option value="2020" <?php
                default_year(2020);
        ?>>2020</option>

    </select>

        
    <br><br>
    <p class=questions>How many miles did you run?</p>
        <input type=number step=0.01 name=distance value="">
    
    <br><br>
    <p class=questions>How long did it take you?</p>
    <select name=hours>
        <option value="0">Hours</option>
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
    </select>
    <select name=minutes>
        <option value="0">Minutes</option>
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="45">45</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
        <option value="50">50</option>
        <option value="51">51</option>
        <option value="52">52</option>
        <option value="53">53</option>
        <option value="54">54</option>
        <option value="55">55</option>
        <option value="56">56</option>
        <option value="57">57</option>
        <option value="58">58</option>
        <option value="59">59</option>
    </select>
        <select name=seconds>
        <option value="0">Seconds</option>
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="45">45</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
        <option value="50">50</option>
        <option value="51">51</option>
        <option value="52">52</option>
        <option value="53">53</option>
        <option value="54">54</option>
        <option value="55">55</option>
        <option value="56">56</option>
        <option value="57">57</option>
        <option value="58">58</option>
        <option value="59">59</option>
    </select>        
        
    <br><br>
    <p class=questions>What shoes did you wear?</p>
    <select name=shoes>
        <option value="">Choose</option>
        <option value="my_shoes">My Shoes</option>
        <option value="your_shoes">Your Shoes</option>
    </select>
    
    <br>
    <input type=submit value="Submit Your Run!" name=submit>
    </form>
    
<?php
    $ok = false;
    $title = "";
    $month = "";
    $day = "";
    $year = "";
    $date = "";
    $distance = "";
    $hours = "";
    $minutes = "";
    $seconds = "";
    $time = "";
    $shoes = "";
  if (isset($_POST["submit"])) {
      $ok = true;
      
      if (!isset($_POST["title"]) && $_POST["title"] === "") {
          $ok = false;
      } else {
          $title = $_POST["title"];
      }
      
      if (!isset($_POST["month"]) && $_POST["month"] === "") {
          $ok = false;
      } else {
          $month = $_POST["month"];
      }
      
      if (!isset($_POST["day"]) && $_POST["day"] === "") {
          $ok = false;
      } else {
          $day = $_POST["day"];
      }
      
      if (!isset($_POST["year"]) && $_POST["year"] === "") {
          $ok = false;
      } else {
          $year = $_POST["year"];
      }
      
      if ($month != "" && $day != "" && $year != "") {
          $date = $month . "/" . $day . "/" . $year;
      }
      
      if (!isset($_POST["distance"]) && $_POST["distance"] === "") {
          $ok = false;
      } else {
          $distance = $_POST["distance"];
      }
      
      if (!isset($_POST["hours"]) && $_POST["hours"] === "") {
          $ok = false;
      } else {
          $hours = $_POST["hours"];
      }
      
      if (!isset($_POST["minutes"]) && $_POST["minutes"] === "") {
          $ok = false;
      } else {
          $minutes = $_POST["minutes"];
      }
      
      if (!isset($_POST["seconds"]) && $_POST["seconds"] === "") {
          $ok = false;
      } else {
          $seconds = $_POST["seconds"];
      }
      
      if ($hours != "" && $minutes != "" & $seconds != "") {
          if ($minutes < 10) {
              $minutes = "0" . $minutes;
          }
          if ($seconds < 10) {
              $seconds = "0" . $seconds;
          }
          if ($hours <= 0) {
              $time = $minutes . ":" . $seconds;
          } else {
              $time = $hours . ":" . $minutes . ":" . $seconds;
          }
          
      }
      
      if (!isset($_POST["shoes"]) && $_POST["shoes"] === "") {
          $ok = false;
      } else {
          $shoes = $_POST["shoes"];
      }
      
      if ($ok) {
          $db = mysqli_connect("localhost", "root", "", "running_log");
          $sql = sprintf("INSERT INTO runs (title, month, day, year, Date, Distance, hours, minutes, seconds, Time, shoes, userid, username)
          VALUES ('%s', '%d', '%d', '%d', '%s', '%f', '%d', '%d', '%d', '%s', '%s', '%d', '%s')",
                        mysqli_real_escape_string($db, $title),
                        $month,
                        $day,
                        $year,
                        mysqli_real_escape_string($db, $date),
                        $distance,
                        $hours,
                        $minutes,
                        $seconds,
                        mysqli_real_escape_string($db, $time),
                        mysqli_real_escape_string($db, $shoes),
                        $userid,
                        mysqli_real_escape_string($db, $username));
          mysqli_query($db, $sql);
          mysqli_close($db);
          echo "Your Run had been Added!";
      }
  }  
?>
</body>    
    
</html>