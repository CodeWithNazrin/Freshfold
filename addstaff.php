<?php
include('./includes/adminnavbar.php');
?>

<?php
if (isset($_POST['addstaff'])) {
    $name = $_POST['name'];
    $phoneno = $_POST['phoneno'];
    $idproof = $_POST['idproof'];
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $insert = $conn->query("INSERT INTO `staff`(`name`, `phoneno`, `idproof`, `userid`, `password`) VALUES ('$name','$phoneno','$idproof','$userid','$password')");
}
?>

<style>
    body {
        font-family: 'Poppins', sans-serif; /* Clean and modern font */
        background-color: #f0f4f8; /* Light gray background for a soft appearance */
        color: #333; /* Dark text for readability */
        margin: 0; /* Remove default margin */
        padding: 20px; /* Padding around the body */
    }

    .container {
        max-width: 700px; /* Set a max-width for the container */
        margin: auto; /* Center the container */
        background-color: #fff; /* White background for the form */
        border-radius: 15px; /* Rounded corners for the container */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        padding: 40px; /* Padding inside the container */
        transition: transform 0.3s; /* Transition effect for hover */
    }

    .container:hover {
        transform: translateY(-5px); /* Slight lift on hover */
    }

    h2 {
        color: #007bff; /* Primary blue color for the title */
        margin-bottom: 30px; /* Space below the title */
        text-align: center; /* Center the title */
    }

    .form-control {
        background-color: #f9f9f9; /* Light background for input fields */
        border: 1px solid #ced4da; /* Light gray border for input fields */
        border-radius: 5px; /* Rounded corners for input fields */
        height: 45px; /* Height for input fields */
        transition: border-color 0.3s, box-shadow 0.3s; /* Smooth transitions */
    }

    .form-control:focus {
        border-color: #007bff; /* Blue border on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Glow effect on focus */
    }

    .btn-primary {
        background-color: #007bff; /* Primary button color */
        border: none; /* Remove border */
        border-radius: 25px; /* Rounded corners */
        padding: 10px 20px; /* Padding for button */
        font-size: 18px; /* Font size for button */
        transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
        width: 100%; /* Full width for the button */
        margin-top: 20px; /* Space above the button */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker blue on hover */
        transform: scale(1.05); /* Slightly larger on hover */
    }

    .form-label {
        font-weight: bold; /* Bold labels for better visibility */
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .container {
            padding: 20px; /* Reduce padding for smaller screens */
        }

        h2 {
            font-size: 24px; /* Smaller font size for the title */
        }
    }
</style>

<div class="container mt-5 text-center mb-5">
    <h2 class="mb-4">Add Staff</h2>
    <form action="" method="post" class="d-flex justify-content-center">
        <div class="row w-100">
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="phoneno" class="form-label">Phone No</label>
                <input type="text" class="form-control" id="phoneno" name="phoneno" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="idproof" class="form-label">ID Proof</label>
                <input type="text" class="form-control" id="idproof" name="idproof" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="userid" class="form-label">User ID</label>
                <input type="text" class="form-control" id="userid" name="userid" required>
            </div>
            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="addstaff">Submit</button>
            </div>
        </div>
    </form>
</div>

<?php
include('./includes/adminfooter.php');
?>
