<html>
    <head>
    <title>EDIT</title>
    </head>
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$idURL = $_GET['id'];
$query = "SELECT * FROM request2 WHERE id = '$idURL'";


$result = mysqli_query($conn,$query) or die ("Could not execute query"); 
$row = mysqli_fetch_assoc($result);

 
		$nstesen = $row['nstesen'];
		$thantar = $row['thantar'];
		$jminyak = $row['jminyak'];
		$kpesan = $row['kpesan'];
		$hbelian = $row['hbelian'];
		$abayaran = $row['abayaran'];
		$abdate = $row['abdate'];
		$stutup = $row['stutup'];
		$stdate = $row['stdate'];
		$pjualan = $row['pjualan'];
?>

<body>
		<script>  
			
			function resetAll() {
  				alert("The form was reset");
				location.reload();
			}
		</script>  
		
		<form id="form" action="data-update.php" method="post" onreset="resetAll()">
			<h2>UPDATE: BORANG PESANAN BAHAN PETROLEUM</h2>
			
			<p>NAMA STESEN: <input id="nstesen" type="text" name="nstesen" value="<?php echo $nstesen; ?>"> 
			</p>
			
			<p>TARIKH PENGHANTARAN DIKEHENDAKI: <input id="thantar" type="date" name="thantar" value="<?php echo $thantar; ?>">
			</p>
			
			<p>JENIS MINYAK DIPESAN: 
				<select name="jminyak" id="jminyak">
				<option value="ron95">RON 95</option>
				<option value="disel">DISEL</option>
			</select>
			</p>
			
			<p>KUANTITI DIPESAN (LITER): <input id="kpesan" type="number" name="kpesan" value="<?php echo $kpesan; ?>">
			</p>
			
			<p>HARGA BELIAN (RM/LITER): <input id="hbelian" type="number" name="hbelian" value="<?php echo $hbelian; ?>">
			</p>
			
			<p>AMAUN BAYARAN (RM): <input id="abayaran" type="number" name="abayaran" value="<?php echo $abayaran; ?>">
			<br>TARIKH: <input id="abdate" type="date" name="abdate" value="<?php echo $abdate; ?>"> 
			</p>
			
			<p>STOK TUTUP (LITER): <input id="stutup" type="number" name="stutup" value="<?php echo $stutup; ?>">
			<br>TARIKH: <input id="stdate" type="date" name="stdate" value="<?php echo $stdate; ?>"> 
			</p>
			
			<p>PURATA JUALAN HARIAN (LITER): <input id="pjualan" type="number" name="pjualan" value="<?php echo $pjualan; ?>">
			</p>
			
			
            <input type="hidden" name="id" value="<?php echo $idURL; ?>">
            <button type="submit">SAVE </button>
			<input type="reset">
			<br><br>
		</form>
		<form action="inv2.php">
		<input type="submit" value="Check request">
		</form>
		
	</body>
</html>