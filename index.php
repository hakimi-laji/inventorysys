<html>
	<head>
		<title>Student Form and Calculator using JS</title>
	</head>
	<body>
		<script>  
			
			function resetAll() {
  				alert("The form was reset");
				location.reload();
			}
		</script>  
		
		<form id="form" action="add2.php" method="post" onreset="resetAll()">
			<h2>BORANG PESANAN BAHAN PETROLEUM</h2>
			
			<p>NAMA STESEN: <input id="nstesen" type="text" name="nstesen"> 
			</p>
			
			<p>TARIKH PENGHANTARAN DIKEHENDAKI: <input id="thantar" type="date" name="thantar"> 
			</p>
			
			<p>JENIS MINYAK DIPESAN: 
				<select name="jminyak" id="jminyak">
				<option value="ron95">RON 95</option>
				<option value="disel">DISEL</option>
			</select>
			</p>
			
			<p>KUANTITI DIPESAN (LITER): <input id="kpesan" type="number" name="kpesan">
			</p>
			
			<p>HARGA BELIAN (RM/LITER): <input id="hbelian" type="number" name="hbelian">
			</p>
			
			<p>AMAUN BAYARAN (RM): <input id="abayaran" type="number" name="abayaran">
			<br>TARIKH: <input id="abdate" type="date" name="abdate"> 
			</p>
			
			<p>STOK TUTUP (LITER): <input id="stutup" type="number" name="stutup">
			<br>TARIKH: <input id="stdate" type="date" name="stdate"> 
			</p>
			
			<p>PURATA JUALAN HARIAN (LITER): <input id="pjualan" type="number" name="pjualan">
			</p>
			
			<input type="submit">
			<input type="reset">
			<br><br>
		</form>
		<form action="inv2.php">
		<input type="submit" value="Check request">
		</form>
		
	</body>
</html>