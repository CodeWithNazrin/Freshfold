<?php
include ('./includes/navbar.php');
?>
<?php

if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if($password==$confirmpassword){

    


    $res = $conn->query("SELECT * FROM `user` WHERE `userid`='$userid'") ;

    if ($res->num_rows == 1) {
        while($r=mysqli_fetch_array($res))
        {
            if ($password == $r['password']) {

                $_SESSION['user_id'] = $r['userid'];
                $_SESSION['user_name'] = $r['name'];
                $_SESSION['photo'] = $r['photo'];
    
                // Redirect to a welcome page or dashboard
                header("Location: category.php");
           
            } else {
               
                echo "<script>alert('Password incorrect,correct is $og')</script>";
            }
        }
        
    } else {
        echo "<script>alert('Invalid Userid ')</script>";
    }

}
else{
    echo "<script>alert('please confirm your password ')</script>";
}
}
?><?php

if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];


    $res = $conn->query("SELECT * FROM `user` WHERE `userid`='$userid'") ;

    if ($res->num_rows == 1) {
        while($r=mysqli_fetch_array($res))
        {
            if (password_verify($password, $r['password'])) {

                $_SESSION['user_id'] = $r['userid'];
                $_SESSION['user_name'] = $r['name'];
    
                // Redirect to a welcome page or dashboard
                header("Location: category.php");
           
            } else {
                echo "<script>alert('Password incorrect')</script>";
            }
        }
        
    } else {
        echo "<script>alert('Invalid Userid ')</script>";
    }

}

?>
<style>
    .form-control {
        background-color: #d4d3e3;
    }
</style>
<div class="container mt-5 text-center">
    <h2 class="mb-4">Login</h2>
    <form action="" method="post" class="d-flex justify-content-center">
        <div class="row">
            <div class="mb-3 col-12">
                <label for="userid" class="form-label">User ID</label>
                <input type="text" class="form-control" id="userid" name="userid" required>
            </div>
            <div class="mb-3 col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required><br>
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </div>
    </form>
</div>
<?php
include ('./includes/footer.php');
?>