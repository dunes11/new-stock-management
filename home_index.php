<?php include "top.php" ?>
<?php
   // session_start();

    
   //$id=$_GET["id"];
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

<div class="containe" style="margin-top: -4%;margin-left:-2%">
    <table class="table bg-light table-bordered table-hover">
        <thead class=" text-dark" >
            <tr>
                <th class="text-center text-dark" style="background: yellow;">S.no</th>
                <th class="text-center text-dark" style="background: yellow;">Category Name</th>
                <th class="text-center text-dark" style="background: yellow;">Company Name</th>
                <th class="text-center text-dark" style="background: yellow;">Product Name</th>
                <th class="text-center text-dark" style="background: yellow;">P_price</th>
                <th class="text-center text-dark" style="background: yellow;">S_danger</th>
                <th class="text-center text-dark" style="background: yellow;">Qty</th>
                <th class="text-center text-dark" style="background: yellow;">Mfg_date</th>
                <th class="text-center text-dark" style="background: yellow;">Exp_date</th>
                <th class="text-center text-dark" style="background: yellow;"></th>
            </tr>
        </thead>

        <?php $sn=0;
    // print_r($data);
   
    foreach($data as $info){ ?>
        <tbody class="text-dark">
            <tr>
                <td class="bg-primary"><?=++$sn;?></td>
                <td><?=$info["category_name"]?></td>
                <td><?=$info["company_name"];?></td>
                <td><?=$info["product_name"]?></td>
                <td><?=$info["p_price"];?></td>
                <td><?=$info["s_price"];?></td>
                <td><?=$info["qty"];?></td>
                <td><?=$info["mfg_date"];?></td>
                <td><?=$info["exp_date"];?></td>
                <td><a class="btn btn-success" href="product_edit.php?id=<?=$info["id"]?>">Edit</a>
                    <a class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php } //$con->close();  }?>
    </table>
</div>
<?php include "bottam.php"?>
</body>
</html>