<?php
// connect to the database
// echo "getting to page";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// retrieve the product ID from the POST request
$productId = $_POST["productId"];

// retrieve the product price from the database
$sql = "SELECT s_price FROM product WHERE id = '$productId'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

// return the product price as a JSON-encoded string
echo $row["s_price"];

// close the database connection
$conn->close();
?>


