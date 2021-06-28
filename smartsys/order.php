<?php
	
include("dbase.php");
include("authenticator.php");
	
	extract($_POST);
	$username = $_SESSION['SESS_USERNAME'];
	$date = date("Y-m-d");
	
	// Performing insert query execution
	$sql = "INSERT INTO orderlist (user,date,orderdate,ronquantity,ronprice,ronamount,ronstock,ronaverage,dslquantity,dslprice,dslamount,dslstock,dslaverage) VALUES ('$username','$date','$orderdate','$ronquantity','$ronprice','$ronamount','$ronstock','$ronaverage','$dslquantity','$dslprice','$dslamount','$dslstock','$dslaverage')";
	
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
<html>
	<meta http-equiv="refresh" content="2;url=login-successful.php" />
	</html>