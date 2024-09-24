<?php
include('./includes/adminnavbar.php');
?>

<?php

if(isset($_POST['addstaff']))
{
    $name=$_POST['name'];
    $phoneno=$_POST['phoneno'];
    $idproof=$_POST['idproof'];
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $insert=$conn->query("INSERT INTO `staff`(`name`, `phoneno`, `idproof`, `userid`, `password`) VALUES ('$name','$phoneno','$idproof','$userid','$password')");
}

   ?>
    <style>
.form-control {
    background-color: #d4d3e3;
}
</style>
<div class="container mt-5 text-center mb-5">
<h2 class="mb-4">Add Staff</h2>
<form action="" method="post" class="d-flex justify-content-center">
    <div class="row">
        <div class="mb-3 col-5">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3 col-5">
            <label for="Phone No" class="form-label">Phone No</label>
            <input type="Phone No" class="form-control" id="phoneno" name="phoneno" required>
         </div>
         <div class="mb-3 col-5">
            <label for="ID Proof" class="form-label">ID Proof</label>
            <input type="ID Proof" class="form-control" id="idproof" name="idproof" required>
        </div>
        <div class="mb-3 col-5">
            <label for="User ID" class="form-label">User ID</label>
            <input type="User ID" class="form-control" id="userid" name="userid" required>
        </div>
        <div class="mb-3 col-5">
            <label for="Password" class="form-label">Password</label>
            <input type="Password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="addstaff">Submit</button>
    </div>
</form>

</div>
<?php
include ('./includes/adminfooter.php');
?>







