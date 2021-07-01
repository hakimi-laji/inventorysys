<?php
	include("authenticator.php");
	include("dbase.php");
	$idURL = $_SESSION['SESS_MEMBER_ID'];
	$name=$_SESSION['SESS_USERNAME'];
	
	$sql = "SELECT * FROM client WHERE client='$name'";
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
				//********************************************** SMART STAFF/ADMIN SECTION
			?>
			<p>Welcome, <?=$_SESSION['SESS_USERNAME'];?></p>
			
			<div class="tab">
				<button class="tablinks" onclick="openTab(event, 'tab1')">View Orders</button>
				<button class="tablinks" onclick="openTab(event, 'tab2')">Register New Client</button>
				<button class="tablinks" onclick="openTab(event, 'tab3')">Client List</button>
				<button class="tablinks" onclick="openTab(event, 'tab4')" id="defaultOpen">Sales Record</button>
			</div>
			
			<div id="tab1" class="tabcontent">
				
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
										<form action="approval.php" method="post">
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
													<?php echo $row["ronprice"]." "; ?>
													<input placeholder="Set price per liter" type="number" name="ronprice">
												</td>
												<td class="tg-0lax">
													<?php echo $row["ronamount"]."<br>"; ?>
												</td>
												<td class="tg-0lax" rowspan="2"> 
													<p>Current: <?php echo $row["status"]."<br>"; ?></p>
													
													<select name="status">
														<option value="wait">Menunggu bayaran</option>
														<option value="pass">Lulus</option>
														<option value="fail">Gagal</option>
													</select><br>
													<input type="hidden" name="id" value="<?php echo $row["id"]."<br>"; ?>">
													<button type="submit" name="updatestatus" onclick="confirmBox()">Update Status</button>
													<button type="submit" name="deletestatus" onclick="confirmBox()">DELETE</button>
												</td>
											</tr>
											<tr>
												<td class="tg-0lax">DISEL</td>
												<td class="tg-0lax">
													<?php echo $row["dslquantity"]."<br>"; ?>
												</td>
												<td class="tg-0lax">
													<?php echo $row["dslprice"]." "; ?>
													<input placeholder="Set price per liter" type="number" name="dslprice">
												</td>
												<td class="tg-0lax">
													<?php echo $row["dslamount"]."<br>"; ?>
												</td>
											</tr>
										</form>
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
			
			<div id="tab2" class="tabcontent">
				
				<p>New client? Register now.</p>
				<form method = "post" action = "register.php">
					<input placeholder="Enter station name" type="text" name="station" required>
					<input placeholder="Enter RON95 max capacity" type="number" name="ronmax" required>
					<input placeholder="Enter DISEL max capacity" type="number" name="dslmax" required><br>
					<input placeholder="Enter new username" type="text" name="username" required>
					<input placeholder="Enter new password" type="password" name="password" required>
					<input placeholder="Confirm new password" type="password" name="cpassword" required>
					<button type="submit" name="register" onclick="confirmBox()">Register</button>
				</form>
				
			</div>
			
			<div id="tab3" class="tabcontent">
				
				<?php
					$query = "SELECT * FROM client";
					$result = mysqli_query($conn,$query);
					
					if (mysqli_num_rows($result) > 0){ 
						// output data of each row
						while($row = mysqli_fetch_assoc($result)){
							$id = $row["id"];
						?>
						
						<table class="tg">
							<thead>
								<tr>
									<th class="tg-0lax">Klien</th>
									<th class="tg-0lax">Stesen</th>
									<th class="tg-0lax">Jenis Minyak</th>
									<th class="tg-0lax">Kapasiti Maksima (Liter)</th>
									<th class="tg-0lax">Baki (Liter)</th>
								</tr>
							</thead>
							
							<tbody>
								
								<?php
									$sql = "SELECT * FROM client";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) { ?>
										<tr>
											<td class="tg-0lax" rowspan="2"> 
												<?php echo $row["client"]."<br>"; ?>
											</td>
											<td class="tg-0lax" rowspan="2"> 
												<?php echo $row["station"]."<br>"; ?>
											</td>
											<td class="tg-0lax">RON95</td>
											<td class="tg-0lax">
												<?php echo $row["ronmax"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["roncurrent"]." "; ?>
											</td>
										</tr>
										<tr>
											<td class="tg-0lax">DISEL</td>
											<td class="tg-0lax">
												<?php echo $row["dslmax"]."<br>"; ?>
											</td>
											<td class="tg-0lax">
												<?php echo $row["dslcurrent"]." "; ?>
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
		
		<div id="tab4" class="tabcontent">
			
			
			
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				
				<label>Filter by client:</label>
				<input list="users" name="name">
				<datalist id="users">
					<?php
						$query = "SELECT * FROM client";
						$result = mysqli_query($conn,$query);
						if (mysqli_num_rows($result) > 0){ 
							// output data of each row
							while($row = mysqli_fetch_assoc($result)){
								$id = $row["id"];
							?>
							<option value="<?php echo $row["client"]; ?>">
								<?php
								}
								} else { 
								echo "none";
							}
						?>
					</datalist>
					<input type="submit" name="submit" value="Search name"><br>
					
					
					
					
					<label>Filter by date:</label>
					<input type="date" name="dateform"> 
					
					<input type="submit" name="submit2" value="Search date">
				</form>
				
				<?php
					if(isset($_POST['submit'])) 
					{ 
						$name = $_POST['name'];
						echo "Displaying sales record of: <b> $name </b>";
						
						$query = "SELECT * FROM client WHERE client='$name'";
						$result = mysqli_query($conn,$query);
						
						if (mysqli_num_rows($result) > 0){ 
							// output data of each row
							while($row = mysqli_fetch_assoc($result)){
								$id = $row["id"];
								
							?>
							
							<table class="tg">
								<thead>
									<tr>
										<th class="tg-0lax">Klien</th>
										<th class="tg-0lax">Tarikh</th>
										<th class="tg-0lax">Jenis Minyak</th>
										<th class="tg-0lax">Kapasiti Terjual (Liter)</th>
									</tr>
								</thead>
								
								<tbody>
									
									<?php
										$sql = "SELECT * FROM dailylog WHERE client='$name'";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) { ?>
											<tr>
												<td class="tg-0lax" rowspan="2"> 
													<?php echo $row["client"]."<br>"; ?>
												</td>
												<td class="tg-0lax" rowspan="2"> 
													<?php echo $row["date"]."<br>"; ?>
												</td>
												<td class="tg-0lax">RON95</td>
												<td class="tg-0lax">
													<?php echo $row["ronsales"]."<br>"; ?>
												</td>
											</tr>
											<tr>
												<td class="tg-0lax">DISEL</td>
												<td class="tg-0lax">
													<?php echo $row["dslsales"]."<br>"; ?>
												</td>
											</tr>
											
											<?php
											}
										}
									}
								}
								} elseif(isset($_POST['submit2'])) {
								
								$dateform = $_POST['dateform'];
								echo "Displaying sales record of: <b> $dateform </b>";
								
								$query = "SELECT * FROM dailylog WHERE date='$dateform'";
								$result = mysqli_query($conn,$query);
								
								if (mysqli_num_rows($result) > 0){ 
									// output data of each row
									while($row = mysqli_fetch_assoc($result)){
										$id = $row["id"];
										
									?>
									
									<table class="tg">
										<thead>
											<tr>
												<th class="tg-0lax">Klien</th>
												<th class="tg-0lax">Tarikh</th>
												<th class="tg-0lax">Jenis Minyak</th>
												<th class="tg-0lax">Kapasiti Terjual (Liter)</th>
											</tr>
										</thead>
										
										<tbody>
											
											<?php
												$sql = "SELECT * FROM dailylog WHERE date='$dateform'";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													// output data of each row
													while($row = $result->fetch_assoc()) { ?>
													<tr>
														<td class="tg-0lax" rowspan="2"> 
															<?php echo $row["client"]."<br>"; ?>
														</td>
														<td class="tg-0lax" rowspan="2"> 
															<?php echo $row["date"]."<br>"; ?>
														</td>
														<td class="tg-0lax">RON95</td>
														<td class="tg-0lax">
															<?php echo $row["ronsales"]."<br>"; ?>
														</td>
													</tr>
													<tr>
														<td class="tg-0lax">DISEL</td>
														<td class="tg-0lax">
															<?php echo $row["dslsales"]."<br>"; ?>
														</td>
													</tr>
													
													<?php
													}
													} else {
													echo "0 results";
												}
											}
										}
									}
								?>	
							</tbody>
						</table>
						
						
		</div>
					
					
					<?php
						//********************************************** End of SMART STAFF SECTION
					}
					else
					{
						///////////////////////////////////////////// CLIENT SECTION
					?>
					<h>Welcome, <?=$name;?></h>
					<p>Station: <?=$station;?></p>
					
					
				</head>
				<body>
					
					<div class="tab">
						<button class="tablinks" onclick="openTab(event, 'tab1')">Daily Sales Update</button>
						<button class="tablinks" onclick="openTab(event, 'tab2')">Place New Order</button>
						<button class="tablinks" onclick="openTab(event, 'tab3')">View Order History</button>
						<button class="tablinks" onclick="openTab(event, 'tab4')">View Sales Log</button>
					</div>
					
					<div id="tab1" class="tabcontent">
						
						<form action="dailyupdate.php" method="post">
							<p>Today's Date: <?php echo date("jS \of F Y h:i A") . "<br>"; ?></p>
							RON95 Sales (Litre):<input type="text" name="ronsales" required><br>
							DISEL Sales (Litre):<input type="text" name="dslsales" required><br>
							<button type="submit" name="dailyupdate" onclick="confirmBox()">Update</button>
						</form>
						
					</div>
					
					<div id="tab2" class="tabcontent">
						
						<form action="order.php" method="post">
							<table class="tg">
								<thead>
									<tr>
										<th class="tg-0pky">TARIKH PENGHANTARAN DIKEHENDAKI</th>
										<th class="tg-0pky" colspan="2"> <input type="date" name="orderdate" required> </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="tg-0pky">JENIS MINYAK DIPESAN</td>
										<td class="tg-0pky"><b>RON95</b></td>
										<td class="tg-0pky"><b>DISEL</b></td>
									</tr>
									<tr>
										<td class="tg-0pky">KAPASITI MAKSIMA (LITER)</td>
										<td class="tg-0pky">
											<?php
												$query = "SELECT * FROM client WHERE station='$station'";
												$result = mysqli_query($conn,$query);
												$row = $result->fetch_assoc();
												echo $row["ronmax"];
											?>
										</td>
										<td class="tg-0pky"> 
											<?php
												echo $row["dslmax"];
											?>
										</td>
									</tr>
									<tr>
										<td class="tg-0pky">KUANTITI TERJUAL (LITER)</td>
										<td class="tg-0pky"> <?php echo $ronbalance = $row["ronmax"] - $row["roncurrent"] ?> </td>
										<td class="tg-0pky"> <?php echo $dslbalance = $row["dslmax"] - $row["dslcurrent"] ?> </td>
									</tr>
									<tr>
										<td class="tg-0pky">BAKI (LITER)</td>
										<td class="tg-0pky">
											<?php
												$query = "SELECT * FROM client WHERE station='$station'";
												$result = mysqli_query($conn,$query);
												$row = $result->fetch_assoc();
												echo $row["roncurrent"];
											?>
										</td>
										<td class="tg-0pky"> <?php echo $row["dslcurrent"];?> </td>
									</tr>
									<tr>
										<td class="tg-0pky">KUANTITI DIPESAN (LITER)</td>
										<td class="tg-0pky"> <input type="number" name="ronquantity"  min="0" max="<?=$ronbalance;?>" placeholder="<?=$ronbalance;?>"> </td>
										<td class="tg-0pky"> <input type="number" name="dslquantity"  min="0" max="<?=$dslbalance;?>" placeholder="<?=$dslbalance;?>"> </td>
									</tr>
								</tbody>
							</table>
							<button type="submit" name="login" onclick="confirmBox()">Submit</button>
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
											<th class="tg-0lax">STATUS</th>
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
													<td class="tg-0lax" rowspan="2"> 
														<?php echo $row["status"]."<br>"; ?>
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
					
					<div id="tab4" class="tabcontent">
						
						<?php
							$query = "SELECT * FROM dailylog WHERE client = '$name'";
							$result = mysqli_query($conn,$query);
							
							if (mysqli_num_rows($result) > 0){ 
								// output data of each row
								while($row = mysqli_fetch_assoc($result)){
									$id = $row["id"];
									$date = $row["date"];
									$ronsales = $row["ronsales"];
									$dslsales = $row["dslsales"];
								?>
								
								<table class="tg">
									<thead>
										<tr>
											<th class="tg-0lax">Tarikh</th>
											<th class="tg-0lax">Jenis Minyak</th>
											<th class="tg-0lax">Kuantiti Terjual (Liter)</th>
										</tr>
									</thead>
									<tbody>
										
										<?php
											$sql = "SELECT * FROM dailylog WHERE client = '$name'";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												// output data of each row
												while($row = $result->fetch_assoc()) { ?>
												<tr>
													<td class="tg-0lax" rowspan="2"> 
														<?php echo $row["date"]."<br>"; ?>
													</td>
													<td class="tg-0lax">RON95</td>
													<td class="tg-0lax">
														<?php echo $row["ronsales"]."<br>"; ?>
													</td>
												</tr>
												<tr>
													<td class="tg-0lax">DISEL</td>
													<td class="tg-0lax">
														<?php echo $row["dslsales"]."<br>"; ?>
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
					
					
					
					<?php
					}
					/////////////////////////////// End of CLIENT SECTION
				?>
				
				<a href="logout.php?"> LOG OUT </a>
				
				<script>
				
				function confirmBox() {
  						confirm("Are you sure?");
					}
					
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
					
					document.getElementById("defaultOpen").click();
					
					
				</script>
			</body>
		</html>
		