<?php include "top.php"?>

<?php
    session_start();
    $con=new mysqli("localhost","root","","stock");
    $sql="select * from customer";
    $rs=$con->query($sql);
    $data=$rs->fetch_all(1);

    // echo "<pre>";
    // print_r($data);
    // echo "<pre>";
    // exit();

?>

    <table class="table mt-3">
        <thead class="table table-dark">
            <tr>
                <th>S.no</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Whatsup</th>
                <th>E-mail</th>
                <th>Addrss</th>
            </tr>
        </thead>
        <tbody>
            <?php $sn=0;
    // print_r($data);
   
    foreach($data as $info){ ?>
            <tr>
                <td><?=++$sn;?></td>
                <td><?=$info["profile"]?></td>
                <td><?=$info["name"];?></td>
                <td><?=$info["mobile"]?></td>
                <td><?=$info["whatsup_no"];?></td>
                <td><?=$info["email"];?></td>
                <td><?=$info["address"];?></td>
            </tr>
        </tbody>
        <?php } //$con->close();  }?>
    </table>
    <?php include "bottam.php"?>