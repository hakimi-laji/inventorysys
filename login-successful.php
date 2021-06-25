<?php
	include("authenticator.php");
	include("dbase.php");
	$idURL = $_SESSION['SESS_MEMBER_ID'];
	$name=$_SESSION['SESS_USERNAME'];
	
	$sql = "SELECT * FROM user WHERE username='$name'";
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()) {
		$station = $row['station'];
	}
?>


<!DOCTYPE html>
<html>
	<title>SMART System</title>
	<head>
		<style>
			.tab {
			overflow: hidden;
			border: 1px solid #ccc;
			background-color: #f1f1f1;
			}
			
			/* Style the buttons inside the tab */
			.tab button {
			background-color: inherit;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			transition: 0.3s;
			font-size: 17px;
			}
			
			/* Change background color of buttons on hover */
			.tab button:hover {
			background-color: #ddd;
			}
			
			/* Create an active/current tablink class */
			.tab button.active {
			background-color: #ccc;
			}
			
			/* Style the tab content */
			.tabcontent {
			display: none;
			padding: 6px 12px;
			border: 1px solid #ccc;
			border-top: none;
			}
			
			.tg  {border-collapse:collapse;border-spacing:0;}
			.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
			overflow:hidden;padding:10px 5px;word-break:normal;}
			.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
			font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
			.tg .tg-0lax{text-align:left;vertical-align:top}
		</style>
		
		
		<?php
			if ($name=="admin")
			{
				//********************************************** SMART STAFF SECTION
			?>
			<p>Welcome, <?=$_SESSION['SESS_USERNAME'];?></p>
			
			<?php
				$query = "SELECT * FROM orderlist";
				$result = mysqli_query($conn,$query);
				
				if (mysqli_num_rows($result) > 0){ 
					// output data of each row
					while($row = mysqli_fetch_assoc($result)){
						$id = $row["id"];
						$date = $row["date"];
						$orderdate = $row["orderdate"];
					?>
					
					<table class="tg">
						<thead>
							<tr>
								<th class="tg-0lax">Pemohon</th>
								<th class="tg-0lax">Tarikh Penghantaran Dikehendaki</th>
								<th class="tg-0lax">Jenis Minyak</th>
								<th class="tg-0lax">Kuantiti Dipesan (Liter)</th>
								<th class="tg-0lax">Harga Belian (RM/Liter)</th>
								<th class="tg-0lax">Amaun Bayaran (RM)</th>
								<th class="tg-0lax">Stok Tutup (Liter)</th>
								<th class="tg-0lax">Purata Jualan Harian (Liter)</th>
								<th class="tg-0lax">STATUS</th>
							</tr>
						</thead>
						<tbody>
							
							<?php
								$sql = "SELECT * FROM orderlist";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) { ?>
									<tr>
										<td class="tg-0lax" rowspan="2"> 
											<?php echo $row["user"]."<br>"; ?>
										</td>
										<td class="tg-0lax" rowspan="2"> 
											<?php echo $row["orderdate"]."<br>"; ?>
										</td>
										<td class="tg-0lax">RON95</td>
										<td class="tg-0lax">
											<?php echo $row["ronquantity"]."<br>"; ?>
										</td>
										<td class="tg-0lax">
											<?php echo $row["ronprice"]."<br>"; ?>
										</td>
										<td class="tg-0lax">
											<?php echo $row["ronamount"]."<br>"; ?>
										</td>
										<td class="tg-0lax">
											<?php echo $row["ronstock"]."<br>"; ?>
										</td>
										<td class="tg-0lax">
											<?php echo $row["ronaverage"]."<br>"; ?>
										</td>
										<td class="tg-0lax" rowspan="2"> 
											<select name="cars" id="cars">
												<option value="statuswait">Menunggu bayaran</option>
												<option value="statusyes">Lulus</option>
												<option value="statusno">Gagal</option>
											</select>
										</td>
									</tr>
									<tr>
										<td class="tg-0lax">DISEL</td>
										<td class="tg-0lax">
											<?php echo $row["dslquantity"]."<br>"; ?>
										</td>
										<td class="tg-0lax">
											<?php echo $row["dslprice"]."<br>"; ?>
										</td>
										<td class="tg-0lax">
											<?php echo $row["dslamount"]."<br>"; ?>
										</td>
										<td class="tg-0lax">
											<?php echo $row["dslstock"]."<br>"; ?>
										</td>
										<td class="tg-0lax">
											<?php echo $row["dslaverage"]."<br>"; ?>
										</td>
									</tr>
									<?php
									}
									} else {
									echo "0 results";
								}
							?>
						</tbody>
					</table>
					
					<?php
					}
					} else { 
					echo "none";
				}
			?>
			
			
			<?php
				//********************************************** End of SMART STAFF SECTION
			}
			else
			{
				//////////////////////////////// CLIENT SECTION
			?>
			<h>Welcome, <?=$name;?></h>
			<p>Station: <?=$station;?></p>
			
			
		</head>
		<body>
			
			<div class="tab">
				<button class="tablinks" onclick="openTab(event, 'tab1')">Daily Sales Update</button>
				<button class="tablinks" onclick="openTab(event, 'tab2')">Place New Order</button>
				<button class="tablinks" onclick="openTab(event, 'tab3')">View History</button>
			</div>
			
			<div id="tab1" class="tabcontent">
				
				<form action="dailyupdate.php" method="post">
					<p>Today's Date: <?php echo date("jS \of F Y h:i A") . "<br>"; ?></p>
					RON95 Sales (Litre):<input type="text" name="ronsales"><br>
					DISEL Sales (Litre):<input type="text" name="dslsales"><br>
					<button type="submit" name="dailyupdate">Update</button>
				</form>
				
			</div>
			
			<div id="tab2" class="tabcontent">
				
				<form action="order.php" method="post">
					<table class="tg">
						<thead>
							<tr>
								<th class="tg-0pky">TARIKH PENGHANTARAN DIKEHENDAKI</th>
								<th class="tg-0pky" colspan="2"> <input type="date" name="orderdate"> </th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="tg-0pky">JENIS MINYAK DIPESAN</td>
								<td class="tg-0pky">RON95</td>
								<td class="tg-0pky">DISEL</td>
							</tr>
							<tr>
								<td class="tg-0pky">KUANTITI DIPESAN (LITER)</td>
								<td class="tg-0pky"> <input type="number" name="ronquantity"> </td>
								<td class="tg-0pky"> <input type="number" name="dslquantity"> </td>
							</tr>
							<tr>
								<td class="tg-0lax">HARGA BELIAN (RM/LITER)</td>
								<td class="tg-0lax"> <input type="number" name="ronprice"> </td>
								<td class="tg-0lax"> <input type="number" name="dslprice"> </td>
							</tr>
							<tr>
								<td class="tg-0lax">AMAUN BAYARAN (RM/LITER)</td>
								<td class="tg-0lax"> <input type="number" name="ronamount"> </td>
								<td class="tg-0lax"> <input type="number" name="dslamount"> </td>
							</tr>
							<tr>
								<td class="tg-0lax">STOK TUTUP (LITER)</td>
								<td class="tg-0lax"> <input type="number" name="ronstock"> </td>
								<td class="tg-0lax"> <input type="number" name="dslstock"> </td>
							</tr>
							<tr>
								<td class="tg-0lax">PURATA JUALAN HARIAN (LITER)</td>
								<td class="tg-0lax"> <input type="number" name="ronaverage"> </td>
								<td class="tg-0lax"> <input type="number" name="dslaverage"> </td>
							</tr>
						</tbody>
					</table>
					<button type="submit" name="login">Submit</button>
				</form>
				
			</div>
			
			<div id="tab3" class="tabcontent">
				
				<?php
					$query = "SELECT * FROM orderlist WHERE user = '$name'";
					$result = mysqli_query($conn,$query);
					
					if (mysqli_num_rows($result) > 0){ 
						// output data of each row
						while($row = mysqli_fetch_assoc($result)){
							$id = $row["id"];
							$date = $row["date"];
							$orderdate = $row["orderdate"];
						?>
						
						<table class="tg">
							<thead>
								<tr>
									<th class="tg-0lax">Tarikh Penghantaran Dikehendaki</th>
									<th class="tg-0lax">Jenis Minyak</th>
									<th class="tg-0lax">Kuantiti Dipesan (Liter)</th>
									<th class="tg-0lax">Harga Belian (RM/Liter)</th>
									<th class="tg-0lax">Amaun Bayaran (RM)</th>
									<th class="tg-0lax">Stok Tutup (Liter)</th>
									<th class="tg-0lax">Purata Jualan Harian (Liter)</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql = "SELECT * FROM orderlist WHERE user = '$name'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) { ?>
										<tr>
											<td class="tg-0lax" rowspan="2"> 
												<?php echo $row["orderdate"]."<br>"; ?>
											</td>
											<td class="tg-0lax">RON95</td>
											<td class="tg-0lax">
												<?php echo $row["ronquantity"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["ronprice"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["ronamount"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["ronstock"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["ronaverage"]."<br>"; ?>
											</td>
										</tr>
										<tr>
											<td class="tg-0lax">DISEL</td>
											<td class="tg-0lax">
												<?php echo $row["dslquantity"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["dslprice"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["dslamount"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["dslstock"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["dslaverage"]."<br>"; ?>
											</td>
										</tr>
										<?php
										}
										} else {
										echo "0 results";
									}
								?>
							</tbody>
						</table>
						
						<?php
						}
						} else { 
						echo "none";
					}
				?>
				
				
			</div>
			
			<script>
				function openTab(evt, tabName) {
					var i, tabcontent, tablinks;
					tabcontent = document.getElementsByClassName("tabcontent");
					for (i = 0; i < tabcontent.length; i++) {
						tabcontent[i].style.display = "none";
					}
					tablinks = document.getElementsByClassName("tablinks");
					for (i = 0; i < tablinks.length; i++) {
						tablinks[i].className = tablinks[i].className.replace(" active", "");
					}
					document.getElementById(tabName).style.display = "block";
					evt.currentTarget.className += " active";
				}
			</script>
			
			
			
			<?php
			}
			/////////////////////////////// End of CLIENT SECTION
		?>
		
		<a href="logout.php?"> LOG OUT </a>
		
		
		
	</body>
</html>
