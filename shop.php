
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<form action="" method="post">
<label>Product Name:</label>
<input class="input" name="products" type="text" value="">
<label>Product Quantity:</label>
<input class="input" name="quantity" type="text" value="" required>
<input class="submit" name="submit" type="submit" value="Insert" required>
</form>
</body>
</html>

<?php
$product_name = "";
$product_quantity = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
 $products = $_POST['products'];
  $quantity = $_POST['quantity'];



$sql = "INSERT INTO `product`(`product_name`, `product_quantity`) values ('$products', '$quantity')";
if ($conn->query($sql) === TRUE) {
  //echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}



$sql = "SELECT * FROM product";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>product_name</th>";
                echo "<th>product_quantity</th>";
                 echo "<th>Edit</th>";
                  echo "<th>Delete</th>";
               
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_quantity'] . "</td>";
              echo  "<td>"
				?> <a href="edit.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a> <?php
			"</td>";
		"<td>"
				?>
				<a href="delete.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
		<?php	"</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
$conn->close();;
?>

