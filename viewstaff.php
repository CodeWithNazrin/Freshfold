<?php
include('./includes/adminnavbar.php');

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $phoneno = $_POST['phoneno'];
    $idproof = $_POST['idproof'];
    $password = $_POST['password'];
    $u = $_POST['update'];
    $update = $conn->query("UPDATE `staff` SET `name`='$name', `phoneno`='$phoneno', `idproof`='$idproof', `password`='$password' WHERE `userid`='$u'");
    if (!$update) {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    } else {
        echo "<div class='alert alert-success'>Staff updated successfully!</div>";
    }
}

if (isset($_POST["delete"])) {
    $d = $_POST["delete"];
    $delete = $conn->query("DELETE FROM `staff` WHERE `userid`='$d'");
    echo "<div class='alert alert-danger'>Staff deleted successfully!</div>";
}

$staff = $conn->query("SELECT * FROM `staff`");

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

    .staff-list {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .staff-item {
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

    .staff-item:hover {
        transform: translateY(-3px);
    }

    .staff-info {
        flex: 1;
        margin-bottom: 20px; /* Add space for buttons */
    }

    .staff-info label {
        font-weight: bold;
        color: #666;
        margin-right: 10px;
    }

    .staff-info input {
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
    <h2>Manage Staff</h2>

    <div class="staff-list">
        <?php if ($staff->num_rows > 0) { 
            while ($r = mysqli_fetch_array($staff)) { ?>
                <div class="staff-item">
                    <div class="staff-info">
                        <form action="" method="post">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="<?php echo $r['name']; ?>" required>

                            <label for="phoneno">Phone No</label>
                            <input type="text" name="phoneno" value="<?php echo $r['phoneno']; ?>" required>

                            <label for="idproof">ID Proof</label>
                            <input type="text" name="idproof" value="<?php echo $r['idproof']; ?>" required>

                            <label for="userid">User ID</label>
                            <input type="text" name="userid" value="<?php echo $r['userid']; ?>" readonly>

                            <label for="password">Password</label>
                            <input type="password" name="password" value="<?php echo $r['password']; ?>" required>
                        </form>
                    </div>
                    <div class="action-buttons">
                        <form action="" method="post" style="display: inline;">
                            <button type="submit" class="btn btn-update" name="update" value="<?php echo $r['userid']; ?>">UPDATE</button>
                        </form>
                        <form action="" method="post" style="display: inline;">
                            <button type="submit" class="btn btn-delete" name="delete" value="<?php echo $r['userid']; ?>">DELETE</button>
                        </form>
                    </div>
                </div>
            <?php } 
        } else { ?>
            <div class="alert alert-warning text-center">No staff found.</div>
        <?php } ?>
    </div>
</div>

<?php
include('./includes/adminfooter.php');
?>
