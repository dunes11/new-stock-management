<?php include "top.php" ?>
<?php
  $con=new mysqli("localhost","root","","stock");
  $username=$_SESSION['username'];
  $sql="select * from admin where username='$username' ";
  $rs=$con->query($sql);
//    
   $data=$rs->fetch_all(1);
  //  print_r($data);
  
   foreach($data as $info){
    $username=$info["username"];
    $username=$info["password"];
    $username=$info["email"];
    $username=$info["full_name"];
    $username=$info["mobile"];
    $username=$info["profile"];
   }
   $con->close();
  ?>


<div class=" text-center container mt-5" style="width: 18rem;">
<div class="boxxxx">
        <div class="contentttt">
  <img src="<?=$info["profile"];?>" class="card-img-top"  alt="...">
  </div>
</div>
  <div class="">
  <img class="" src="images/users.png"  style="width:10%;"><h5  style="color:#8E54E9" ><?=$username=$info["username"]; ?></h5>
  <img class="" src="images/phone.png"  style="width:10%;"><p class="card-text text-success"><?=$username=$info["mobile"]; ?></p>
  <a target="_blank" href="https://mail.google.com/mail/u/0/#inbox"><img class="" src="images/email.png"  style="width:10%;"><p class="card-text"><?=$username=$info["email"]; ?></p></a>
    <div class="template-demo" style="margin-left:6px">
                    <a><button type="button"  class="btn btn-social-icon btn-outline-facebook btn-rounded"><a target="_blank" href="https://github.com/Codensr"><i class="mdi mdi-facebook" href></a></i></button>
                    <button type="button"  class="btn btn-social-icon btn-outline-youtube btn-rounded"><a target="_blank" href="https://www.instagram.com/ns_rankawat/"><i class="mdi mdi-instagram"></i></button>
                    <button type="button"  class="btn btn-social-icon btn-outline-linkedin btn-rounded"><i class="mdi mdi-linkedin"></i></button>
                </div>
              <br>
            <br>
    <div class="parnel" >
   <a style="margin-left: 28px;" href="update_profile.php?id=<?=$info["id"]?>"> <button class="bbbb">Edit profile</button></a>
   <a style="margin-left: 72%;" href="logout.php"> <button class="bbbb">Logout</button></a>
   </div>
  </div>
</div>


<?php include "bottam.php"?>
