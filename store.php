<?php
    $dbname="mysql:host=localhost;dbname=stock";
    $username="root";
    $pass="";
 
    $con=new PDO($dbname,$username,$pass);

    // $id=$_GET["id"];
    isset($_GET["id"])?$id=$_GET["id"]:null;
    if(isset($_POST["product"])){
    $sql="insert into product(category_id,company_id,product_name,p_price,s_price,qty,mfg_date,exp_date)value('$_POST[category_id]','$_POST[company_id]','$_POST[product_name]','$_POST[p_price]','$_POST[s_price]','$_POST[qty]','$_POST[mfg_date]','$_POST[exp_date]')";
    if($con->query($sql)){
       // echo "success"; 
        header("Location:home_index.php");
    }else{
        echo "query error";
    }
}

    if(isset($_POST["categories"])){
        $sql2="insert into categories(name)value('$_POST[name]')";
    if($con->query($sql2)){
        header("Location:home_index.php");
    }else{
        echo "query error";
    }
}

    if(isset($_POST["company"])){
        $sql3="insert into company(name)value('$_POST[name]')";
    if($con->query($sql3)){
        header("Location:home_index.php");
    }else{
        echo "query error";
    }
}
if(isset($_POST["bill"])){
    //$sql4="insert into invoice(invoice)value('$_POST[invoice]')";
  echo  $sql5="insert into billing(customer_id,product_id,bill_date,total_amount,invoice_id,quantity,product_price)
    value('$_POST[customer_id]','$_POST[product_id]','$_POST[bill_date]','$_POST[total_amount]','$_POST[discount]','$_POST[tax]')";
    // customer_id	product_id	bill_date	total_amount	invoice_id	quantity	product_price	

if($con->query($sql5)){
    //echo "success fully done";
    header("Location:home_index.php");
}else{
    echo "query error";
}
}
    if(isset($_POST["customer"])){
        
        if(isset($_POST["customer"])){
            if(($_FILES["profile"]['error']!=4)){
               $valid=["jpg","img"];
              // $valid2=["pdf","html","htm","php","txt","css"];
               $type=strtolower(pathinfo($_FILES["profile"]["name"],PATHINFO_EXTENSION));
               
               if(in_array($type,$valid)){
               $to="images/".$_FILES['profile']["name"]."/";
               $from=$_FILES['profile']['tmp_name'];
               if(move_uploaded_file($from,$to)){
                   echo "uploaded succesfully";
               }else{
                   echo "file type not matched";
               }
           }
       }
        $sql4="insert into customer(profile,name,mobile,whatsup_no,email,address)value('$to','$_POST[name]','$_POST[mobile]','$_POST[whatsup_no]','$_POST[email]','$_POST[address]')";
        if($con->query($sql4)){
            echo "success fully";
            //header("Location:home_index.php");
    }else{
        echo "query error";
    }
}
}
if(isset($_POST["product_update"]) and isset($_GET["id"])){
   $sql3="update product set category_id='$_POST[category_id]',company_id='$_POST[company_id]',product_name='$_POST[product_name]',p_price='$_POST[p_price]',s_price='$_POST[s_price]',qty='$_POST[qty]',mfg_date='$_POST[mfg_date]',exp_date='$_POST[exp_date]' where id=$id";
if($con->query($sql3)){
    //echo "success";
    header("Location:home_index.php");
}else{
    echo "query error";
}
}

if(isset($_POST["profile_update"])){
        
    if(isset($_POST["profile_update"])){
        if(($_FILES["profile"]['error']!=4)){
           $valid=["jpg","img"];
          // $valid2=["pdf","html","htm","php","txt","css"];
           $type=strtolower(pathinfo($_FILES["profile"]["name"],PATHINFO_EXTENSION));
           
           if(in_array($type,$valid)){
           $to="images/".$_FILES['profile']["name"]."/";
           $from=$_FILES['profile']['tmp_name'];
           if(move_uploaded_file($from,$to)){
               echo "uploaded succesfully";
           }else{
               echo "file type not matched";
           }
       }
   }
    $sql4="insert into customer(profile,name,mobile,whatsup_no,email,address)value('$to','$_POST[name]','$_POST[mobile]','$_POST[whatsup_no]','$_POST[email]','$_POST[address]')";
    if($con->query($sql4)){
        echo "success fully";
        //header("Location:home_index.php");
}else{
    echo "query error";
}
}
}
?>