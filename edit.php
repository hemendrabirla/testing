<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="" method="post">
<label>Product Name:</label>
<input class="input" name="products" type="text" value="<?php echo $row['product_name'];?>">
<label>Product Quantity:</label>
<input class="input" name="quantity" type="text" value="<?php echo $row['product_quantity'];?>">
<input class="submit" name="update" type="submit" value="update" required>
</form>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
$row['product_name'] = "";
$row['product_quantity'] = "";

$id = $_REQUEST['edit'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['update'])) {
	  echo $products = $_POST['products'];
	  echo $quantity = $_POST['quantity'];

	 
 $sql =  "UPDATE `product` SET product_name = `$products`, product_quantity = `$quantity` WHERE id = $id";
      $result = mysqli_query($conn ,$sql);

	
}
?>
