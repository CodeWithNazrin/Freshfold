<?php
include ('./includes/navbar.php');
?>
<?php
$categoryid = $_GET['avail'];
$query = $conn->query("SELECT * FROM category WHERE id = $categoryid ");
while ($r = mysqli_fetch_array($query)) {
    $title = $r['title'];
    $price = $r['price'];
}

if (isset($_POST['placeorder'])) {
    $date = date("d/m/Y");
    $userid = $_SESSION['user_id'];
    $selectedoption = $_POST['selectedoption'];
    $deliverydate = $_POST['deliverydate'];
    $place = $_POST['place'];
    $price = $_POST['price'];
    $paymentmode = $_POST['paymentmode'];
    $insert = $conn->query("INSERT INTO `booking` (`userid`, `categoryid`, `date`, `place`, `rate`, `delivery`, `paymentmode`) VALUES 
                            ('$userid', '$selectedoption', '$date', '$place', '$price', '$deliverydate', '$paymentmode')");
}
?>

<style>
  /* General styling */
  body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f7fa;
  }

  /* Form container styling */
  .form-container {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
  }

  /* Form control */
  .form-control {
    background-color: #edf0f5;
    border: none;
    box-shadow: none;
    height: 45px;
    padding: 10px;
  }

  /* Form labels */
  .form-label {
    font-weight: bold;
    color: #333;
  }

  /* Submit button */
  .btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 50px;
    padding: 10px 20px;
    font-size: 18px;
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }

  /* Form header */
  h2 {
    color: #007bff;
    font-weight: bold;
  }
</style>

<div class="container mt-5 mb-5">
  <div class="form-container">
    <h2 class="mb-4 text-center">Place Order</h2>
    <form action="" method="post" class="d-flex justify-content-center">
      <div class="row w-100">
        <!-- Selected Option -->
        <div class="mb-3 col-md-6">
          <label for="selectedoption" class="form-label">Selected Option :</label>
          <input type="text" value="<?php echo $title; ?>" hidden class="form-control" id="selectedoption" name="selectedoption" required>
          <p class="form-control bg-light text-dark"><?php echo $title; ?></p>
        </div>

        <!-- Place Input -->
        <div class="mb-3 col-md-6">
          <label for="place" class="form-label">Place</label>
          <input type="text" class="form-control" id="place" name="place" required>
        </div>

        <!-- Amount Display -->
        <div class="mb-3 col-md-6">
          <label for="amountdisplay" class="form-label">Amount:</label>
          <input type="text" class="form-control" value="<?php echo $price; ?>" hidden id="price" name="price" required>
          <p class="form-control bg-light text-dark"><?php echo $price; ?></p>
        </div>

        <!-- Payment Mode -->
        <div class="mb-3 col-md-6">
          <label for="paymentmode" class="form-label">Payment Mode</label>
          <select name="paymentmode" id="paymentmode" class="form-control">
            <option value="Gpay">Gpay</option>
            <option value="Card">Card</option>
            <option value="Cash">Cash</option>
          </select>
        </div>

        <!-- Delivery Date -->
        <div class="mb-3 col-md-6">
          <label for="deliverydate" class="form-label">Delivery Date</label>
          <input type="date" class="form-control" id="deliverydate" name="deliverydate" required>
        </div>

        <!-- Submit Button -->
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary" name="placeorder">Submit Order</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
include ('./includes/footer.php');
?>
