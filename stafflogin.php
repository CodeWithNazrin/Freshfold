<?php
include('./includes/adminnavbar.php'); // Including the admin navbar

if (isset($_POST['stafflogin'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $check = $conn->query("SELECT `userid`, `password` FROM `staff` WHERE userid='$userid' and password='$password'");

    if ($check->num_rows > 0) {
        echo "<script> alert('user exist');</script>";
        while($r=mysqli_fetch_array(result:$check))
        $_SESSION['user_id'] = $userid;
        $_SESSION['role'] = "staff";
        header("location:staffpanel.php");
    } else {
        echo "<script>alert('Invalid UserID or Password')</script>";
    }
}
?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f4f7fa; /* Light background for a clean look */
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center; /* Center content vertically */
        margin: 0;
    }

    .container {
        background: white;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin: auto; /* Center the container */
    }

    h2 {
        color: #333; /* Darker color for text */
        margin-bottom: 20px;
        text-align: center;
    }

    .form-control {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        height: 40px;
        transition: border-color 0.3s;
        margin-bottom: 15px; /* Spacing between fields */
    }

    .form-control:focus {
        border-color: #6a11cb; /* Highlight on focus */
        box-shadow: 0 0 5px rgba(106, 17, 203, 0.3);
    }

    .btn-primary {
        background-color: #6a11cb;
        border: none;
        border-radius: 4px;
        padding: 10px;
        font-size: 16px;
        color: white; /* Text color for button */
        width: 100%;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #5a09b8; /* Darker shade on hover */
    }
</style>

<div class="container">
    <h2>Staff Login</h2>
    <form action="" method="post">
        <div class="mb-3">
            <label for="userid" class="form-label">User ID</label>
            <input type="text" class="form-control" id="userid" name="userid" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="stafflogin">Login</button>
    </form>
</div>

<?php
include('./includes/adminfooter.php'); // Including the admin footer
?>
