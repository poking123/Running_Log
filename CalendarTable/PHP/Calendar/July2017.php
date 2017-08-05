<!DOCTYPE html5>

<html>

	<head>
		<title>Running Log</title>
		<link rel=stylesheet type=text/css href="../../table.css" />
	</head>

	<body>
        <?php
            require "../Login-account/auth.php";
            $username = $_SESSION["username"];
            $userid = $_SESSION["userid"];
        ?>
        
		<a href="../Viewers/CalendarViewer.php"><img id=logo src="../../images/ablogo2.png"/></a>

		

		<ul class=menu>
			<li><a href=July2017.php>Home</a></li>
			<li><a href=add.php>Add A Run</a></li>
            <li><a href=logout.php>Logout</a></li>
		</ul>
        
        
        <ul class=back>
			<li class=back><a href=june17.html><i class=left></i>Go To June 2017</a></li>
		</ul>

        <?php
            function checkDatabase($day) {
                $userid = $_SESSION["userid"];
                $db = mysqli_connect("localhost", "root", "", "running_log");
                $sql = sprintf("SELECT * FROM runs WHERE userid='%f' AND day='%f'",                     
                               $userid,
                               $day);
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($result);
                if ($row) {
//                    $_SESSION["day"] = $row["Day"];
                    printf("style=\"cursor:pointer\" onclick=goToRunViewer('%d') class=changeCellColor", $day);
                }
            }
        ?>
        
        <script>
            function goToRunViewer($day) {
                <?php $_SESSION["day"] = $day; ?>
                window.location='RunViewer.php';
            }
        </script>
		<table>
			<caption><?php echo $_SESSION["username"]."'s";?> July 2017 Running Mileage</caption>
			<tr>
				<th>Monday</th>
				<th>Tuesday</th>
				<th>Wednesday</th>
				<th>Thursday</th>
				<th>Friday</th>
				<th>Saturday</th>
				<th>Sunday</th>
			</tr>
			<tr>
				
				<td class=cell<?php
				if (date('j') == 1) {
        				echo "class=ab";
				}
                checkDatabase(1);
			?>>1</td>
				<td class=cell<?php
				if (date('j') == 2) {
        				echo "class=ab";
				}
                checkDatabase(2);
			?>>2</td>
				<td class=cell<?php
				if (date('j') == 3) {
        				echo "class=ab";
				}
                checkDatabase(3);
			?>>3</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td <?php
				if (date('j') == 4) {
        				echo "class=ab";
				}
                checkDatabase(4);
			?>>4</td>
				<td <?php
				if (date('j') == 5) {
        				echo "class=ab";
				}
                checkDatabase(5);
			?>>5</td>
				<td <?php
				if (date('j') == 6) {
        				echo "class=ab";
				}
                checkDatabase(6);
			?>>6</td>
				<td <?php
				if (date('j') == 7) {
        				echo "class=ab";
				}
                checkDatabase(7);
			?>>7</td>
				<td <?php
				if (date('j') == 8) {
        				echo "class=ab";
				}
                checkDatabase(8);
			?>>8</td>
				<td <?php
				if (date('j') == 9) {
        				echo "class=ab";
				}
                checkDatabase(9);
			?>>9</td>
				<td <?php
				if (date('j') == 10) {
        				echo "class=ab";
				}
                checkDatabase(10);
			?>>10</td>
			</tr>
			<tr>
				<td <?php
				if (date('j') == 11) {
        				echo "class=ab";
				}
                checkDatabase(11);
			?>>11</td>
				<td <?php
				if (date('j') == 12) {
        				echo "class=ab";
				}
                checkDatabase(12);
			?>>12</td>
				<td <?php
				if (date('j') == 13) {
        				echo "class=ab";
				}
                checkDatabase(13);
			?>>13</td>
				<td <?php
				if (date('j') == 14) {
        				echo "class=ab";
				}
			?>>14</td>
				<td <?php
				if (date('j') == 15) {
        				echo "class=ab";
				}
                checkDatabase(15);
			?>>15</td>
				<td <?php
				if (date('j') == 16) {
        				echo "class=ab";
				}
                checkDatabase(16);
            ?>>16</td>
				<td <?php
				if (date('j') == 17) {
        				echo " class=ab";
				}
                checkDatabase(17);
			?>>17</td>
			</tr>
			<tr>
				<td <?php
				if (date('j') == 18) {
        				echo "class=ab";
				}
                checkDatabase(18);
			?>>18</td>
				<td <?php
				if (date('j') == 19) {
        				echo "class=ab";
				}
                checkDatabase(19);
			?>>19</td>
				<td <?php
				if (date('j') == 20) {
        				echo "class=ab";
				}
                checkDatabase(20);
			?>>20</td>
				<td <?php
				if (date('j') == 21) {
        				echo "class=ab";
				}
                checkDatabase(21);               

			?>>21</td>
				<td <?php
				if (date('j') == 22) {
        				echo "class=ab";
				}
                checkDatabase(22);
			?>>22</td>
				<td <?php
				if (date('j') == 23) {
        				echo "class=ab";
				}
                checkDatabase(23);
			?>>23</td>
				<td <?php
				if (date('j') == 24) {
        				echo "class=ab";
				}
                checkDatabase(24);
                echo date('j');
			?>>24 </td>
			</tr>
			<tr>
				<td <?php
				if (date('j') == 25) {
        				echo "class=ab";
				}
                checkDatabase(25);
			?>>25</td>
				<td <?php
				if (date('j') == 26) {
        				echo "class=ab";
				}
                checkDatabase(26);
			?>>26</td>
				<td <?php
				if (date('j') == 27) {
        				echo "class=ab";
				}
                checkDatabase(27);
			?>>27</td>
				<td <?php
				if (date('j') == 28) {
        				echo "class=ab";
				}
                checkDatabase(28);
			?>>28</td>
				<td <?php
				if (date('j') == 29) {
        				echo "class=ab";
				}
                checkDatabase(29);
			?>>29</td>
				<td <?php
                checkDatabase(30);
				if (date('j') == 30) {
        				echo "class=ab ";
				}
			?>>30</td>
		</table>

	</body>

</html>