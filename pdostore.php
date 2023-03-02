<?php
$dsn = 'mysql:host=localhost;dbname=stock';
$username = 'root';
$password = '';
$pdo = new PDO($dsn, $username, $password);
try {
   

if (!empty($_POST['name'])) {
    // Perform PDO insertion here

$sql = 'INSERT INTO users (name, address, age) VALUES (:name, :address, :age)';
$stmt = $pdo->prepare($sql);

$first_name = $_POST['name'];
$last_name = $_POST['address'];
$age = $_POST['age'];

$stmt->bindParam(':name', $first_name);
$stmt->bindParam(':address', $last_name);
$stmt->bindParam(':age', $age);

$stmt->execute();
} else {
    echo "Name field cannot be empty.";
}
//echo 'Data inserted successfully.';
} catch (PDOException $e) {
    $error=$stmt->errorInfo();
    if($error[1]){
    echo $error[2];
    }
    //echo 'Connection failed: ' . $e->getMessage();
}
$error="Duplicate entry 'bread' for key 'product_name' Product already in list";
$mass = str_replace(" key 'product_name'", "", $error);
echo $mass;
?>
<form method="post">
    <input type="text" name="name" placeholder="Enter name"><br><br>
    <input type="text" name="address" placeholder="Enter name"><br><br>
    <input type="number" name="age" placeholder="Enter name"><br><br>
    <button>Submit</button>
</form>