<?php
     session_start(); 
     $dsn = 'mysql:host=localhost;dbname=stock';
        $username = 'root';
        $password = '';
        $pdo = new PDO($dsn, $username, $password);
        $error=null;
        $success="";
        $unsuccess="";
        $tab=null;
        try {
        if(isset($_POST['register'])) {
            if(isset($_POST['username']) && ($_POST['mobile'])){
                $sql="SELECT * FROM admin WHERE  username LIKE '%$_POST[username]%' and mobile LIKE '%$_POST[mobile]%'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
             
            if(isset($_POST["register"])){
                if(($_FILES["profile"]['error']!=4)){
                   $valid=["jpg","img"];
                  // $valid2=["pdf","html","htm","php","txt","css"];
                   $type=strtolower(pathinfo($_FILES["profile"]["name"],PATHINFO_EXTENSION));
                   
                   if(in_array($type,$valid)){
                   $to="images/".$_FILES['profile']["name"];
                   $from=$_FILES['profile']['tmp_name'];
                   if(move_uploaded_file($from,$to)){
                       $success= "<div class='text-primary'>Succesfully Account created </div>";
                   }
                  
                   $sql = 'INSERT INTO admin (profile,full_name,username,mobile,email,address,password) VALUES (:profile,:full_name, :username, :mobile, :email, :address,:password)';
                   $stmt = $pdo->prepare($sql);
                  
                   $stmt->bindParam(':profile',$to);
                   $stmt->bindParam(':full_name',$_POST['full_name']);
                   $stmt->bindParam(':username',$_POST['username']);
                   $stmt->bindParam(':mobile',$_POST['mobile']);
                   $stmt->bindParam(':email',$_POST['email']);
                   $stmt->bindParam(':address',$_POST['address']);
                   $stmt->bindParam(':password',$_POST['password']);
                    $tab= $stmt->execute();
                
               }else{
                echo   $unsuccess= "<div class='text-danger text-center'>Please upload valid image type</div>";
               }
           }
        }
    }
        } catch (PDOException $e){
            $error=$stmt->errorInfo();
           print_r($error);
            if($error[1]){
              $mass = str_replace(array("'", "key "), "", $error);
              $escon=implode($mass);
              $takeError=str_replace("230001062","",$escon);
              echo "<div class='text-danger'>".$takeError."</div>";
            }
        }
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="vendors/prism/prism.css" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet" />
    <link href="assets/css/user.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/letter-s.png"/>
  </head>
  <body style="background:black">
    <!--Main Content-->
    <!-- ===============================================-->
    <main class="main " id="top">
      <nav class="navbar bg-black navbar-expand-lg navbar-light fixed-top py-3  p-3  bg-body " data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand"> <img class="sidebar-brand brand-logo" src="images/letter-s.png" style="width:8%;">&nbsp; Stock manager</a>
          <div class="" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
              <li class="nav-item px-2"><a class="nav-link " aria-current="page" href="login.php">Login</a></li>
              <li class="nav-item px-2"><a class="nav-link active" aria-current="page" href="#">Register</a></li>
            </ul>
            <div class="d-flex mt-2 align-items-center mt-lg-0">
              <div class="dropdown">
                <button class="btn btn-sm d-flex mx-2" id="dropdownMenuButton1" type="submit" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-search text-primary"></i></button>
                <div class="dropdown-menu dropdown-menu-lg-end p-0 rounded" aria-labelledby="dropdownMenuButton1" style="top:55px">
                  <form>
                    <input class="form-control form-search-control border-100" type="search" placeholder="Search" aria-label="Search" />
                  </form>
                </div>
              </div><a href="#!"><i class="fas fa-user text-primary"></i></a>
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
              <h1 class="display-2 text-light fw-thin">Welcome in Stock<br ><strong class="fw-bolder text-success">Management</strong></h1>
              <p class="fs-2 text-400">it's very easy and simple to use☻<br class="d-none d-xxl-block" /></p>
            </div>
            <div class="col-md-5 col-xl-5 pe-xxl-0">
              <div class="card card-bg shadow hero-header-form">
                <div class="card-body p-4 p-xl-6">
                  <h2 class="text-100 text-center"><img class="sidebar-brand brand-logo" src="images/signup.png" style="width:8%;"> Register</h2>
                 <div class="text-center" style="font-size:15px"><img class="sidebar-brand brand-logo" src="images/medical.png" style="width:2%;"> <span class="text-center" style="color:white;" class="fw-bold">fields are required</span></div>
                  <?php 
                          if(isset($tab)){
                            echo "<h3 style='color:green'>Account succesfully created</h3>";
                           }
                           if(isset($unsuccess)){
                            echo $unsuccess;
                           }
                  if(isset($takeError)){ 
                    
                   echo "<div class='text-danger text-center mt-5'>".$takeError." alredy exists</div>"; 
         }
          ?>
                  <form class="mb-3" method="post" enctype="multipart/form-data">
                  <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" required name="full_name" id="floatingName" type="text" placeholder="full name">
                      <label for="floatingName">Full name <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:1.5%;"></label>
                    </div> <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" required name="mobile" id="floatingName" type="number" placeholder="name">
                      <label for="floatingName">Mobile <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:1.5%;"></label>
                    </div> <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" required name="email" id="floatingName" type="email" placeholder="name">
                      <label for="floatingName">e-mail <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:1.5%;"></label>
                    </div>
                    <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" required name="username" id="floatingName" type="text" placeholder="name">
                      <label for="floatingName">Username <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:1.5%;"></label>
                    <div class="form-floating mb-3">
                      <input class="form-control input-box form-ensurance-header-control" required name="password" id="floatingPhone" type="password" placeholder="name@example.com">
                      <label for="floatingPhone">Password <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:1.5%;"></label>
                    </div>
                    <div class="form-floating mb-3">
                      <textarea name="address" class="form-control form-ensurance-header-control" required id="floatingAddress"></textarea>
                      <label for="floatingAddress">Address</label>
                    </div>

                    <div class="mb-3">
                    <input class="form-control input-box form-ensurance-header-control" id="floatingPhone" required name="profile" style="height:45px" type="file">
                    <label for="floatingfile" >Upload profile <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:1.5%;"></label>
                   <br>
                   <br>
                    <div class="col-12 d-grid">
                      <button type="submit" name="register" class="btn btn-success rounded-pill" type="submit">Register</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

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
        <!-- end of .container-->

        </section>
    </main>

    <script src="assets/js/theme.js"></script>

  </body>

</html>
