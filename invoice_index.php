<?php include "top.php"?>
<?php
    //session_start();
    $limit=10;
    if(isset($_GET["page"])){
         $page=$_GET["page"];
    }else{
     $page=1;
    }
     $offset=($page-1)*$limit;
   $con=new mysqli("localhost","root","","stock");
   $sql="SELECT billing.id, billing.bill_date, billing.total_amount,billing.invoice_id,billing.quantity, customer.name AS customer_name, product.product_name AS product_name,product.s_price AS product_price FROM billing JOIN customer ON billing.customer_id = customer.id JOIN product ON billing.product_id = product.id order by billing.id desc limit $offset,$limit";
   $rs=$con->query($sql);
//    $con->close();
   $data=$rs->fetch_all(1);
  // $data=mysqli_fetch_assoc($rs,);
//   echo "<pre>";
//   print_r($data);
//   echo "</pre>";

 
?>
    <div class="containe" style="margin-top: -2.50%;margin-left:-1%">
    <div class="table-responsive table-responsive-md table-responsive-lg table-responsive-sm">
    <table class="table bg-light table-bordered table-hover">
        <thead class=" text-dark" >
                <tr>
                    <th class="text-center text-dark" style="background: yellow;">S.no</th>
                    <th class="text-center text-dark" style="background: yellow;">Bill date</th>
                    <th class="text-center text-dark" style="background: yellow;">Invoice number</th>
                    <th class="text-center text-dark" style="background: yellow;">Customer name</th>
                    <th class="text-center text-dark" style="background: yellow;">Product Name</th>
                    <th class="text-center text-dark" style="background: yellow;">Product price</th>
                    <th class="text-center text-dark" style="background: yellow;">Purchase quantity</th>
                    <th class="text-center text-dark" style="background: yellow;">Total amount</th>
                    <th class="text-center text-dark" style="background: yellow;">Action</th>
                </tr>
                
            </thead>
           
            <tbody class="text-dark">
                <?php $sn=0;
    // print_r($data);
    foreach($data as $info){ ?>
                <tr>
                    <td class="bg-primary text-center text-dark"><?=++$sn;?></td>
                    <td class="text-center"><?=$info["bill_date"]?></td>
                    <td class="text-center"><?=$info["invoice_id"];?></td>
                    <td class="text-center"><?=$info["customer_name"];?></td>
                    <td class="text-center"><?=$info["product_name"];?></td>
                    <td class="text-center"><?=$info["product_price"];?></td>
                    <td class="text-center"><?=$info["quantity"];?></td>
                    <td class="text-center"><?=$info["total_amount"]?></td>
                    <td class="text-center"><a class="btn btn-success text-dark">Edit</a>
                    <a class="btn btn-primary text-dark" href="invoice_view.php?id=<?=$info["id"]?>">View invoice</a>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
    </div>
    <?php
    $sql1="select * from billing";
    $result=mysqli_query($con,$sql1) or die("query failed");
    if(mysqli_num_rows($result)>0){
        $total_records=mysqli_num_rows($result);
       
        $total_page=ceil($total_records/$limit);
        echo '<nav aria-label="Page navigation  example ">'.
        '<ul class="pagination justify-content-center  mt-5">';
        if($page>1){
            echo '<li class="page-item"><a class="page-link" href="invoice_index.php?page='.($page-1).'">Prev</a></li>';
            
        }
        for($i=1;$i<=$total_page;$i++){
            if($i==$page){
                $active="active";
            }else{
                $active="";
            }
            echo "<li class='page-item $active'><a class='page-link' href='invoice_index.php?page=$i'>$i</a></li>";    
        }
        if($total_page>$page) {
            echo '<li class="page-item"><a class="page-link" href="invoice_index.php?page='.($page+1).'">Next</a></li>';
            
        }
        echo "  </ul> ";
    }
    $con->close(); 
?>

  </nav>
    <?php include "bottam.php"?>

