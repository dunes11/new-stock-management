<?php
    $con=new mysqli("localhost","root","","stock");
    $sql="select id,name from categories";
    $sql2="select id,name from company";
    $rs=$con->query($sql);
        if($rs->num_rows> 0){
            $data= mysqli_fetch_all($rs, MYSQLI_ASSOC);
      }

    $rs=$con->query($sql2);
        if($rs->num_rows> 0){
            $data2= mysqli_fetch_all($rs, MYSQLI_ASSOC);
    }  
   // $con->close();
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
<div class="container border w-25 mt-3" >
        <div class="alert alert-success text-center text-dark" style="width:108.30%;margin-left:-13px;border-radius:0">
            <h3>Add product</h3>
        </div>
<form method="post" action="store.php">

<div class="mb-3">
    <select class="form-select bg-light fw-bold" name="category_id" aria-label="Default select example">
    <option selected>Select Category</option>
    <?php
        foreach($data as $info){ ?>
    <option value="<?=$info["id"];?>"><?=$info["name"];?></option>
    <?php } ?>
    </select>
</div>

<div class="mb-3">
<select class="form-select bg-light fw-bold" name="company_id" aria-label="Default select example">
    <option selected>Select company</option>
    <?php
        foreach($data2 as $info2){ ?>
    <option value="<?=$info2["id"];?>"><?=$info2["name"];?></option>
    <?php } ?>
    </select>
</select>
</div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product name</label>
    <input type="text" name="product_name" required placeholder="Enter product name" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Purchase price</label>
    <input type="number" name="p_price" placeholder="Enter purchase price" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Selling price</label>
    <input type="number" name="s_price" placeholder="Selling price" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Qty</label>
    <input type="number" name="qty" placeholder="Quantity" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Manufacturing date</label>
    <input type="date" name="mfg_date" placeholder="Enter manufacturing date" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Expiary date</label>
    <input type="date" name="exp_date" placeholder="Enter expiary date" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="d-grid gap-2 mt-3">
  <button type="submit" class="btn btn-success" name="product">Submit</button>
</div>
    </form>
    </div>
    
</body>
</html>