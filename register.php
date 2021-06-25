<?php
	$con = mysqli_connect("localhost","root","") or die ("Unable to connect");
	mysqli_select_db($con, "smart");

			
			if(isset($_POST['register'])){
				$username=$_POST['username'];
				$station=$_POST['station'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword){
					$query="SELECT * FROM user WHERE username='$username'";
					$result=mysqli_query($con, $query);
					if(mysqli_num_rows($result)>0){
						echo "<script type='text/javascript'>alert('User already exists. Try another username.')</script>";
						}else{
						$query="INSERT INTO user (username, station, password) VALUES ('$username', '$station', '$password')";
						$result=mysqli_query($con, $query);
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
    <meta http-equiv="refresh" content="0;url=index.php" />
</head>

<body>
</body>

</html>