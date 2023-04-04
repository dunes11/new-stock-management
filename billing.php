<?php include "top.php"?>
<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];
}
    $con=new mysqli("localhost","root","","stock");
    $sql1="select id,name from customer";
    $sql2="select id,product_name from product";
   
    $inf=0;
    $rs=$con->query($sql1);
        if($rs->num_rows> 0){
            $data= mysqli_fetch_all($rs, MYSQLI_ASSOC);
      }

    $rs=$con->query($sql2);
        if($rs->num_rows> 0){
            $data2= mysqli_fetch_all($rs, MYSQLI_ASSOC);
    }

    $query="select invoice_id from billing order by invoice_id desc";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
    $lastid=$row["invoice_id"];
        if(empty($lastid)){
            $number="E-0000001";
        }else{
            $idd=str_replace("E-","",$lastid);
            $id=str_pad($idd+1,7,0,STR_PAD_LEFT);
            $number="E-".$id;
    }

    if(isset($_POST["bill"])){
    
                $sql="insert into billing(customer_id,product_id,bill_date,total_amount,quantity,invoice_id)
                value('$_POST[customer_id]','$_POST[product_id]','$_POST[bill_date]','$_POST[total_amount]','$_POST[quantity]','$_POST[invoice_id]')";
            if(mysqli_query($con,$sql)){
                $query="select invoice_id from billing order by invoice_id desc";
                $result=$con->query($query);
                $data2=mysqli_fetch_array($result);
                $lastid=$data2["invoice_id"];
            if(empty($lastid)){
                $number="E-0000001";
                }else{
                    $idd=str_replace("E-","",$lastid);
                    $id=str_pad($idd+1,7,0,STR_PAD_LEFT);
                    $number="E-".$id; 
                    echo "<div id='myAlert' class='container alert' style='background-color:green;border-radius:0;'>";
                   // echo  "<a href='invoice_view.php?id=$id' class='text-danger fw-bold'>View recipt</a>";
                    echo "<div class='text-dark fw-bold text-center'>Succesfully generated</div>";
                    echo "</div>";
                }
            }
    }


?>


<div class="container mt-3">
    <div class="alert  text-center text-light"
        style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
        <h3>Make bill</h3>
        <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:2%;"> <span style="font-size:10px;color:black;" class="fw-bold">fields are required</span>

    </div>
    <form method="post">
        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Invoice number</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
            <input type="text" name="invoice_id" style="border-color:green" value="<?=$number;?>" readonly required class="form-control bg-dark"
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
        <label for="exampleInputPassword1"  class="form-label">Select Customer</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
            <select required  class="form-select bg- fw-bold" name="customer_id" aria-label="Default select example">
                <option selected>Select Customer</option>
                <?php
        foreach($data as $info) { ?>
                <option value="<?=$info["id"];?>"><?=$info["name"];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <!-- <label for="product">Select a product:</label> -->
            <label for="exampleInputPassword1" class="form-label">Select product</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
            <select required class="form-select bg-light fw-bold" id="product" name="product_id">
                <option value="">Select product</option>
                <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stock";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT id, product_name FROM product";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id"] . "'>" . $row["product_name"] . "</option>";
        }
    } else {
        echo "<option value=''>No products found</option>";
    }
// #191c24
    ?>

            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="quantity">Available quantity:</label> 
            <input class="form-control bg-dark text-danger" style="border-color:green" disabled type="text" id="quantity1" name="qty" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label" for="quantity">Product price:</label>
            <input class="form-control bg-dark text-danger" style="border-color:green" disabled type="text" id="getprice" name="product_price" readonly>
        </div>

        <div class="mb-3">
        <label  class="form-label" for="quantity">Quantity:</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
        <input  class="form-control" type="number" id="quantity" required name="quantity" min="1" value="1">
        </div>
        <div class="mb-3">
        <label  class="form-label" for="total-price">Total Amount:</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
        <input type="text" class="form-control bg-dark text-danger" name="total_amount" style="border-color:green" disabled id="total-price"  readonly>
        </div>
        <div class="mb-3">
        <button class="btn btn-primary text-dark fw-bold" type="button" onclick="calculateTotalPrice()">Calculate Total Price</button>
        </div>
        <!-- <div class="mb-3"> customer_id,product_id,bill_date,total_amount,quantity,product_price,invoice_id
            <label for="exampleInputPassword1" class="form-label">Invoice number</label>
            <input type="number" name="invoice_id"  value="<?= rand(0,10000);?>" required class="form-control" id="exampleInputPassword1">
        </div> -->
        <div class="mb-3">
        <label  class="form-label" for="total-price">Total Amount:</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
        <input type="text" class="form-control bg-dark text-danger" required name="total_amount" style="border-color:green"  id="total-price"  >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Bill date</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
            <input type="date" name="bill_date"  required class="form-control" required id="exampleInputPassword1">
        </div>
        <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-success" name="bill">Submit</button>
        </div>
    </form>
</div>
<?php include "bottam.php"?>