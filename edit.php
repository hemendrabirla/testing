
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";
$id=$_POST['edit'];
$query = "SELECT * FROM product WHERE id = $id"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
} 
$sql = "UPDATE `product` SET $products  = 'product_name', $quantity = 'product_quantity' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action="" method="post">
<label>Product Name:</label>
<input class="input" name="products" type="text" value="<?php echo $row['products'];?>">
<label>Product Quantity:</label>
<input class="input" name="quantity" type="text" value="<?php echo $row['quantity'];?>" required>
<input class="submit" name="submit" type="submit" value="Insert" required>
</form>
</body>
</html>
