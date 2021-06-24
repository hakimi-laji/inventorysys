<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "smart";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$nstesen = $_REQUEST['nstesen'];
		$thantar = $_REQUEST['thantar'];
		$jminyak = $_REQUEST['jminyak'];
		$kpesan = $_REQUEST['kpesan'];
		$hbelian = $_REQUEST['hbelian'];
		$abayaran = $_REQUEST['abayaran'];
		$abdate = $_REQUEST['abdate'];
		$stutup = $_REQUEST['stutup'];
		$stdate = $_REQUEST['stdate'];
		$pjualan = $_REQUEST['pjualan'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO request VALUES ('$nstesen','$thantar','$jminyak','$kpesan','$hbelian','$abayaran','$abdate','$stutup','$stdate','$pjualan')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
