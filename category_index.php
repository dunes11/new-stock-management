<?php include "top.php" ?>
<?php
   // session_start();
   $con=new mysqli("localhost","root","","stock");
   $sql="SELECT * from categories";
   $rs=$con->query($sql);
//    $con->close();
   $data=$rs->fetch_all(1);
  // $data=mysqli_fetch_assoc($rs,);
  //print_r($data);
   $con->close();
?>

<div class="containe" style="margin-top: -3%;margin-left:-2%">
<div class="table-responsive">
    <table class="table bg-light table-bordered table-hover">
        <thead class=" text-dark" >
            <tr>
                <th class="text-center text-dark" style="background: yellow;">S.no</th>
                <th class="text-center text-dark" style="background: yellow;">Category Name</th>
                <th class="text-center text-dark" style="background: yellow;">Action</th>
            </tr>
        </thead>

        <?php $sn=0;
    // print_r($data);
   
    foreach($data as $info){ ?>
        <tbody class="text-dark">
            <tr>
                <td class="bg-primary text-center"><?=++$sn;?></td>
                <td class="text-center"><?=$info["name"]?></td>
                <td class="text-center"><a class="btn btn-success text-dark">Edit</a>
                    <a class="btn btn-danger text-dark">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php } //$con->close();  }?>
    </table>
</div>
</div>
<?php include "bottam.php"?>
