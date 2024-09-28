<?php
include('./includes/navbar.php');

$categoryid = $_GET['avail'];
$query = $conn->query("SELECT * FROM category WHERE id = $categoryid ");
while ($r = mysqli_fetch_array($query)) {
    $title = $r['title'];
    $price = $r['price'];
}

$bookingConfirmed = false; // Flag to check if booking is confirmed

if (isset($_POST['placeorder'])) {
    $date = date("d/m/Y");
    $userid = $_SESSION['user_id'];
    $selectedoption = $_POST['selectedoption'];
    $deliverydate = $_POST['deliverydate'];
    $place = $_POST['place'];
    $price = $_POST['price'];
    $paymentmode = $_POST['paymentmode'];
    
    // Insert the order into the database
    $insert = $conn->query("INSERT INTO `booking` (`userid`, `categoryid`, `date`, `place`, `rate`, `delivery`, `paymentmode`) VALUES 
                            ('$userid', '$selectedoption', '$date', '$place', '$price', '$deliverydate', '$paymentmode')");
    
    // Check if the insertion was successful
    if ($insert) {
        $bookingConfirmed = true; // Set the flag if the booking was successful
    }
}
?>

<style>
  /* Pop-up background overlay */
  .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
  }

  /* Pop-up container */
  .popup-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    width: 300px;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
  }

  /* Checkmark icon */
  .popup-container .checkmark {
    font-size: 50px;
    color: #28a745;
  }

  /* Confirmation message */
  .popup-container h2 {
    margin-top: 10px;
    font-size: 18px;
    color: #333;
  }

  /* Button styling */
  .popup-container button {
    margin-top: 15px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }

  .popup-container button:hover {
    background-color: #0056b3;
  }
</style>

<!-- Pop-up HTML -->
<div class="popup-overlay" id="popup">
  <div class="popup-container">
    <div class="checkmark">✔</div>
    <h2>Order is Confirmed!</h2>
    <button onclick="closePopup()">OK</button>
  </div>
</div>

<!-- JavaScript to control the pop-up -->
<script>
  function showPopup() {
    document.getElementById('popup').style.display = 'flex';
  }

  function closePopup() {
    document.getElementById('popup').style.display = 'none';
    // Redirect or reload the placeorder page after the pop-up is closed
    window.location.href = 'mybookings.php'; // Change the URL to your actual placeorder page
  }

  // Show the pop-up only if the booking was successful
  document.addEventListener('DOMContentLoaded', function() {
    <?php if ($bookingConfirmed) { ?>
      showPopup();
    <?php } ?>
  });
</script>

<style>
  /* Importing Google Font */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

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
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
  }

  .form-container:hover {
    transform: translateY(-5px);
  }

  /* Form control */
  .form-control {
    background-color: #edf0f5;
    border: 1px solid #ced4da;
    box-shadow: none;
    height: 45px;
    padding: 10px;
    transition: border-color 0.3s;
  }

  .form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
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
    transition: background-color 0.3s ease, transform 0.3s;
  }

  .btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.05);
  }

  /* Form header */
  h2 {
    color: #007bff;
    font-weight: bold;
    margin-bottom: 20px;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .form-container {
      padding: 20px;
    }
    
    .form-control {
      height: 40px;
    }
  }
</style>

<div class="container mt-5 mb-5">
  <div class="form-container">
    <h2 class="text-center">Place Order</h2>
    <form action="" method="post" class="d-flex justify-content-center">
      <div class="row w-100">
        <!-- Selected Option -->
        <div class="mb-3 col-md-6">
          <label for="selectedoption" class="form-label">Selected Option</label>
          <input type="text" value="<?php echo htmlspecialchars($title); ?>" hidden class="form-control" id="selectedoption" name="selectedoption" required>
          <p class="form-control bg-light text-dark"><?php echo htmlspecialchars($title); ?></p>
        </div>

        <!-- Place Input -->
        <div class="mb-3 col-md-6">
          <label for="place" class="form-label">Place</label>
          <input type="text" class="form-control" id="place" name="place" required>
        </div>

        <!-- Amount Display -->
        <div class="mb-3 col-md-6">
          <label for="amountdisplay" class="form-label">Amount</label>
          <input type="text" class="form-control" value="<?php echo htmlspecialchars($price); ?>" hidden id="price" name="price" required>
          <p class="form-control bg-light text-dark"><?php echo htmlspecialchars($price); ?></p>
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
include('./includes/footer.php');
?>
