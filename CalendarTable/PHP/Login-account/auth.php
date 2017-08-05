<?php
    session_start();
    
    if (!isset($_SESSION["username"])) {
        header("Location: ../Login-account/Login.php");
    }
        
?>