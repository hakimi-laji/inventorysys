<?php
	
	include("dbase.php");
	include("authenticator.php");
	
	extract($_POST);
	$username = $_SESSION['SESS_USERNAME'];
	
	if (isset($_POST['updatestatus'])) {
        # updatestatus was clicked
		// Performing insert query execution
		$sql = "UPDATE orderlist SET ronprice='$ronprice', dslprice='$dslprice', status='$status' WHERE id='$id'";
		
		if(mysqli_query($conn, $sql)){
			} else{
			echo "ERROR: Hush! Sorry $sql. "
			. mysqli_error($conn);
		}
		
		//CALCULATE
		$sql = "SELECT * FROM orderlist WHERE id='$id'";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			$ronquantity = $row['ronquantity'];
			$ronprice = $row['ronprice'];
			$ronamount = $row['ronamount'];
			$dslquantity = $row['dslquantity'];
			$dslprice = $row['dslprice'];
			$dslamount = $row['dslamount'];
		}
		$ronamount = $ronquantity * $ronprice;
		$dslamount = $dslquantity * $dslprice;
		
		$sql = "UPDATE orderlist SET ronamount='$ronamount', dslamount='$dslamount' WHERE id='$id'";
		
		
		
	}
    elseif (isset($_POST['deletestatus'])) {
        # deletestatus was clicked
		$sql = "DELETE FROM orderlist WHERE id='$id'";
		
	}
	
	
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