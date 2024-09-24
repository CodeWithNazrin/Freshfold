<?php
include('./includes/adminnavbar.php');


if(isset($_POST['adminlogin'])){
    $userid=$_POST['userid'];
    $password=$_POST['password'];
$check=$conn->query("SELECT `userid`, `password` FROM `admin` WHERE userid='$userid' and password='$password'");

if($check->num_rows>0){
    while($r=mysqli_fetch_array($check)){
        $userid=$r['userid'];
        $password=$r['password'];
    }
    
    header("location:adminpanel.php");
}
else{
    echo"invalid details";
}
}

?>
<style>
.form-control {
    background-color: #d4d3e3;
}
</style>
<div class="container mt-5 text-center mb-5">
<h2 class="mb-4">Admin Login</h2>
<form action="" method="post" class="d-flex justify-content-center">
    <div class="row">
        <div class="mb-3 col-12">
            <label for="userid" class="form-label">User ID</label>
            <input type="text" class="form-control" id="userid" name="userid" required>
        </div>
        <div class="mb-3 col-12">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            
        </div>
        <button type="submit" class="btn btn-primary" name="adminlogin">Login</button>
    </div>
</form>

</div>
<?php
include ('./includes/adminfooter.php');
?>
  
