<?php
    session_start();
    $message = "";
    $username = "";
    $usernameError = "";
    $passwordError = "";

    if (isset($_POST["submit"])) {
        if (!isset($_POST["username"]) || $_POST["username"] === "") {
            $usernameError = "* Please enter a username.";
        } 
        if (!isset($_POST["password"]) || $_POST["password"] === "") {
            $passwordError = "* Please enter a password.";
            $username = $_POST["username"];
        }
        
        if (isset($_POST["username"]) && $_POST["username"] != "" && 
            isset($_POST["password"]) && $_POST["password"] != "") {
            $username = ucwords(strtolower($_POST["username"]));
            $db = mysqli_connect("localhost", "root", "", "running_log");
            $sql = sprintf("SELECT * FROM users WHERE username='%s'",
                    mysqli_real_escape_string($db, $_POST["username"]));
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                $hash = $row["password"];
                if (password_verify($_POST["password"], $hash)) {
                    $message = "Logged in. Let's go!";
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["userid"] = $row["userid"];
                    $_SESSION["month"] = date('n');
                    header("Location: ../Viewers/CalendarViewer.php");
                } else {
                    $message = "Wrong password mate.";
                }
            } else {
                $message = "Username not found.";
            }
            mysqli_close($db);
        }
    }
    ?><!DOCTYPE HTML5>

<html>

    <head>
        <title>Running Log</title>
        <link rel=stylesheet type=text/css href="../../CSS/table.css" />
    </head>
    
    
    
    <body>
        
        <?php
            echo "<p>$message</p>";
        ?>
        
        <div id=logoContainer>
        <a href="../Viewers/CalendarViewer.php"><img class=logo src="../../images/ablogo2.png"></a>
        </div>
        
        <ul class=menu>
            <li><a href=../Viewers/CalendarViewer.php>Home</a></li>
            <li><a href=../Calendar/add.php>Add A Run</a></li>
        </ul>
        
        <form method=post action="">
            <br>
            <p class=login>Please Login Here!</p> <br>
            <p class=login>Don't have an account? <a href="CreateAccount.php">Click Here to Make a Free Account</a></p> <br><br>

            <p class=login>Username:</p> <input class=login type=text name=username value="<?php
                echo ucwords(strtolower(htmlspecialchars($username)));
            ?>"> 
            <span style="color:red;"><?php echo $usernameError;?></span>
            <br><br>
            <p class=login>Password:</p> <input style="margin-left: 40%;" type=password name=password>
            <span style="color:red;"><?php echo $passwordError;?></span>  
            <br><br>
            <input class=login type=submit name=submit value="Let's Get it!">
        </form>
    
    </body>

</html>