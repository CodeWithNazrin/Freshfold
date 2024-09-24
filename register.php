<?php
include ('./includes/navbar.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $userid = $_POST['userid'];
    $password = $_POST['password']; // Hash the password
    $address = $_POST['address'];
    $phone= $_POST['phone'];
    $email = $_POST['email'];
    $location = $_POST['location'];

    $target_file = "uploads/" . basename($_FILES["photo"]["name"]); // uploads/dan-gold-aJN-jjFLyCU-unsplash
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $photo = $target_file;
        }
    }
    $query = "SELECT * FROM user WHERE userid = '$userid'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<script>alert('Username already exists!')</script>";
} else {
    $res = $conn->query("INSERT INTO user (name, userid, password, address, phone, email, location, photo) 
            VALUES  ('$name', '$userid', '$password', '$address', '$phone', '$email', '$location', '$photo')");
            if($res)
        {
            echo "<script>alert('Registered Successfully')</script>";
        }
        else
        {
            echo "<script>alert('Registeration Failed')</script>";
        }
}}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .form-control {
        background-color: #d4d3e3;
    }
</style>

<body>
    <div class="container mt-5 mb-5 ">
        <h2 class="mb-4">Register</h2>
        <form class="row" action="" method="post" enctype="multipart/form-data">
            <div class="col-6 mb-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="col-6 mb-2">
                <label for="userid" class="form-label">User ID</label>
                <input type="text" class="form-control" name="userid" required>
            </div>
            <div class="col-6 mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="col-6 mb-2">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" rows="3" required></textarea>
            </div>
            <div class="col-6 mb-2">
                <label for="phone" class="form-label">Phone No</label>
                <input type="tel" class="form-control" name="phone" required>
            </div>
            <div class="col-6 mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="col-6 mb-2">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" name="location" required>
            </div>
            <div class="col-6 mb-2">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" name="photo" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include ('./includes/footer.php');
?>