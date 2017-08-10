<!DOCTYPE html5>

<html>

	<head>
		<title>Running Log</title>
		<link rel=stylesheet type=text/css href="../../CSS/table.css" />
	</head>

	<body>
		<?php
			require "../Login-account/auth.php";
			$username = $_SESSION["username"];
			$userid = $_SESSION["userid"];
		?>

		<div id=logoContainer>
		<a href="../Viewers/CalendarViewer.php"><img class=logo src="../../images/ablogo2.png"/></a>
		</div>

		<ul class=menu>
			<li><a href=../Viewers/CalendarViewer.php>Home</a></li>
			<li><a href=../Calendar/add.php>Add A Run</a></li>
			<li><a href=../Login-account/logout.php>Logout</a></li>
		</ul>

		<ul class=back>
			<li class=back><a href=LastMonthViewer.php><i class=left></i>Go To July 2017</a></li>
			<li class=move <?php if (date('n') == 8) echo "style=\"display:none;\""; ?>><a href=NextMonthViewer.php>Go To September 2017<i class=right></i></a></li>
		</ul>

		<?php
			function checkDatabase($year,$month,$day) {
				$userid = $_SESSION["userid"];
				$db = mysqli_connect("localhost", "root", "", "running_log");
				$sql = sprintf("SELECT * FROM runs WHERE Userid='%d' AND Year='%d' AND Month='%d' AND Day='%d'",
                               $userid,
                               $year,
                               $month,
                               $day);
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_assoc($result);
				if ($row) {
					if (date('j') == $day) {
						echo "style=\"cursor:pointer\" onclick=\"location.href='RunViewer.php/?year=".$year."&month=".$month."&day=".$day."'\" class=changeCellColorToday";
					} else {
						echo "style=\"cursor:pointer\" onclick=\"location.href='RunViewer.php/?year=".$year."&month=".$month."&day=".$day."'\" class=changeCellColor";
					}

				}
			}

		?>

		<table>
			<caption><?php echo $_SESSION["username"]."'s";?> August 2017 Running Mileage</caption>
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
				
				<td></td>
				<td></td>
				<td></td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,1);
				if (date('j') == 1) {
					echo " class=ab";
				}
			?>>1</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,2);
				if (date('j') == 2) {
					echo " class=ab";
				}
			?>>2</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,3);
				if (date('j') == 3) {
					echo " class=ab";
				}
			?>>3</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,4);
				if (date('j') == 4) {
					echo " class=ab";
				}
			?>>4</td>
			</tr>
			<tr>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,5);
				if (date('j') == 5) {
					echo " class=ab";
				}
			?>>5</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,6);
				if (date('j') == 6) {
					echo " class=ab";
				}
			?>>6</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,7);
				if (date('j') == 7) {
					echo " class=ab";
				}
			?>>7</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,8);
				if (date('j') == 8) {
					echo " class=ab";
				}
			?>>8</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,9);
				if (date('j') == 9) {
					echo " class=ab";
				}
			?>>9</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,10);
				if (date('j') == 10) {
					echo " class=ab";
				}
			?>>10</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,11);
				if (date('j') == 11) {
					echo " class=ab";
				}
			?>>11</td>
			</tr>
			<tr>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,12);
				if (date('j') == 12) {
					echo " class=ab";
				}
			?>>12</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,13);
				if (date('j') == 13) {
					echo " class=ab";
				}
			?>>13</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,14);
				if (date('j') == 14) {
					echo " class=ab";
				}
			?>>14</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,15);
				if (date('j') == 15) {
					echo " class=ab";
				}
			?>>15</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,16);
				if (date('j') == 16) {
					echo " class=ab";
				}
			?>>16</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,17);
				if (date('j') == 17) {
					echo " class=ab";
				}
			?>>17</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,18);
				if (date('j') == 18) {
					echo " class=ab";
				}
			?>>18</td>
			</tr>
			<tr>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,19);
				if (date('j') == 19) {
					echo " class=ab";
				}
			?>>19</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,20);
				if (date('j') == 20) {
					echo " class=ab";
				}
			?>>20</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,21);
				if (date('j') == 21) {
					echo " class=ab";
				}
			?>>21</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,22);
				if (date('j') == 22) {
					echo " class=ab";
				}
			?>>22</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,23);
				if (date('j') == 23) {
					echo " class=ab";
				}
			?>>23</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,24);
				if (date('j') == 24) {
					echo " class=ab";
				}
			?>>24</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,25);
				if (date('j') == 25) {
					echo " class=ab";
				}
			?>>25</td>
			</tr>
			<tr>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,26);
				if (date('j') == 26) {
					echo " class=ab";
				}
			?>>26</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,27);
				if (date('j') == 27) {
					echo " class=ab";
				}
			?>>27</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,28);
				if (date('j') == 28) {
					echo " class=ab";
				}
			?>>28</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,29);
				if (date('j') == 29) {
					echo " class=ab";
				}
			?>>29</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,30);
				if (date('j') == 30) {
					echo " class=ab";
				}
			?>>30</td>
				<td <?php
				date_default_timezone_set('America/Detroit');
				checkDatabase(2017,8,31);
				if (date('j') == 31) {
					echo " class=ab";
				}
			?>>31</td>
		</table>

	</body>

</html>