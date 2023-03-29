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

<div class="container  w-75 mt-3">
        <!-- <div class="alert  text-center text-light" style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
            <h3>Update profile</h3>
        </div> -->
        <div class=" mb-3 container text-center"  >
                  <img class="mx-auto rounded-circle " style="width:30%" src="<?= $info["profile"];?>" alt="">
                  <span class="count bg-success"></span>
                </div>
        <form method="post" enctype="multipart/form-data" action="store.php">

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Customer name</label>
                <input type="text" name="full_name" value="<?=$info["full_name"];?>" required placeholder="Enter customer name" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mobile</label>
                <input type="number" name="mobile" value="<?=$info["mobile"];?>" placeholder="Enter purchase price" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Whatsup no</label>
                <input type="email" name="email" value="<?=$info["email"];?>" placeholder="Enter whatsup number" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">E-mail</label>
                <input type="text" name="username" value="<?=$info["username"];?>" placeholder="Enter your e-mail" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="" name="address" value="<?=$info["address"];?>" placeholder="Enter your address" required class="form-control"
                    id="exampleInputPassword1">
            </div>
         
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Update profile pic</label>
                <input type="file" name="profile" value="<?=$info["profile"];?>" required class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-success" name="prfile_update">Update profile</button>
            </div>
        </form>
    </div>
    </div>
    <?php } ?>
<?php include "bottam.php"?>