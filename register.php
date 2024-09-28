<?php
include ('./includes/navbar.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $userid = $_POST['userid'];
    $password = $_POST['password']; // Hash the password
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $location = $_POST['location'];

    $target_file = "uploads/" . basename($_FILES["photo"]["name"]); 
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
        if ($res) {
            echo "<script>alert('Registered Successfully')</script>";
        } else {
            echo "<script>alert('Registration Failed')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .form-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 50px;
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
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container p-5">
                    <h2 class="mb-4 text-center">Registration</h2>
                    <form class="row g-3 needs-validation" action="" method="post" enctype="multipart/form-data" novalidate>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                            <div class="invalid-feedback">Please provide your name.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="userid" class="form-label">User ID</label>
                            <input type="text" class="form-control" name="userid" required>
                            <div class="invalid-feedback">Please provide a User ID.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                            <div class="invalid-feedback">Please provide a password.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea>
                            <div class="invalid-feedback">Please provide your address.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone No</label>
                            <input type="tel" class="form-control" name="phone" required>
                            <div class="invalid-feedback">Please provide your phone number.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" required>
                            <div class="invalid-feedback">Please provide your location.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="photo" class="form-label">Upload Photo</label>
                            <input type="file" class="form-control" name="photo" accept="image/*" required>
                            <div class="invalid-feedback">Please upload your photo.</div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-5" name="register">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include('./includes/footer.php');
?>


        
