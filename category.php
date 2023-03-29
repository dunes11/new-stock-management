<?php
//session_start();
include "top.php"?>
<?php
$dsn = 'mysql:host=localhost;dbname=stock';
$username = 'root';
$password = '';
 $pdo = new PDO($dsn, $username, $password);
try {
        if(isset($_POST['categories'])) {
            if(isset($_POST['name'])){
                $sql="SELECT * FROM categories WHERE  name LIKE '%$_POST[name]%'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
            if(isset($_POST["categories"])){
               
                  
                   $sql = $sql3="insert into categories(name)value(:name)";
                   $stmt = $pdo->prepare($sql);
                  
                  
                   $stmt->bindParam(':name',$_POST['name']);
               
                      
                   $stmt->execute();
                   echo "<div class='container alert' id='myAlert' style='background-color:#2EFE2E;border-radius:0;'>";
                   echo "<h3 class='text-dark text-center'>Succesfully inserted</h3>";
                   echo "</div>";
               }
           }
        
        //echo 'Data inserted successfully.';
        } catch (PDOException $e) {
            $error=$stmt->errorInfo();
            if($error[1]){
                // echo $error[2];
                // Duplicate entry 'symphony' for key 'name'
                $mass = str_replace(" key","", $error);
               // echo $mass;
                echo "<div id='myAlert' class='container alert' style='background-color:#FE2E2E;border-radius:0;'>";
                echo "<div class='text-dark fw-bold text-center'>$mass[2] already in list</div>";
                echo "</div>";
            }
        }
        ?>
<div class="container   mt-5">
    <div class="alert  text-center text-light"
        style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
        <h3>Add category</h3>
    </div>
    <form method="post" >
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category name</label>
            <input type="text" name="name" required placeholder="Enter category" class="form-control"
                id="exampleInputPassword1">
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-success" name="categories">Submit</button>
            </div>
    </form>
</div>
<?php include "bottam.php"?>