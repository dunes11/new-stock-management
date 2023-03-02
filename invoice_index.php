<?php include "top.php"?>
<?php
    //session_start();
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
//   echo "<pre>";
//   print_r($data);
//   echo "</pre>";
   $con->close();
 
?>
    <div class="containe" style="margin-top: -4%;margin-left:-2%">
    <table class="table bg-light table-bordered table-hover">
        <thead class=" text-dark" >
                <tr>
                    <th class="text-center text-dark" style="background: yellow;">S.no</th>
                    <th class="text-center text-dark" style="background: yellow;">bill_date</th>
                    <th class="text-center text-dark" style="background: yellow;">customer_name</th>
                    <th class="text-center text-dark" style="background: yellow;">Product Name</th>
                    <th class="text-center text-dark" style="background: yellow;">discount</th>
                    <th class="text-center text-dark" style="background: yellow;">tax</th>
                    <th class="text-center text-dark" style="background: yellow;">total_amount</th>
                    <th class="text-center text-dark" style="background: yellow;">Action</th>
                </tr>
                
            </thead>
           
            <tbody class="text-dark">
                <?php $sn=0;
    // print_r($data);
    if($data=null){
    foreach($data as $info){ ?>
                <tr>
                    <td><?=++$sn;?></td>
                    <td><?=$info["bill_date"]?></td>
                    <td><?=$info["customer_name"];?></td>
                    <td><?=$info["product_name"];?></td>
                    <td><?=$info["discount"]?></td>
                    <td><?=$info["tax"];?></td>
                    <td><?=$info["total_amount"];?></td>
                    <td><a class="btn btn-success">Edit</a>
                    <a class="btn btn-danger">Delete</a>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
    <?php }else echo "<div class='text-danger ml-3'>Not data available</div>";     //$con->close();  }?>
    <?php include "bottam.php"?>
