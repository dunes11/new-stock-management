<?php include "top.php"; ?>
<?php
        $dsn = 'mysql:host=localhost;dbname=stock';
        $username = 'root';
        $password = '';
        $pdo = new PDO($dsn, $username, $password);
        
        try {
        if(isset($_POST['product'])) {
            if(isset($_POST['company_id']) && ($_POST['product_name'])){
                $sql="SELECT * FROM product WHERE  company_id LIKE '%$_POST[company_id]%' and product_name LIKE '%$_POST[product_name]%'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
        $sql = 'INSERT INTO product (category_id,company_id,product_name,p_price,s_price,qty,mfg_date,exp_date) VALUES (:category_id, :company_id, :product_name, :p_price, :s_price, :qty, :mfg_date, :exp_date)';
        $stmt = $pdo->prepare($sql);
         
        $stmt->bindParam(':category_id',$_POST['category_id']);
        $stmt->bindParam(':company_id',$_POST['company_id']);
        $stmt->bindParam(':product_name',$_POST['product_name']);
        $stmt->bindParam(':p_price',$_POST['p_price']);
        $stmt->bindParam(':s_price',$_POST['s_price']);
        $stmt->bindParam(':qty',$_POST['qty']);
        $stmt->bindParam(':mfg_date',$_POST['mfg_date']);
        $stmt->bindParam(':exp_date',$_POST['exp_date']);
        
        $stmt->execute();
        echo "<div class='container alert' id='myAlert' style='background-color:#2EFE2E;border-radius:0;'>";
        echo "<h3 class='text-dark text-center'>Succesfully inserted</h3>";
        echo "</div>";
        } 
        
        //echo 'Data inserted successfully.';
        } catch (PDOException $e) {
            $error=$stmt->errorInfo();
            if($error[1]){
                $mass = str_replace(" key 'product_name'", "", $error);
               // echo $mass;
                echo "<div id='myAlert' class='container alert' style='background-color:#FE2E2E;border-radius:0;'>";
                echo "<div class='text-dark fw-bold text-center'>$mass[2] Product name already in list</div>";
                echo "</div>";
            }
        }
?>

<?php
    $con=new mysqli("localhost","root","","stock");
    $sql="select id,name from categories";
    $sql2="select id,name from company";
    $rs=$con->query($sql);
        if($rs->num_rows> 0){
            $data= mysqli_fetch_all($rs, MYSQLI_ASSOC);
      }

    $rs=$con->query($sql2);
        if($rs->num_rows> 0){
            $data2= mysqli_fetch_all($rs, MYSQLI_ASSOC);
    }  
   // $con->close();
?>

    <div class="container  mt-3">
        <div class="alert  text-center text-light" style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
            <h3>Add product</h3>
            <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:2%;"> <span style="font-size:10px;color:black;" class="fw-bold">fields are required</span>
        </div>
        <form method="post">

            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Select Category</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <select class="form-select bg-light fw-bold" name="category_id" aria-label="Default select example">
                    <option selected>Select Category</option>
                    <?php
        foreach($data as $info){{ ?>
                    <option value="<?=$info["id"];?>"><?=$info["name"];?></option>
                    <?php }}?>
                </select>
            </div>

            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Select company</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <select class="form-select bg-light fw-bold" name="company_id" aria-label="Default select example">
                    <option selected>Select company</option>
                    <?php
        foreach($data2 as $info2){ ?>
                    <option value="<?=$info2["id"];?>"><?=$info2["name"];?></option>
                    <?php } ?>
                </select>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Product name</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="text" name="product_name" required placeholder="Enter product name" class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Purchase price</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="number" name="p_price" placeholder="Enter purchase price" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Selling price</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="number" name="s_price" placeholder="Selling price" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Qty</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="number" name="qty" placeholder="Quantity" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Manufacturing date</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="date" name="mfg_date" placeholder="Enter manufacturing date" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Expiary date</label> <img class="sidebar-brand brand-logo" src="images/medical.png" style="width:.80%;">
                <input type="date" name="exp_date" placeholder="Enter expiary date" required class="form-control"
                    id="exampleInputPassword1">
            </div>
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-success" name="product">Submit</button>
            </div>
        </form>
    </div>

    <?php include "bottam.php"?>