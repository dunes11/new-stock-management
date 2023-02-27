<?php
    session_start();
   $con=new mysqli("localhost","root","","stock");
   $sql="SELECT product.id, product.product_name, product.p_price, product.s_price, product.qty,product.mfg_date,
   product.exp_date, company.name AS company_name, categories.name AS category_name FROM product JOIN company ON product.company_id = company.id 
   JOIN categories ON product.category_id = categories.id";
   $rs=$con->query($sql);
//    $con->close();
   $data=$rs->fetch_all(1);
  // $data=mysqli_fetch_assoc($rs,);
  //print_r($data);
   $con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<!-- navbar  -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" name="logout" href="logout.php">Logout</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Add
          </a>
          <ul class="dropdown-menu bg-danger" style="border-radius:0;" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-dark fw-bold" href="addproduct.php">Add product</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-bold" href="category.php">Add category</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-bold" href="company.php">Add company</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-bold" href="addcustomer.php">Add customer</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item fw-bold" href="billing.php">Make bill</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="coustomer_index.php" tabindex="-1" aria-disabled="true">Customer</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- navbar end -->
<div class="container">
<table class="table mt-3 table-striped table-bordered table-hover">
    <thead class=" table-primary">
        <tr>
            <th class="text-center">S.no</th>
            <th class="text-center">Category Name</th>
            <th class="text-center">Company Name</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">P_price</th>
            <th class="text-center">S_price</th>
            <th class="text-center">Qty</th>
            <th class="text-center">Mfg_date</th>
            <th class="text-center">Exp_date</th>
        </tr>
    </thead>
    <tbody>
    <?php $sn=0;
    // print_r($data);
   
    foreach($data as $info){ ?>
        <tr>
            <td><?=++$sn;?></td>
            <td><?=$info["category_name"]?></td>
            <td><?=$info["company_name"];?></td>
            <td><?=$info["product_name"]?></td>
            <td><?=$info["p_price"];?></td>
            <td><?=$info["s_price"];?></td>
            <td><?=$info["qty"];?></td>
            <td><?=$info["mfg_date"];?></td>
            <td><?=$info["exp_date"];?></td>
        </tr>
    </tbody>
    <?php } //$con->close();  }?>
</table>
</div>
</body>
</html>