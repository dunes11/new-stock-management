<?php include "top.php" ?>
<?php
          if(isset($_SESSION['username'])){
            // $navbar = "1";
            // $logindisplay = "0";
            $username = $_SESSION['username'];
            //$password = $_SESSION['password'];
        } else {
            header('Location:404.php');
        }
        $dsn = 'mysql:host=localhost;dbname=stock';
        $username = 'root';
        $password = '';
        $pdo = new PDO($dsn, $username, $password);
        
        try {
        if(isset($_POST['customer'])) {
            if(isset($_POST['name']) && ($_POST['mobile'])){
                $sql="SELECT * FROM customer WHERE  name LIKE '%$_POST[name]%' and mobile LIKE '%$_POST[mobile]%'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST["customer"])){
                if(($_FILES["profile"]['error']!=4)){
                   $valid=["jpg","img"];
                  // $valid2=["pdf","html","htm","php","txt","css"];
                   $type=strtolower(pathinfo($_FILES["profile"]["name"],PATHINFO_EXTENSION));
                   
                   if(in_array($type,$valid)){
                   $to="images/".$_FILES['profile']["name"];
                   $from=$_FILES['profile']['tmp_name'];
                   if(move_uploaded_file($from,$to)){
                       //echo "uploaded succesfully";
                   }else{
                       echo "file type not matched";
                   }
                   $sql = 'INSERT INTO customer (profile,name,mobile,whatsup_no,email,address) VALUES (:profile, :name, :mobile, :whatsup_no, :email, :address)';
                   $stmt = $pdo->prepare($sql);
                  
                   $stmt->bindParam(':profile',$to);
                   $stmt->bindParam(':name',$_POST['name']);
                   $stmt->bindParam(':mobile',$_POST['mobile']);
                   $stmt->bindParam(':whatsup_no',$_POST['whatsup_no']);
                   $stmt->bindParam(':email',$_POST['email']);
                   $stmt->bindParam(':address',$_POST['address']);
                      
                   $stmt->execute();
                   echo "<div class='container alert' id='myAlert' style='background-color:#2EFE2E;border-radius:0;'>";
                   echo "<h3 class='text-dark text-center'>Succesfully inserted</h3>";
                   echo "</div>";
               }
           }
        }
    }
        //echo 'Data inserted successfully.';
        } catch (PDOException $e) {
            $error=$stmt->errorInfo();
            if($error[1]){
                $mass = str_replace(" key","", $error);
               // echo $mass;
                echo "<div id='myAlert' class='container alert' style='background-color:#FE2E2E;border-radius:0;'>";
                echo "<div class='text-dark fw-bold text-center'>$mass[2] already in list</div>";
                echo "</div>";
            }
        }
?>

<div class="container  mt-3">
        <div class="alert  text-center text-light" style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
            <h3>Add customer</h3>
            <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:2%;"> <span style="font-size:10px;color:black;" class="fw-bold">fields are required</span>
        </div>
        <form method="post" enctype="multipart/form-data" >

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Customer name</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="text" name="name" required placeholder="Enter customer name" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mobile</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="number" name="mobile" placeholder="Enter purchase price" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Whatsup no</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="number" name="whatsup_no" placeholder="Enter whatsup number" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">E-mail</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="email" name="email" placeholder="Enter your e-mail" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="" name="address" placeholder="Enter your address" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Upload profile pic</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="file" name="profile"  class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-success" name="customer">Submit</button>
            </div>
        </form>
    </div>
    </div>
    <?php include "bottam.php"?>