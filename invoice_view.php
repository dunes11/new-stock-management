<?php include "top.php"; ?>
<?php
    //session_start();
    $id=$_GET["id"];
   $con=new mysqli("localhost","root","","stock");
   $sql="SELECT billing.id, billing.bill_date, billing.total_amount,billing.invoice_id,billing.quantity, customer.name AS customer_name, product.product_name AS product_name,product.s_price AS product_price FROM billing JOIN customer ON billing.customer_id = customer.id JOIN product ON billing.product_id = product.id WHERE billing.id =$id";
   $rs=$con->query($sql);
//    $con->close();
   $data=$rs->fetch_all(1);
   $con->close();
   foreach($data as $info){
   $date=$info["bill_date"];
   $invoice=$info["invoice_id"];
   $amount=$info["total_amount"];
   $customer=$info["customer_name"];
   $product=$info["product_name"];
   $price=$info["product_price"];
   $quantity=$info["quantity"]; 
   }

?>

<div class="card container bg-light">
    <div class="card-body mx-4">
        <div class="container">
            <p class="my-5 mx-5 text-center text-black" style="font-size: 30px;">Thanks for your purchase</p>
            <div class="row">
                <ul class="list-unstyled">
                    <li class="text-black "><?=$customer;?></li>
                    <li class="text-muted mt-1 "><span>Invoice</span> <?=$invoice;?></li>
                    <li class="text-black mt-1 "><?=$date;?></li>
                </ul>
                <hr class="text-black">
                <div class="col-xl-10 text-black">
                    <p>Product</p>
                </div>
                <div class="col-xl-2">
                    <p class="float-end text-black">Quantity</p>
                </div>
                <hr class="text-black">
            </div>
            <div class="row">
                <div class="col-xl-10 text-black">
                    <p><?=$product;?></p>
                </div>
                <div class="col-xl-2">
                    <p class="float-end text-black"><?=$quantity;?>
                    </p>
                </div>
                <hr class="text-black">
            </div>
            <div class="row">
                <div class="col-xl-10 text-black">
                    <p>Price per unit</p>
                </div>
                <div class="col-xl-2">
                    <p class="float-end text-black">₹<?=$price;?>
                    </p>
                </div>
                <hr class="text-black">
            </div>
            <div class="row">
                <div class="col-xl-10 text-black">
                    <p>Total Amount</p>
                </div>
                <div class="col-xl-2 text-black">
                    <p class="float-end">₹<?=$amount;?>
                    </p>
                </div>
                <hr style="border: 2px solid black;">
            </div>
            <div class="row text-black">

                <div class="col-xl-12 text-black">
                    <p class="float-end fw-bold ">Total: ₹<?=$amount;?>
                    </p>
                </div>
                <hr style="border: 2px solid black;">
            </div>
            <div class="text-center text-black" style="margin-top: 90px;">
                <!-- <a><u class="text-info">View in browser</u></a> -->
                <p>visit again ♥</p>
            </div>
        </div>
    </div>
</div>
<?php include "bottam.php"; ?>