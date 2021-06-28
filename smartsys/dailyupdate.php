<?php
	
	include("dbase.php");
	include("authenticator.php");
	
	extract($_POST);
	$username = $_SESSION['SESS_USERNAME'];
	
	$date = date("Y-m-d");
	
	// Performing insert query execution
	$sql = "INSERT INTO dailylog (client, date, ronsales, dslsales) VALUES ('$username','$date','$ronsales','$dslsales')";
	
	if(mysqli_query($conn, $sql)){
		echo "<h3>data stored in a database successfully."
		. " Please browse your localhost php my admin"
		. " to view the updated data</h3>";
		} else{
		echo "ERROR: Hush! Sorry $sql. "
		. mysqli_error($conn);
	}
	
	//CALCULATION
	$sql = "SELECT * FROM client WHERE client='$username'";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$client = $row['client'];
		$station = $row['station'];
		$ronmax = $row['ronmax'];
		$dslmax = $row['dslmax'];
		$roncurrent = $row['roncurrent'];
		$dslcurrent = $row['dslcurrent'];
	}
	$roncurrent = $roncurrent - $ronsales;
	$dslcurrent = $dslcurrent - $dslsales;
	
	$query2="UPDATE client SET roncurrent='$roncurrent', dslcurrent='$dslcurrent' WHERE client='$username'";
	$result2=mysqli_query($conn, $query2);
	
	// Close connection
	mysqli_close($conn);
?>
<html>
	<meta http-equiv="refresh" content="2;url=login-successful.php" />
</html>