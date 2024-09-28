<?php
include('./includes/adminnavbar.php');
?>

<style>
    body {
        background-color: #e9ecef; /* Light gray background for contrast */
        font-family: 'Poppins', sans-serif; /* Clean font for readability */
    }

    .container {
        max-width: 800px; /* Set a max-width for the container */
        margin: auto; /* Center the container */
        padding-top: 50px; /* Add some top padding */
        padding-bottom: 50px; /* Add some bottom padding */
    }

    .card {
        background-color: #ffffff; /* White background for cards */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        padding: 30px; /* Padding inside cards */
        margin-bottom: 30px; /* Space between cards */
        transition: transform 0.3s, box-shadow 0.3s; /* Smooth transitions */
    }

    .card:hover {
        transform: translateY(-5px); /* Slight lift on hover */
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); /* Enhance shadow on hover */
    }

    .btn {
        border-radius: 25px; /* Rounded buttons */
        padding: 15px; /* Increased padding for buttons */
        font-size: 18px; /* Larger text for buttons */
        transition: background-color 0.3s, transform 0.3s; /* Smooth transitions */
        width: 100%; /* Full width buttons */
        margin-top: 10px; /* Space above buttons */
    }

    .btn-primary {
        background-color: #007bff; /* Primary button color */
        border: none; /* Remove border */
        color: white; /* White text color */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover */
        transform: translateY(-2px); /* Slight lift on hover */
    }

    .footer {
        background-color: #343a40; /* Dark footer background */
        color: white; /* White footer text */
        padding: 15px; /* Padding for footer */
        text-align: center; /* Center the footer text */
        position: relative;
        bottom: 0;
        width: 100%;
    }
</style>

<div class="container">
    <h2 class="text-center mb-4" style="color: #007bff;">Staff Dashboard</h2>

    <div class="card">
        <a class="btn btn-primary" href="viewuser.php">View Users</a>
        <a class="btn btn-primary" href="viewbookings.php">View Bookings</a>
    </div>
</div>


<?php
include('./includes/adminfooter.php');
?>
