<?php
include ('./includes/navbar.php');

if (isset($_POST['login'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Confirm the password match
    if ($password == $confirmpassword) {
        // Query to fetch the user by User ID
        $res = $conn->query("SELECT * FROM user WHERE userid='$userid'");

        if ($res->num_rows == 1) {
            $r = mysqli_fetch_array($res);

            // Compare the password from the form and the database (not hashed)
            if ($password == $r['password']) {
                // Set session variables
                $_SESSION['user_id'] = $r['userid'];
                $_SESSION['user_name'] = $r['name'];
                $_SESSION['photo'] = $r['photo'];

                // Redirect to a welcome page or dashboard
                header("Location: category.php");
                exit();
            } else {
                echo "<script>alert('Password incorrect')</script>";
            }
        } else {
            echo "<script>alert('Invalid User ID')</script>";
        }
    } else {
        echo "<script>alert('Please confirm your password correctly')</script>";
    }
}
?>
<style>
    body {
        background-color: #f4f7f6;
    }
    .form-container {
        background-color: white;
        border-radius: 8px;
        padding: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 50px; /* Add space below the form */
    }
    .form-control {
        background-color: #eef0f7;
    }
    .btn-primary {
        background-color: #5a67d8;
        border-color: #5a67d8;
    }
    .btn-primary:hover {
        background-color: #434190;
        border-color: #434190;
    }
    .form-label {
        font-weight: 500;
    }
    h2 {
        color: #5a67d8;
        font-weight: 600;
    }
</style>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="form-container col-md-6">
        <h2 class="mb-4 text-center">Login</h2>
        <form action="" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="userid" class="form-label">User ID</label>
                <input type="text" class="form-control" id="userid" name="userid" required>
                <div class="invalid-feedback">Please provide your User ID.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div class="invalid-feedback">Please provide your password.</div>
            </div>
            <div class="mb-3">
                <label for="confirmpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
                <div class="invalid-feedback">Please confirm your password.</div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </div>
        </form>
    </div>
</div>
<?php
include ('./includes/footer.php');
?>
