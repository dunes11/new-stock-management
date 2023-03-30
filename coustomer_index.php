<?php include "top.php"?>

<?php
    // session_start();
    $limit=10;
   if(isset($_GET["page"])){
        $page=$_GET["page"];
   }else{
    $page=1;
   }
    $offset=($page-1)*$limit;
    $con=new mysqli("localhost","root","","stock");
    $sql="select * from customer order by id asc  limit $offset,$limit";
    $rs=$con->query($sql);
    $data=$rs->fetch_all(1);

    // echo "<pre>";
    // print_r($data);
    // echo "<pre>";
    // exit();
    $blank="images/blank.png";
?>

<div  class="containe" style="margin-top: -2.50%;margin-left:-1%">
<div class="table-responsive">
    <table class="table bg-light table-bordered table-hover">
        <thead class=" text-dark" >
            <tr>
                <th class="text-center text-dark" style="background: yellow;">S.no</th>
                <th class="text-center text-dark" style="background: yellow;">Profile</th>
                <th class="text-center text-dark" style="background: yellow;">Name</th>
                <th class="text-center text-dark" style="background: yellow;">Mobile</th>
                <th class="text-center text-dark" style="background: yellow;">Whatsup no</th>
                <th class="text-center text-dark" style="background: yellow;">E-mail</th>
                <th class="text-center text-dark" style="background: yellow;">Address</th>
                <th class="text-center text-dark" style="background: yellow;">Action</th>
            </tr>
        </thead>
            <?php $sn=0;
    foreach($data as $info){ ?>
            <tbody class="text-dark">
            <tr>
                <td class="bg-primary text-center"><?=++$sn;?></td>
                <td class="text-center"><img src="<?php echo $info["profile"]?$info["profile"]:$blank;?>" class="rimage" style="width:30px"></td>
                <td class="text-center"><?=$info["name"];?></td>
                <td class="text-center"><?=$info["mobile"]?></td>
                <td class="text-center"><?=$info["whatsup_no"];?></td>
                <td class="text-center"><?=$info["email"];?></td>
                <td class="text-center"><?=$info["address"];?></td>
                <td class="text-center"><a class="btn btn-success text-dark"  href="customer_edit.php?id=<?=$info["id"]?>">Edit</a>
                    <a class="btn btn-danger text-dark">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php } //$con->close();  }?>
    </table>
</div>
    <?php
    $sql1="select * from customer";
    $result=mysqli_query($con,$sql1) or die("query failed");
    if(mysqli_num_rows($result)>0){
        $total_records=mysqli_num_rows($result);
       
        $total_page=ceil($total_records/$limit);
        echo '<nav aria-label="Page navigation  example ">'.
        '<ul class="pagination justify-content-center  mt-5">';
        if($page>1){
            echo '<li class="page-item"><a class="page-link" href="coustomer_index.php?page='.($page-1).'">Prev</a></li>';
            
        }
        for($i=1;$i<=$total_page;$i++){
            if($i==$page){
                $active="active";
            }else{
                $active="";
            }
            echo "<li class='page-item $active'><a class='page-link' href='coustomer_index.php?page=$i'>$i</a></li>";    
        }
        if($total_page>$page) {
            echo '<li class="page-item"><a class="page-link" href="coustomer_index.php?page='.($page+1).'">Next</a></li>';
            
        }
        echo "  </ul> ";
    }
    $con->close(); 
?>

  </nav>
    <?php include "bottam.php"?>