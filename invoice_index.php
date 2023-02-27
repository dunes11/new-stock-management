<?php
    session_start();
   $con=new mysqli("localhost","root","","stock");
   $sql="SELECT 
   billing.id, 
   billing.bill_date,
   billing.total_amount,
   billing.discount,
   billing.tax,
   customer.name 
   AS customer_name, 
   product.product_name AS 
   product_name 
   FROM billing 
   JOIN customer ON billing.customer_id = customer.id JOIN product ON billing.product_id = product.id";
   $rs=$con->query($sql);
//    $con->close();
   $data=$rs->fetch_all(1);
  // $data=mysqli_fetch_assoc($rs,);
  echo "<pre>";
  print_r($data);
  echo "</pre>";
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

<div class="container">
<table class="table mt-3 table-striped table-bordered table-hover">
    <thead class=" table-primary">
        <tr>
            <th class="text-center">S.no</th>
            <th class="text-center">bill_date</th>
            <th class="text-center">customer_name</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">discount</th>
            <th class="text-center">tax</th>
            <th class="text-center">total_amount</th>
        </tr>
    </thead>
    <tbody>
    <?php $sn=0;
    // print_r($data);
   
    foreach($data as $info){ ?>
        <tr>
            <td><?=++$sn;?></td>
            <td><?=$info["bill_date"]?></td>
            <td><?=$info["customer_name"];?></td>
            <td><?=$info["product_name"];?></td>
            <td><?=$info["discount"]?></td>
            <td><?=$info["tax"];?></td>
            <td><?=$info["total_amount"];?></td>
        </tr>
    </tbody>
    <?php } //$con->close();  }?>
</table>
</div>
</body>
</html>