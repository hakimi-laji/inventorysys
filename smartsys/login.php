<?php
	session_start();
	$con = mysqli_connect("localhost", "root", "") or die ("Unable to connect");
	mysqli_select_db($con, "smart");
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		
		$result = mysqli_query($con, $query);
		
		if(mysqli_num_rows($result)>0){
			//global variable
			$_SESSION['username']=$username;
			header('location:index.php');
			
			} else{
			echo "<script type='text/javascript'>alert('Invalid username or password!')</script>";
		}
	}
?>			
