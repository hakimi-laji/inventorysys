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
			$data1 = "SELECT * FROM request2"; 
			$result = mysqli_query($conn,$data1);
			
			if (mysqli_num_rows($result) > 0){ 
				// output data of each row
				while($row = mysqli_fetch_assoc($result)){
					$id = $row["id"];
					$nstesen = $row["nstesen"]; 
					$thantar = $row["thantar"];
				?>
				<li>
					<b><?php echo $nstesen; ?></b>
					<br>
					<p>[<a href="data-edit.php?id=<?php echo $id; ?>">UPDATE</a> / <a href="data-del.php?id=<?php echo $id; ?>">DELETE</a>]</p>
					<br>
				</li>
				
				<?php
				}} else {
				echo "No data"; 
			}
		?>
		
		
	</body>
</html>					