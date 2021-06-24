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
extract($_POST);
$idURL = $_POST['id'];
$sql = "UPDATE request2 SET nstesen='$nstesen', thantar='$thantar' WHERE id='$idURL'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>