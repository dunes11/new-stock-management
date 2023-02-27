<?php
    session_start();
    $con=new mysqli("localhost","root","","stock");
    $sql="select * from customer";
    $rs=$con->query($sql);
    $data=$rs->fetch_all(1);

    // echo "<pre>";
    // print_r($data);
    // echo "<pre>";
    // exit();

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
          <a class="nav-link active" aria-current="page" href="home_index.php">Home</a>
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
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
<table class="table mt-3">
    <thead class="table table-dark">
        <tr>
            <th>S.no</th>
            <th>Profile</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Whatsup</th>
            <th>E-mail</th>
            <th>Addrss</th>
        </tr>
    </thead>
    <tbody>
    <?php $sn=0;
    // print_r($data);
   
    foreach($data as $info){ ?>
        <tr>
            <td><?=++$sn;?></td>
            <td><?=$info["profile"]?></td>
            <td><?=$info["name"];?></td>
            <td><?=$info["mobile"]?></td>
            <td><?=$info["whatsup_no"];?></td>
            <td><?=$info["email"];?></td>
            <td><?=$info["address"];?></td>
        </tr>
    </tbody>
    <?php } //$con->close();  }?>
</table>
</body>
</html>