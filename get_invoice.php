
<?php
  $con=new mysqli("localhost","root","","stock");

    $query="select invoice from invoice order by invoice desc";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result);
    $lastid=$row["invoice"];
        if(empty($lastid)){
            $number="E-0000001";
        }else{
            $idd=str_replace("E-","",$lastid);
            $id=str_pad($idd+1,7,0,STR_PAD_LEFT);
            $number="E-".$id;
    }

    if(isset($_POST["submit"])){
        if(!$con){
            die("connection failed");
        }else{
            $sql="insert into invoice (invoice,product,price)values('$_POST[invoice]','$_POST[product]','$_POST[price]')";
            if(mysqli_query($con,$sql)){
                $query="select invoice from invoice order by invoice desc";
                $result=$con->query($query);
                $data=mysqli_fetch_array($result);
                $lastid=$data["invoice"];
            if(empty($lastid)){
                $number="E-0000001";
                }else{
                    $idd=str_replace("E-","",$lastid);
                    $id=str_pad($idd+1,7,0,STR_PAD_LEFT);
                    $number="E-".$id; 
                }
            }
        }
    }else{
        echo "record added failed";
    }
?>


