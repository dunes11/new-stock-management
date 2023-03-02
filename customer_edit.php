<?php include "top.php" ?>
<?php
    $id=$_GET["id"];
    $con=new mysqli("localhost","root","","stock");
    $sql="SELECT * from customer WHERE id=$id";
    $rs=$con->query($sql);
        if($rs->num_rows> 0){
            $data= mysqli_fetch_all($rs, MYSQLI_ASSOC);
      }
      foreach($data as $info){
?>
<div class="container  w-25 mt-3">
        <div class="alert  text-center text-light" style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
            <h3>Add customer</h3>
        </div>
        <form method="post" enctype="multipart/form-data" action="store.php">

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Customer name</label>
                <input type="text" name="name" value="<?=$info["name"];?>" required placeholder="Enter customer name" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mobile</label>
                <input type="number" name="mobile" value="<?=$info["mobile"];?>" placeholder="Enter purchase price" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Whatsup no</label>
                <input type="number" name="whatsup_no" value="<?=$info["whatsup_no"];?>" placeholder="Enter whatsup number" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">E-mail</label>
                <input type="email" name="email" value="<?=$info["email"];?>" placeholder="Enter your e-mail" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="" name="address" value="<?=$info["address"];?>" placeholder="Enter your address" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Update profile pic</label>
                <input type="file" name="profile" value="<?=$info["name"];?>" required class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-success" name="customer">Submit</button>
            </div>
        </form>
    </div>
    </div>
    <?php } ?>
    <?php include "bottam.php"?>
