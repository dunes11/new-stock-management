<?php
     session_start(); 
     
     $con=new mysqli("localhost","root","","stock");
     $a="";
     $count=null;
    
 if(isset($_POST["login"])){
         $username = $_POST['username'];  
         $password = $_POST['password'];
             
         $sql = "SELECT  username, password FROM admin WHERE username = '$username' AND password = '$password'";
         $rs= $con->query($sql); 
        
         $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);  
         $count = mysqli_num_rows($rs);  
         
        
         $_SESSION["username"]=$username; 
         $_SESSION["password"]=$password;
        
         try{  
         if($count == 1){
             header("Location:home_index.php");
             // echo "<h1><center> Login successful </center></h1>";            
         }  
         throw new Exception("Plz enter valid username and password");  
     }catch(Exception $e){
            $a= $e->getMessage();
     }
    } 
 ?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="vendors/prism/prism.css" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet" />
    <link href="assets/css/user.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/letter-s.png"/>
    
  </head>


  <body style="background:black">
       <!-- Main Content-->
    <!-- ===============================================-->
    <main class="main " id="top">
      <nav class="navbar bg-black navbar-expand-lg navbar-light fixed-top py-3  p-3  bg-body "  data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand"> <img class="sidebar-brand brand-logo" src="images/letter-s.png" style="width:8%;">&nbsp; Stock manager</a>
          <div class=" " id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto  border-lg-bottom-0 pt-2 pt-lg-0">
              <li class="nav-item px-2"><a class="nav-link active" aria-current="page" href="#">Login</a></li>
              <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="register.php">Register</a></li>
        
            </ul>
            <div class="d-flex mt-2 align-items-center mt-lg-0">
              <div class="dropdown">
                <button class="btn btn-sm d-flex mx-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search text-primary"></i></button>
                <div class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton1" style="top:55px">
                  <form>
                    <input class="form-control form-search-control border-100" type="search" placeholder="Search" aria-label="Search" />
                  </form>
                </div>
              </div><a href="#!"> <i class="fas fa-user text-primary"> </i></a>
            </div>
          </div>
        </div>
      </nav>
     
        <div class="bg-holder" style="background-image:url(assets/img/illustrations/bg.png);background-position: center;background-size:auto 816px;">
        </div>
        
<br>
        <div class="container">
          <div class="row align-items-center min-vh-100">
            <div class="col-md-7 col-xl-7 pt-9 text-md-start text-center">
              <h1 class="display-2 text-light fw-thin">Welcome in Stock<br><strong class="fw-bolder text-success">Management</strong></h1>
              <p class="fs-2 text-400">it's very easy and simple to use☻<br class="d-none d-xxl-block" /></p>
            </div>
            <div class="col-md-5 col-xl-5 pe-xxl-0">
              <div class="card card-bg shadow hero-header-form">
                <div class="card-body p-4 p-xl-6">
                  <h2 class="text-100 text-center"><img class="sidebar-brand brand-logo" src="images/login-.png" style="width:10%;">Login</h2>
                  <?php if(!$count == 1){ 
                
                   echo "<div class='text-danger text-center'>".$a."</div>"; 
         } ?>
                  <form class="mb-3" method="post">
                    
                    <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" required name="username" id="floatingName" type="text" placeholder="name">
                      <label for="floatingName">Username<img class="sidebar-brand brand-logo" src="images/profile.png" style="width:6%;"></label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" required name="password" id="floatingPhone" type="password" placeholder="name@example.com">
                      <label for="floatingPhone">Password<img class="sidebar-brand brand-logo" src="images/padlock.png" style="width:7%;"></label>
                  <br><br>
                    <div class="col-12 d-grid">
                     <button type="submit" name="login" class="btn btn-success rounded-pill" type="submit">Login</button>
                     
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    
      
      <section class="py-0 bg-black">

        <div class="container">
          <div class="row justify-content-md-between justify-content-evenly py-4">
            <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
              <p class="fs--1 my-2 fw-light text-200">All rights Reserved &copy; Company, <?=date('Y');?></p>
            </div>
            <div class="col-12 col-sm-8 col-md-6">
              <p class="fs--1 fw-light my-2 text-center text-md-end text-200"> Made by&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#F95C19" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;&nbsp;<a class="fw-bold text-success" href="https://github.com/Codensr" target="_blank">Narayan swami</a>
              </p>
            </div>
          </div>
        </div>
        </section>
    </main>

    <script src="assets/js/theme.js"></script>
</body>
</html>
