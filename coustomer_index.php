<?php include "top.php"?>

<?php
    // session_start();
    $con=new mysqli("localhost","root","","stock");
    $sql="select * from customer";
    $rs=$con->query($sql);
    $data=$rs->fetch_all(1);

    // echo "<pre>";
    // print_r($data);
    // echo "<pre>";
    // exit();

?>

<div class="container ">
    <table class="table bg-light table-bordered table-hover">
        <thead class=" text-dark" >
            <tr>

                <th class="text-center text-dark" style="background: yellow;">S.no</th>
                <th class="text-center text-dark" style="background: yellow;">profile</th>
                <th class="text-center text-dark" style="background: yellow;">name</th>
                <th class="text-center text-dark" style="background: yellow;">mobile</th>
                <th class="text-center text-dark" style="background: yellow;">whatsup_no</th>
                <th class="text-center text-dark" style="background: yellow;">email</th>
                <th class="text-center text-dark" style="background: yellow;">address</th>
                <th class="text-center text-dark" style="background: yellow;">Action</th>
            </tr>
        </thead>
            <?php $sn=0;
    foreach($data as $info){ ?>
            <tbody class="text-dark">
            <tr>
                <td class="bg-primary"><?=++$sn;?></td>
                <td><img src="<?php echo $info["profile"]?$info["profile"]:$blank;?>" class="rimage" style="width:30px"></td>
                <td><?=$info["name"];?></td>
                <td><?=$info["mobile"]?></td>
                <td><?=$info["whatsup_no"];?></td>
                <td><?=$info["email"];?></td>
                <td><?=$info["address"];?></td>
                <td><a class="btn btn-success"  href="customer_edit.php?id=<?=$info["id"]?>">Edit</a>
                    <a class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php } //$con->close();  }?>
    </table>
    <?php include "bottam.php"?>