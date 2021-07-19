<?php
	$con = mysqli_connect("localhost","root","") or die ("Unable to connect");
	mysqli_select_db($con, "smart");
	
	
	if(isset($_POST['register'])){
		$username=$_POST['username'];
		$client=$_POST['client'];
		$station=$_POST['station'];
		$ronmax=$_POST['ronmax'];
		$dslmax=$_POST['dslmax'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		
		if($password==$cpassword){
			$query="SELECT * FROM user WHERE username='$username'";
			$result=mysqli_query($con, $query);
			if(mysqli_num_rows($result)>0){
				echo "<script type='text/javascript'>alert('User already exists. Try another username.')</script>";
				}else{
				$query="INSERT INTO user (username, password) VALUES ('$username', '$password')";
				$result=mysqli_query($con, $query);
				
				$query2="INSERT INTO client (client, station, ronmax, dslmax, roncurrent, dslcurrent) VALUES ('$username', '$station', '$ronmax', '$dslmax', '$ronmax', '$dslmax')";
				$result2=mysqli_query($con, $query2);
				
				if($result){
					echo "<script type='text/javascript'>alert('User successfully registered!')</script>";
					}else{
					echo "<script type='text/javascript'>alert('ERROR!')</script>";
				}
			}
			
			}else{
			echo "<script type='text/javascript'>alert('Password and Confirm Password do not match')</script>";
		}
		
	}
?>
<html>
	
	<head>
		<meta http-equiv="refresh" content="0;url=login-successful.php" />
	</head>
	
	<body>
	</body>
	
</html>
