<?php include "top.php"?>
<?php
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
    // $rs=$con->query($sql3);
    //     if($rs->num_rows> 0){
    //         $data3= mysqli_fetch_all($rs, MYSQLI_ASSOC);
    // }  
   $con->close();
?>
    <div class="container  w-25 mt-3">
        <div class="alert  text-center text-light" style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
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
                <select class="form-select bg-light fw-bold" name="product_id" aria-label="Default select example">
                    <option selected>Select product</option>
                    <?php
        foreach($data2 as $info2){ ?>
                    <option value="<?=$info2["id"];?>"><?=$info2["product_name"];?></option>
                    <?php } ?>
                </select>
                </select>
            </div>
            <!-- customer_id	product_id	invoice_id	bill_date	total_amount	discount	tax	 -->

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Date</label>
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
                <input type="number" name="tax" placeholder="Tax" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-success" name="bill">Submit</button>
            </div>
        </form>
    </div>
    <?php include "bottam.php"?>