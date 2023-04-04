<!-- <script>
    alert("Login successfully")
</script> -->
<?php include "top.php" ?>
<?php


   //$id=$_GET["id"];
   $limit=10;
   if(isset($_GET["page"])){
        $page=$_GET["page"];
   }else{
    $page=1;
   }
    $offset=($page-1)*$limit;
   $con=new mysqli("localhost","root","","stock");
   $sql="SELECT product.id, product.product_name, product.p_price, product.s_price, product.qty,product.mfg_date,
   product.exp_date, company.name AS company_name, categories.name AS category_name FROM product JOIN company ON product.company_id = company.id 
   JOIN categories ON product.category_id = categories.id order by product.id asc limit $offset,$limit";
   $rs=$con->query($sql);
//    $con->close();
   $data=$rs->fetch_all(1);
  // $data=mysqli_fetch_assoc($rs,);
  //print_r($data);
    
?>
<script>
    setTimeout(()=>{
    alert("Login successfully")
    
    },500)
</script>
<div class="containe" style="margin-top: -2.50%;margin-left:-1%">
<div class="table-responsive">
    <table class="table bg-light table-bordered table-hover">
        <thead class=" text-dark" >
            <tr>
                <th class="text-c   enter text-dark" style="background: yellow;">S.no</th>
                <th class="text-center text-dark" style="background: yellow;">Category Name</th>
                <th class="text-center text-dark" style="background: yellow;">Company Name</th>
                <th class="text-center text-dark" style="background: yellow;">Product Name</th>
                <th class="text-center text-dark" style="background: yellow;">Purchase price</th>
                <th class="text-center text-dark" style="background: yellow;">Selling price</th>
                <th class="text-center text-dark" style="background: yellow;">quantity</th>
                <th class="text-center text-dark" style="background: yellow;">Mfg date</th>
                <th class="text-center text-dark" style="background: yellow;">Exp date</th>
                <th class="text-center text-dark" style="background: yellow;">Action</th>
            </tr>
        </thead>
        <?php $sn=0;
    // print_r($data);
   
    foreach($data as $info){ ?>
        <tbody class="text-dark">
            <tr>
                <td class="bg-primary text-center"><?=++$sn;?></td>
                <td class="text-center"><?=$info["category_name"]?></td>
                <td class="text-center"><?=$info["company_name"];?></td>
                <td class="text-center"><?=$info["product_name"]?></td>
                <td class="text-center"><?=$info["p_price"];?></td>
                <td class="text-center"><?=$info["s_price"];?></td>
                <td class="text-center"><?=$info["qty"];?></td>
                <td class="text-center"><?=$info["mfg_date"];?></td>
                <td class="text-center"><?=$info["exp_date"];?></td>
                <td class="text-center"><a class="btn btn-success text-dark" href="product_edit.php?id=<?=$info["id"]?>">Edit</a>
                    <a class="btn btn-danger text-dark">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php } //$con->close();  }?>
    </table>
</div>
</div>
<?php
    $sql1="select * from product";
    $result=mysqli_query($con,$sql1) or die("query failed");
    if(mysqli_num_rows($result)>0){
        $total_records=mysqli_num_rows($result);
       
        $total_page=ceil($total_records/$limit);
        echo '<nav aria-label="Page navigation  example ">'.
        '<ul class="pagination justify-content-center  mt-5">';
        if($page>1){
            echo '<li class="page-item"><a class="page-link" href="home_index.php?page='.($page-1).'">Prev</a></li>';
            
        }
        for($i=1;$i<=$total_page;$i++){
            if($i==$page){
                $active="active";
            }else{
                $active="";
            }
            echo "<li class='page-item $active'><a class='page-link' href='home_index.php?page=$i'>$i</a></li>";    
        }
        if($total_page>$page) {
            echo '<li class="page-item"><a class="page-link" href="home_index.php?page='.($page+1).'">Next</a></li>';
            
        }
        echo "  </ul> ";
    }
    $con->close(); 
?>

  </nav>
<?php include "bottam.php"?>

