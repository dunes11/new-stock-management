<?php include "top.php" ?>
<?php
   // session_start();
   $con=new mysqli("localhost","root","","stock");
   $sql="select * from company";
   $rs=$con->query($sql);
//    $con->close();
   $data=$rs->fetch_all(1);
  // $data=mysqli_fetch_assoc($rs,);
  //print_r($data);
   $con->close();
?>

<div class="container" style="margin-top: -4%;margin-left:-2%">
    <table class="table bg-light table-bordered table-hover">
        <thead class=" text-dark" >
            <tr>
                <th class="text-center text-dark" style="background: yellow;">S.no</th>
                <th class="text-center text-dark" style="background: yellow;">Company Name</th>
                <th class="text-center text-dark" style="background: yellow;">Action</th>

            </tr>
        </thead>

        <?php $sn=0;
    // print_r($data);
   
    foreach($data as $info){ ?>
        <tbody class="text-dark">
            <tr>
                <td class="bg-primary"><?=++$sn;?></td>
                <td><?=$info["name"];?></td>
                <td><a class="btn btn-success">Edit</a>
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