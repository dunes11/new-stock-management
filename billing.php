<?php include "top.php"?>
<?php
    $con=new mysqli("localhost","root","","stock");
    $sql1="select id,name from customer";
    $sql2="select id,product_name from product";
   // $sql3="SELECT quantity FROM products WHERE id = '$product_id'";
   
    $inf=0;
    $rs=$con->query($sql1);
        if($rs->num_rows> 0){
            $data= mysqli_fetch_all($rs, MYSQLI_ASSOC);
      }

    $rs=$con->query($sql2);
        if($rs->num_rows> 0){
            $data2= mysqli_fetch_all($rs, MYSQLI_ASSOC);
    }
    // $rs=$con->query($sql3);
    // if($rs->num_rows> 0){
    //     $data3= mysqli_fetch_all($rs, MYSQLI_ASSOC);
// }
    // $rs=$con->query($sql3);
    //     if($rs->num_rows> 0){
    //         $data3= mysqli_fetch_all($rs, MYSQLI_ASSOC);
    // }  
   $con->close();
?>
<div class="container   mt-3">
    <div class="alert  text-center text-light"
        style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
        <h3>Make bill</h3>
    </div>
    <form method="post" action="store.php">

        <div class="mb-3">
            <select class="form-select bg-light fw-bold" name="customer_id" aria-label="Default select example">
                <option selected>Select Customer</option>
                <?php
        foreach($data as $info){ ?>
                <option value="<?=$info["id"];?>"><?=$info["name"];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <!-- <label for="product">Select a product:</label> -->
            <select class="form-select bg-light fw-bold" id="product" name="product_id">
                <option value="">Select product</option>
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

    // retrieve the list of products from the database
    $sql = "SELECT id, product_name FROM product";
    $result = $conn->query($sql);

    // display the list of products in the dropdown
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id"] . "'>" . $row["product_name"] . "</option>";
        }
    } else {
        echo "<option value=''>No products found</option>";
    }

    // close the database connection
    $conn->close();
    ?>
            </select>
            <br>
            <label  class="form-label" for="quantity">Quantity:</label>
            <input class="form-control bg-dark text-danger" style="border-color:green" disabled type="text" id="quantity" name="qty" readonly>
        </div>
        <!-- customer_id	product_id	invoice_id	bill_date	total_amount	discount	tax	 -->

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Bill date</label>
            <input type="date" name="bill_date" required class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Total amount</label>
            <input type="number" name="total_amount" placeholder="Total amount" required class="form-control"
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">discount</label>
            <input type="number" name="discount" placeholder="Discount" required class="form-control"
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">tax</label>
            <input type="number" name="tax" placeholder="Tax" required class="form-control" id="exampleInputPassword1">
        </div>
        <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-success" name="bill">Submit</button>
        </div>
    </form>
</div>
<?php include "bottam.php"?>