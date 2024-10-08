<?php
include('./includes/adminnavbar.php');
if (isset($_POST["update"])) {
    $id = $_POST['update'];
    $userid = $_POST['userid'];
    $categoryid = $_POST['categoryid'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $update = $conn->query("UPDATE `booking` SET `categoryid`='$categoryid', `date`='$date', `status`='$status' WHERE `id` ='$id'");
}

if (isset($_POST["delete"])) {
    $d = $_POST["delete"];
    $delete = $conn->query("DELETE FROM `booking` WHERE `id`='$d'");
}

$userid = $_SESSION['user_id'];
$booking = $conn->query("SELECT * FROM booking");

if ($booking->num_rows > 0) {
?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f7f9fc;
        padding: 20px;
    }

    h2 {
        color: #333;
        font-weight: bold;
        text-align: center;
        margin-bottom: 40px;
    }

    .booking-list {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .booking-item {
        background-color: #e6f7ff; /* Light blue shade */
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        margin: 15px;
        padding: 20px;
        width: 90%;
        display: flex;
        flex-direction: column; /* Stack children vertically */
        transition: transform 0.2s;
    }

    .booking-item:hover {
        transform: translateY(-3px);
    }

    .booking-info {
        flex: 1;
        margin-bottom: 20px; /* Add space for buttons */
    }

    .booking-info label {
        font-weight: bold;
        color: #666;
        margin-right: 10px;
    }

    .booking-info input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .action-buttons {
        display: inline-block;
        margin-top: 10px;
    }

    .btn {
        padding: 10px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease;
        margin-left: 5px; /* Space between buttons */
    }

    .btn-update {
        background-color: #007bff;
        color: white;
    }

    .btn-update:hover {
        background-color: #0056b3;
    }

    .btn-delete {
        background-color: #4a90e2;
        color: white;
    }

    .btn-delete:hover {
        background-color: #357ABD;
    }

    .alert {
        margin-top: 20px;
        padding: 15px;
        font-size: 14px;
        border-radius: 4px;
        background-color: #f8d7da;
        color: #721c24;
    }
</style>

    <div class="container">
        <h2>Manage Bookings</h2>
        <div class="booking-list">
            <?php
            while ($r = mysqli_fetch_array($booking)) {
            ?>
                <div class="booking-item">
                    <div class="booking-info">
                        <form action="" method="post">
                            <label for="userid">User ID</label>
                            <input type="text" name="userid" value="<?php echo $r['userid']; ?>" required>

                            <label for="categoryid">Category ID</label>
                            <input type="text" name="categoryid" value="<?php echo $r['categoryid']; ?>" required>

                            <label for="date">Date</label>
                            <input type="text" name="date" value="<?php echo $r['date']; ?>" required>

                            <label for="status">Status</label>
                            <input type="text" name="status" value="<?php echo $r['status']; ?>" required>

                            <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                    </div>
                    <div class="action-buttons">
                        <button type="submit" class="btn btn-update" name="update" value="<?php echo $r['id']; ?>">UPDATE</button>
                        </form>
                        <form action="" method="post" style="display: inline;">
                            <button type="submit" class="btn btn-delete" name="delete" value="<?php echo $r['id']; ?>">DELETE</button>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<?php
} else {
    echo "<div class='alert alert-warning text-center'>No bookings found.</div>";
}
?>

<?php
include('./includes/footer.php');
?>
