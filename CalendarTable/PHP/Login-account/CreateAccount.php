<!DOCTYPE HTML5>

<html>

    <head>
        <title>Running Log</title>
        <link rel=stylesheet type=text/css href="../../CSS/table.css" />
    </head>
    
    <?php
        $ok = true;
        $username = "";
        $password = "";
        $confirmPassword = "";
        $email = "";
        $address = "";
        $town = "";
        $country = "";
        $ssn = "";
        $bankpin = "";
    
        $usernameError = "";
        $passwordError = "";
        $confirmPasswordError = "";
        $emailError = "";
        $addressError = "";
        $townError = "";
        $countryError = "";
        $ssnError = "";
        $bankpinError = "";
    
        $date = new DateTime('now');  
        $formattedDate = $date->format("m/d/Y");
        
        if (isset($_POST["submit"])) {
            
            if (!isset($_POST["username"]) || $_POST["username"] === "") {
                $ok = false;
                $usernameError = "* Username is required.";
            } else {
                $username = ucwords(strtolower(trim($_POST["username"])));
                $db = mysqli_connect("localhost", "root", "", "running_log");
                $sql = sprintf("SELECT * FROM users WHERE username='%s'",
                              $username);
                $result = mysqli_query($db, $sql);
                if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $userid = $row["userid"];
                } else {
                    $userid = 0;
                    echo "Got here";
                }
                if ($userid > 0) {
                    $usernameError = "* Username is already taken. Choose something else.";
                    $ok = false;
                }
            }
            if (!isset($_POST["password"]) || $_POST["password"] === "") {
                $ok = false;
                $passwordError = "* Password is required.";
            } else {
                if (!isset($_POST["confirmPassword"]) || $_POST["confirmPassword"] === "") {
                    $ok = false;
                    $confirmPasswordError = "* You need to confirm your password!";
                } else {
                    if ($_POST["confirmPassword"] != $_POST["password"]) {
                        $ok = false;
                        $confirmPasswordError = "* Passwords are not the same.";
                    } else {
                        $password = $_POST["password"];
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                    }
                }
                    
            }
            if (!isset($_POST["email"]) || $_POST["email"] === "") {
                $ok = false;
                $emailError = "* Email is required.";
            } else {
                $email = $_POST["email"];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Invalid email.";
                    $ok = false;
                }
            }
            if (!isset($_POST["address"]) || $_POST["address"] === "") {
                $ok = false;
                $addressError = "* Address is required.";
            } else {
                $address = $_POST["address"];
            }
            if (!isset($_POST["town"]) || $_POST["town"] === "") {
                $ok = false;
                $townError = "* Town is required.";
            } else {
                $town = $_POST["town"];
            }
            if (!isset($_POST["country"]) || $_POST["country"] === "") {
                $ok = false;
                $countryError = "* Country is required.";
            } else {
                $country = $_POST["country"];
            }
            if (!isset($_POST["ssn"]) || $_POST["ssn"] === "") {
                $ok = false;
                $ssnError = "* Social Security Number is required!";
            } else {
                $ssn = $_POST["ssn"];
                if (!is_nan($ssn) && strlen($ssn) != 9) {
                    $ssnError = "* Social Security Number must be a 9-digit number!";
                    $ok = false;
                }
            }
            if (!isset($_POST["bankpin"]) || $_POST["bankpin"] === "") {
                $ok = false;
                $bankpinError = "* Bank Pin is required! Put it in!!!";
            } else {
                $bankpin = $_POST["bankpin"];
                if (!is_nan($bankpin) && strlen($bankpin) != 4) {
                    $bankpinError = "* Bank Pin must be a 4-digit number!";
                    $ok = false;
                }
            }

            if ($ok) {
                $db = mysqli_connect("localhost", "root", "", "running_log");
                if (!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = sprintf("INSERT INTO users (username, password, email, address, town, country, ssn, bankpin, DateCreated) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%f', '%f', '%s')",
                            mysqli_real_escape_string($db, $username),
                            mysqli_real_escape_string($db, $hash), 
                            mysqli_real_escape_string($db, $email), 
                            mysqli_real_escape_string($db, $address), 
                            mysqli_real_escape_string($db, $town), 
                            mysqli_real_escape_string($db, $country), 
                            $ssn, 
                            $bankpin,
                            mysqli_real_escape_string($db, $formattedDate));

                mysqli_query($db, $sql);

                mysqli_close($db);
            }
        }
        ?>
    
    <body>
        
        <div id=logoContainer>
        <a href="../Viewers/CalendarViewer.php"><img class=logo src="../../images/ablogo2.png"></a>
        </div>
        
        <ul class=menu>
            <li><a href=../Viewers/CalendarViewer.php>Home</a></li>
            <li><a href=../Calendar/add.php>Add A Run</a></li>
        </ul>
        
        <div class=vertical_line>
        
        </div>
            
        <form method=post action="">
            <br>
            <p onclick=thisFunction()>Make Your Account!</p>
            <script>
                function thisFunction() {
                    document.getElementById('account').innerHTML = "oops";
                }
                
            </script>
            <br>
            <p>Username:</p> <input type=text id=user onblur="checkDatabase()" name=username value="<?php 
                echo htmlspecialchars($username);    
            ?>">
            <script>
            function checkDatabase() {
                
            }
            </script>
            <span id=usernameError style="color: red;">
            <?php 
                echo $usernameError;
            ?>
            </span>
            <br><br>
            <p>Password:</p> <input type=password name=password> 
            <span style="color: red;">
            <?php 
                echo $passwordError;
            ?>
            </span>
            <br><br>
            <p>Confirm Password:</p> <input type=password name=confirmPassword> 
            <span style="color: red;">
            <?php 
                echo $confirmPasswordError;
            ?>
            </span>
            <br><br>
            <p>Email:</p> <input type=text name=email value="<?php 
                echo htmlspecialchars($email);    
            ?>">
            <span style="color: red;">
            <?php 
                echo $emailError;
            ?>
            </span>
            <br><br>
            <p>Address:</p> <input type=text name=address value="<?php 
                echo htmlspecialchars($address);    
            ?>">
            <span style="color: red;">
            <?php 
                echo $addressError;
            ?>
            </span>
            <br><br>
            <p>Town:</p> <input type=text name=town value="<?php 
                echo htmlspecialchars($town);    
            ?>">
            <span style="color: red;">
            <?php 
                echo $townError;
            ?>
            </span>
            <br><br>
            <p>Country:</p> <input type=text name=country value="<?php 
                echo htmlspecialchars($country);    
            ?>">
            <span style="color: red;">
            <?php 
                echo $countryError;
            ?>
            </span>
            <br><br>
            <p>Social Security Number:</p> <input maxlength="9" style="width: 71.5px;" type=text name=ssn value="<?php 
                echo htmlspecialchars($ssn);    
            ?>">
            <span style="color: red;">
            <?php 
                echo $ssnError;
            ?>
            </span>
            <br><br>
            <p>Bank Pin:</p> <input maxlength="4" style="width: 34.5px;" type=text name=bankpin value="<?php 
                echo htmlspecialchars($bankpin);    
            ?>">
            <span style="color: red;">
            <?php 
                echo $bankpinError;
            ?>
            </span>
            <br><br>
            <input type=submit name=submit value="Submit it!">
        </form>
        
        
    
    </body>

</html>