<?php session_start() ?>
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
  <main class="main " id="top">
      <nav class="navbar bg-black navbar-expand-lg navbar-light fixed-top py-3 shadow p-3  bg-body " data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"> <img class="sidebar-brand brand-logo" src="images/letter-s.png" style="width:8%;">&nbsp; Stock manager</a>
          <!-- <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> -->
          <div class="collapse navbar-collapse pt-4 pt-lg-0" id="navbarSupportedContent">
            <!-- <p class="mb-0 ms-auto text-light fs-0 fw-normal"><i class="fas fa-phone-alt me-2"></i>Call Us Now <a class="text-light" href="tel:+604-680-9785">+215(362)4579</a></p> -->
            <ul class="navbar-nav ms-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
               <?php 
               if(isset($_SESSION["username"])){
             echo 
             '<li class="nav-item px-2"><a class="nav-link " aria-current="page" href="home_index.php">Home</a></li>'.
              '<li class="nav-item px-2"><a class="nav-link" href="billing.php">Make bill</a></li>'.
              '<li class="nav-item px-2"><a class="nav-link" href="addcustomer.php">Add customer</a></li>'.
              '<li class="nav-item px-2"><a class="nav-link  " href="addproduct.php">Add product</a></li>'.
              '<li class="nav-item px-2"><a class="nav-link text-danger fw-bold" href="logout.php">Logout</a></li>';
               }elseif(!isset($_SESSION["username"])){
             echo '<li class="nav-item px-2"><a class="nav-link btn-success text-light btn fw-bold" href="login.php">Back to login</a></li>';
               
            }
            ?>
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
<div class="text-center" style="margin-top:13%">
    <img src="images/404.png">
</div>

<?php
      
          
        if(!isset($_SESSION['username'])){
           echo "<a class='btn btn-success  text-light mt-0' style='margin-left:45%' href='login.php'>Back to login</a>";
        }else{
           echo "<a class='btn btn-success text-light fw-bold mt-0' style='margin-left:45%' href='home_index.php'>Back to home</a>";
        }
        ?>

<section class="py-0 bg-black mt-5">

        <div class="container">
          <div class="row justify-content-md-between justify-content-evenly py-4">
            <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
              <p class="fs--1 my-2 fw-light text-200">All rights Reserved &copy; Company, 2023</p>
            </div>
            <div class="col-12 col-sm-8 col-md-6">
              <p class="fs--1 fw-light my-2 text-center text-md-end text-200"> Made by&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#F95C19" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;&nbsp;<a class="fw-bold text-success" href="" target="_blank">Narayan swami</a>
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
