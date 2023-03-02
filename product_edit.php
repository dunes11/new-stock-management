<?php include "top.php" ?>

<?php
    $id=$_GET["id"];
    $con=new mysqli("localhost","root","","stock");
    $sql="SELECT 
	product.id, 
    product.product_name, 
    product.p_price, 
    product.s_price, 
    product.qty,
    product.mfg_date,
    product.exp_date,
    company.name 
    AS company_name, 
    categories.name AS 
    category_name 
    FROM product 
    JOIN company ON product.company_id = company.id JOIN categories ON product.category_id = categories.id
    WHERE product.id=$id";
    $rs=$con->query($sql);
        if($rs->num_rows> 0){
            $data= mysqli_fetch_all($rs, MYSQLI_ASSOC);
      }
       foreach($data as $info){
?>
<!DOCTYPE html>
<html lang="en">

<div class="container  w-25 mt-3">
    <div class="alert  text-center text-light"
        style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
        <h3>Add product</h3>
    </div>
    <form method="post" action="store.php?id=<?=$info["id"];?>">

        <div class="mb-3">
            <select class="form-select bg-light fw-bold" name="category_id" aria-label="Default select example">
                <!-- <option selected>Select Category</option> -->
                <?php
                        $sql2="select * from categories";
                        $rs2=$con->query($sql2);
                        if($rs2->num_rows> 0){
                        $data2= mysqli_fetch_all($rs2, MYSQLI_ASSOC);
                     }
        foreach($data2 as $info2){ 
            if($info["category_name"]==$info2["name"]){
                $select="selected";
            }else{
                $select="";
            }
            ?>
                <option <?=$select;?> value="<?=$info2["id"];?>"><?=$info2["name"];?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <select class="form-select bg-light fw-bold" name="company_id" aria-label="Default select example">
                <!-- <option selected>Select company</option> -->
                <?php
                        $sql3="select * from company";
                        $rs3=$con->query($sql3);
                        if($rs3->num_rows> 0){
                        $data3= mysqli_fetch_all($rs3, MYSQLI_ASSOC);
                     }
        foreach($data3 as $info3){ 
            if($info["company_name"]==$info3["name"]){
                $select="selected";
            }else{
                $select="";
            }?>
                <option <?=$select;?> value="<?=$info3["id"];?>"><?=$info3["name"];?></option>
                <?php } ?>
            </select>
            </select>
        </div>
            
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Product name</label>
            <input type="hidden" name="product_name" value="<?=$info["id"]?>" required>
            <input type="text" name="product_name" value="<?=$info["product_name"]?>" required
                placeholder="Enter product name" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Purchase price</label>
            <input type="number" name="p_price" value="<?=$info["p_price"]?>" placeholder="Enter purchase price"
                required class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Selling price</label>
            <input type="number" name="s_price" value="<?=$info["s_price"]?>" placeholder="Selling price" required
                class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Qty</label>
            <input type="number" name="qty" value="<?=$info["qty"]?>" placeholder="Quantity" required
                class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Manufacturing date</label>
            <input type="date" name="mfg_date" value="<?=$info["mfg_date"]?>" placeholder="Enter manufacturing date"
                required class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Expiary date</label>
            <input type="date" name="exp_date" value="<?=$info["exp_date"]?>" placeholder="Enter expiary date" required
                class="form-control" id="exampleInputPassword1">
        </div>
        <div class="d-grid gap-2 mt-3">
            <button type="submit" class="btn btn-success" name="product_update">Update</button>
        </div>
    </form>
</div>
<?php } ?>
<?php include "bottam.php"?>