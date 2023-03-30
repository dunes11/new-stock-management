<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stock";
//echo 343*3;


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// retrieve the list of products from the database
$sql = "SELECT id, product_name FROM product";
$result = $conn->query($sql);
?>
<form method="post">
  <label for="product">Product:</label>
  <select id="product" name="product">
    <option value="">Select product</option>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id"] . "'>" . $row["product_name"] . "</option>";
      }
    } else {
      echo "<option value=''>No products found</option>";
    }
    ?>
  </select>
  <br>
  <label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity" min="1" value="1">
  <br>
  <label for="total-price">Total Price:</label>
  <input type="text" id="total-price" name="total-price" readonly>
  <br>
  <button type="button" onclick="calculateTotalPrice()">Calculate Total Price</button>
</form>


<script>
function calculateTotalPrice() {
  var productId = document.getElementById("product").value;
  var quantity = document.getElementById("quantity").value;

  // console.log(productId,quantity);
  // make an AJAX request to fetch the product price
  var xhr = new XMLHttpRequest();
  var price=xhr.open("POST", "get-product-price.php",true);
  // console.log("price is here -:",price);

  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      var productPrice = parseFloat(this.responseText);
  // console.log("price is here -:",productPrice);

      var totalPrice = productPrice * quantity;
      document.getElementById("total-price").value = totalPrice;
    }
  };
  xhr.send("productId=" + productId);
}
</script>

