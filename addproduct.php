<?php include "top.php" ?>

<?php
    $con=new mysqli("localhost","root","","stock");
    $sql="select id,name from categories";
    $sql2="select id,name from company";
    $rs=$con->query($sql);
        if($rs->num_rows> 0){
            $data= mysqli_fetch_all($rs, MYSQLI_ASSOC);
      }

    $rs=$con->query($sql2);
        if($rs->num_rows> 0){
            $data2= mysqli_fetch_all($rs, MYSQLI_ASSOC);
    }  
   // $con->close();
?>
<!DOCTYPE html>
<html lang="en">

    <div class="container  w-25 mt-3">
        <div class="alert  text-center text-light" style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
            <h3>Add product</h3>
        </div>
        <form method="post" action="store.php">

            <div class="mb-3">
                <select class="form-select bg-light fw-bold" name="category_id" aria-label="Default select example">
                    <option selected>Select Category</option>
                    <?php
        foreach($data as $info){ ?>
                    <option value="<?=$info["id"];?>"><?=$info["name"];?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <select class="form-select bg-light fw-bold" name="company_id" aria-label="Default select example">
                    <option selected>Select company</option>
                    <?php
        foreach($data2 as $info2){ ?>
                    <option value="<?=$info2["id"];?>"><?=$info2["name"];?></option>
                    <?php } ?>
                </select>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Product name</label>
                <input type="text" name="product_name" required placeholder="Enter product name" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Purchase price</label>
                <input type="number" name="p_price" placeholder="Enter purchase price" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Selling price</label>
                <input type="number" name="s_price" placeholder="Selling price" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Qty</label>
                <input type="number" name="qty" placeholder="Quantity" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Manufacturing date</label>
                <input type="date" name="mfg_date" placeholder="Enter manufacturing date" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Expiary date</label>
                <input type="date" name="exp_date" placeholder="Enter expiary date" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-success" name="product">Submit</button>
            </div>
        </form>
    </div>

    <?php include "bottam.php"?>