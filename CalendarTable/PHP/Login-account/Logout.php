<?php
    session_start();
    session_destroy();
    header("Location: ../Login-account/Login.php")
?>