<?php
session_start();
include "top.php"?>


<div class="container  w-25 mt-5">
    <div class="alert  text-center text-light"
        style="width:100.30%;margin-left:-2px;border-radius:0;background-color:green">
        <h3>Add company</h3>
    </div>
    <form method="post" action="store.php">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Comapany name</label>
            <input type="text" name="name" required placeholder="Enter category" class="form-control"
                id="exampleInputPassword1">
            <!-- </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" placeholder="Password" required class="form-control" id="exampleInputPassword1">
  </div> -->
            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-success" name="company">Submit</button>
            </div>
    </form>
</div>
<?php include "bottam.php"?>