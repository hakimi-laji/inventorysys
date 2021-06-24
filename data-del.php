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
// sql to delete a record
$sql = "DELETE FROM request2 WHERE id='$idURL'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>