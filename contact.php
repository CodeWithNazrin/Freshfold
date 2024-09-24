<?php
include('./includes/navbar.php');
?>
<?php
if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $insert=$conn->query("INSERT INTO `feedback`(`name`, `email`, `message`) VALUES ('$name','$email','$message')");

    $res = $conn->query("SELECT * FROM `feedback` WHERE `name`='$name'") ;

    if ($res->num_rows == 1) {
        while($r=mysqli_fetch_array($res))
        {

                $_SESSION['name'] = $r['name'];
                $_SESSION['email'] = $r['email'];
                $_SESSION['message'] = $r['message'];

           
            } 
        }
        
    } 

?>
<style>
    .form-control {
        background-color: #d4d3e3;
    }
</style>
<div class="container mt-5 text-center mb-5">
    <h2 class="mb-4">Feedback</h2>
    <form action="" method="post" class="d-flex justify-content-center">
        <div class="row">
            <div class="mb-3 col-12">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control"  name="name" required>
            </div>
            <div class="mb-3 col-12">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control"  name="email" required>
            </div>
            <div class="mb-3 col-12">
                <label for="Message" class="form-label">Message</label>
                <input type="text" class="form-control"  name="message" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">submit</button>
        </div>
    </form>
</div>
<?php
include('./includes/footer.php');
?>

