<?php
//Start session
session_start();

include('dbase.php');

//validation error flag
$errflag = false;

//Input Validation
if($_POST['username'] == '')
{
    $errmsg_arr[]='Login ID is invalid';
    $errflag = true;
}
if($_POST['password'] == '')
{
    $errmsg_arr[] = 'Password is invalid';
    $errflag = true;
}

//if there are input validations, redirect back to the login form
if($errflag)
{
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: login.php");
    exit();
}



//to create a query to be executed in sql
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

//to run sql query in database
$result= mysqli_query($conn, $query) or die(mysqli_error($conn));

//check whether the query was successful or not
if(isset($result))
{
    if(mysqli_num_rows($result) == 1)
    {
        //Login successful
        session_regenerate_id();
        $member = mysqli_fetch_assoc($result);
        $_SESSION['SESS_MEMBER_ID'] = $member['id'];
        $_SESSION['SESS_USERNAME'] = $member['username'];
        //$_SESSION['SESS_EMAIL'] = $member['email'];
		$_SESSION['STATUS'] = true;
        session_write_close();
        header("location: login-successful.php");
        exit();
    }
    else
    {
        //login failed
        header("location: login-failed.html");
        exit();
    }
}
else
{
    die("Query failed");
}
   