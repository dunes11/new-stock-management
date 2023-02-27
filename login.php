
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body style="background-color:#0d0d0d;">
    
 



    <?php
     session_start(); 
    include ("db.php");
    $con=new mysqli("localhost","root","","stock");
    $a="";
    $count=null;

    if(isset($_POST['submit']) ) { 
        $username = $_POST['name'];  
        $password = $_POST['password'];   
      
        $sql = "select * from admin where name = '$username' and password = '$password'";  
        $rs= $con->query($sql);  
        $row = mysqli_fetch_array($rs, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($rs);  
        $_SESSION["username"]=$username; 
        $_SESSION["password"]=$password;
        try{  
        if($count == 1){
            header("Location:home_index.php");
            // echo "<h1><center> Login successful </center></h1>";            
        }  
        throw new Exception("Plz enter valid username and password");  
    }catch(Exception $e){
           $a= $e->getMessage();
    }
}        
?>


    <div class="container w-50" style="margin-top:15%">
        <div class=" text-center text-primary" style="width:102.30%;margin-left:-13px;border-radius:0">
            <h3>Login</h3>
            <?php if(!$count == 1){ 
                
                   echo "<div class='text-danger'>".$a."</div>"; 
            } ?>
        </div>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-light">Username</label>
                <input type="text" name="name" required placeholder="Enter username" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label text-light">Password</label>
                <input type="password" name="password" placeholder="Password" required class="form-control">
                <label for="exampleInputPassword1" class="form-label text-light">narayan123</label>
              
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" name="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>