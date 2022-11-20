<?php
header("Location: shop.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
$id = $_GET['del'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM `product` WHERE id = $id";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
