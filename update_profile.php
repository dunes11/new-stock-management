<?php include "top.php" ?>
<?php
    $id=$_GET["id"];
    $con=new mysqli("localhost","root","","stock");
    $sql="SELECT * from admin WHERE id=$id";
    $rs=$con->query($sql);
        if($rs->num_rows> 0){
            $data= mysqli_fetch_all($rs, MYSQLI_ASSOC);
      }
      foreach($data as $info){
?>

<!-- username	
password	
email	
	
full_name	
mobile	
profile	
address -->
<div class="  container mt-5" style="width: 18rem;">
<div class="container ">
        <div class="boxxxx">
        <div class="contentttt">
        <img src="<?= $info["profile"];?>" class="card-img-top" alt="">
    </div>
        </div>
</div>
</div>
        <!-- <div class=" mb-3 container text-center"  >
                 
                </div> -->
      <div class="container">
                <form method="post" enctype="multipart/form-data" action="store.php">

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Customer name</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="text" name="full_name" value="<?=$info["full_name"];?>" required placeholder="Enter customer name" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mobile</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="number" name="mobile" value="<?=$info["mobile"];?>" placeholder="Enter purchase price" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Whatsup no</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="email" name="email" value="<?=$info["email"];?>" placeholder="Enter whatsup number" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">E-mail</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="text" name="username" value="<?=$info["username"];?>" placeholder="Enter your e-mail" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="" name="address" value="<?=$info["address"];?>" placeholder="Enter your address" required class="form-control"
                    id="exampleInputPassword1">
            </div>
         
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Update profile pic</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="file" name="profile" value="<?=$info["profile"];?>" required class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-success" name="prfile_update">Update profile</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <?php } ?>
<?php include "bottam.php"?>