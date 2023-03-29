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

<div class="card text-center container mt-5" style="width: 18rem;">
  <img src="<?=$info["profile"];?>" class="card-img-top" style="border-radius: 130px;" alt="...">
  <div class="card-body">
  <img class="" src="images/users.png"  style="width:10%;"><h5 class="card " style="color:#8E54E9" ><?=$username=$info["username"]; ?></h5>
  <img class="" src="images/phone.png"  style="width:10%;"><p class="card-text text-success"><?=$username=$info["mobile"]; ?></p>
  <a target="_blank" href="https://mail.google.com/mail/u/0/#inbox"><img class="" src="images/email.png"  style="width:10%;"><p class="card-text"><?=$username=$info["email"]; ?></p></a>
    <div class="template-demo" style="margin-left:6px">
                    <a><button type="button"  class="btn btn-social-icon btn-outline-facebook btn-rounded"><a target="_blank" href="https://github.com/Codensr"><i class="mdi mdi-facebook" href></a></i></button>
                    <button type="button"  class="btn btn-social-icon btn-outline-youtube btn-rounded"><i class="mdi mdi-instagram"></i></button>
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

<style>
  .parnel{
    display: flex;
    
    align-items: center;
  }

.bbbb {
 margin-left: -60px;
 text-decoration: none;
 position: absolute;
 border: none;
 font-size: 14px;
 font-family: inherit;
 color: #fff;
 width: 9em;
 height: 3em;
 line-height: 2em;
 text-align: center;
 background: linear-gradient(90deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
 background-size: 300%;
 border-radius: 30px;
 z-index: 1;
}

.bbbb:hover {
 animation: ani 8s linear infinite;
 border: none;
}

@keyframes ani {
 0% {
  background-position: 0%;
 }

 100% {
  background-position: 400%;
 }
}

.bbbb:before {
 content: '';
 position: absolute;
 top: -5px;
 left: -5px;
 right: -5px;
 bottom: -5px;
 z-index: -1;
 background: linear-gradient(90deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
 background-size: 400%;
 border-radius: 35px;
 transition: 1s;
}

.bbbb:hover::before {
 filter: blur(20px);
}

.bbbb:active {
 background: linear-gradient(32deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
}

.icon {
  display: inline-block;
  width: 20px;
  height: 20px;
  background-image: url("path/to/your/png/icon");
  background-repeat: no-repeat;
  background-size: contain;
  vertical-align: middle;
}

.icon::before {
  content: "";
  display: inline-block;
  width: 20px;
  height: 20px;
  margin-right: 5px;
  vertical-align: middle;
}


    </style>
<?php include "bottam.php"?>
