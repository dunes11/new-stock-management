
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>	
<div class="container border w-25 mt-3" >
        <div class="alert alert-success text-center text-dark" style="width:108.30%;margin-left:-13px;border-radius:0">
            <h3>Add product</h3>
        </div>
<form method="post" enctype="multipart/form-data" action="store.php">

    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Customer name</label>
    <input type="text" name="name" required placeholder="Enter customer name" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mobile</label>
    <input type="number" name="mobile" placeholder="Enter purchase price" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Whatsup no</label>
    <input type="number" name="whatsup_no" placeholder="Enter whatsup number" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">E-mail</label>
    <input type="email" name="email" placeholder="Enter your e-mail" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Address</label>
    <input type="" name="address" placeholder="Enter your address" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Upload profile pic</label>
    <input type="file" name="profile"  required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="d-grid gap-2 mt-3">
  <button type="submit" class="btn btn-success" name="customer">Submit</button>
</div>
    </form>
    </div>
    </div>
</body>
</html>