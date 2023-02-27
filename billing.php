<?php
    $con=new mysqli("localhost","root","","stock");
    $sql1="select id,name from customer";
    $sql2="select id,product_name from product";
   
    $inf=0;
    $rs=$con->query($sql1);
        if($rs->num_rows> 0){
            $data= mysqli_fetch_all($rs, MYSQLI_ASSOC);
      }

    $rs=$con->query($sql2);
        if($rs->num_rows> 0){
            $data2= mysqli_fetch_all($rs, MYSQLI_ASSOC);
    }
    // $rs=$con->query($sql3);
    //     if($rs->num_rows> 0){
    //         $data3= mysqli_fetch_all($rs, MYSQLI_ASSOC);
    // }  
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
<div class="container border w-25 mt-3" >
        <div class="alert alert-success text-center text-dark" style="width:108.30%;margin-left:-13px;border-radius:0">
            <h3>Create bill</h3>
        </div>
<form method="post" action="store.php">

<div class="mb-3">
    <select class="form-select bg-light fw-bold" name="customer_id" aria-label="Default select example">
    <option selected>Select Customer</option>
    <?php
        foreach($data as $info){ ?>
    <option value="<?=$info["id"];?>"><?=$info["name"];?></option>
    <?php } ?>
    </select>
</div>

<div class="mb-3">
<select class="form-select bg-light fw-bold" name="product_id" aria-label="Default select example">
    <option selected>Select product</option>
    <?php
        foreach($data2 as $info2){ ?>
    <option value="<?=$info2["id"];?>"><?=$info2["product_name"];?></option>
    <?php } ?>
    </select>
</select>
 </div>
<!-- customer_id	product_id	invoice_id	bill_date	total_amount	discount	tax	 -->

  <div class="mb-3"> 
    <label for="exampleInputPassword1" class="form-label">Date</label>
    <input type="date" name="bill_date"  required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Total amount</label>
    <input type="number" name="total_amount" placeholder="Total amount" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">discount</label>
    <input type="number" name="discount" placeholder="Discount" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">tax</label>
    <input type="number" name="tax" placeholder="Tax" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="d-grid gap-2 mt-3">
  <button type="submit" class="btn btn-success" name="bill">Submit</button>
</div>
    </form>
    </div>
    
</body>
</html>