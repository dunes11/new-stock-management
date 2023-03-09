<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// retrieve the quantity of the selected product from the database
$product_id = $_POST["product_id"];
$sql = "SELECT s_price FROM product WHERE id = '$product_id'";
$result = $conn->query($sql);

// display the quantity of the selected product
if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    echo $row["s_price"];
} else {
    echo "Product not found";
}


$conn->close();
?>
