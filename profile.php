<?php include "top.php" ?>
<?php
// define your products and their prices
$products = array(
    "product1" => 10.00,
    "product2" => 15.00,
    "product3" => 20.00
);

// get the quantity and product from your form or database
$quantity = 5; // example quantity
$product = "product2"; // example product

// calculate the price based on the quantity and product
if (array_key_exists($product, $products)) {
    $price = $quantity * $products[$product];
} else {
    // product not found in array
    $price = 0.00;
}

// display the final price
echo "Final price for $quantity $product(s): $price";
?>

<?php include "bottam.php"?>