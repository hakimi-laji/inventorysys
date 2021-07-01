<?php
//Start session
session_start();

//Check the login status
if (!isset($_SESSION['STATUS']) || !$_SESSION['STATUS'] == true) {
    header("location: login-failed.html");
    exit();
}
?>