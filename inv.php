<!DOCTYPE html>
<html>
	<body>
		
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
		?>
		
		
		
		<style type="text/css">
			.tg  {border-collapse:collapse;border-spacing:0;}
			.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
			overflow:hidden;padding:10px 5px;word-break:normal;}
			.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
			font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
			.tg .tg-0lax{text-align:left;vertical-align:top}
		</style>
		<table class="tg">
			<thead>
				<tr>
					<th class="tg-0lax">Nama Stesen</th>
					<th class="tg-0lax">Tarikh Penghantaran Dikehendaki</th>
					<th class="tg-0lax">Jenis Minyak Dipesan</th>
					<th class="tg-0lax">Kuantiti Dipesan (Liter)</th>
					<th class="tg-0lax">Harga Belian (RM/Liter)</th>
					<th class="tg-0lax">Amaun Bayaran (RM)</th>
					<th class="tg-0lax">Tarikh</th>
					<th class="tg-0lax">Stok Tutup (Liter)</th>
					<th class="tg-0lax">Tarikh</th>
					<th class="tg-0lax">Purata Jualan Harian (Liter)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="tg-0lax">
						<?php
							
							$sql = "SELECT nstesen FROM request";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo $row["nstesen"]."<br>";
								}
								} else {
								echo "0 results";
							}
						?>
					</td>
					<td class="tg-0lax">
						<?php
							$sql = "SELECT thantar FROM request";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo $row["thantar"]."<br>";
								}
								} else {
								echo "0 results";
							}
						?>
					</td>
					<td class="tg-0lax">
						<?php
							
							$sql = "SELECT jminyak FROM request";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo $row["jminyak"]."<br>";
								}
								} else {
								echo "0 results";
							}
						?>
					</td>
					<td class="tg-0lax">
						<?php
						$sql = "SELECT kpesan FROM request";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo $row["kpesan"]."<br>";
								}
								} else {
								echo "0 results";
							}
						?>
					</td>
					<td class="tg-0lax">
						<?php
						$sql = "SELECT hbelian FROM request";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo $row["hbelian"]."<br>";
								}
								} else {
								echo "0 results";
							}
						
						?>
					</td>
					<td class="tg-0lax">
						<?php
						$sql = "SELECT abayaran FROM request";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo $row["abayaran"]."<br>";
								}
								} else {
								echo "0 results";
							}
						?>
					</td>
					<td class="tg-0lax">
						<?php
						$sql = "SELECT abdate FROM request";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo $row["abdate"]."<br>";
								}
								} else {
								echo "0 results";
							}
						?>
					</td>
					<td class="tg-0lax">
						<?php
						$sql = "SELECT stutup FROM request";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo $row["stutup"]."<br>";
								}
								} else {
								echo "0 results";
							}
						?>
					</td>
					<td class="tg-0lax">
					<?php
					$sql = "SELECT stdate FROM request";
							$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo $row["stdate"]."<br>";
							}
							} else {
							echo "0 results";
						}
					?>
					</td>
					<td class="tg-0lax">
						<?php
						$sql = "SELECT pjualan FROM request";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo $row["pjualan"]."<br>";
								}
								} else {
								echo "0 results";
							}
						?>
					</td>
					
				</tr>
			</tbody>
		</table>
		
	</body>
</html>					