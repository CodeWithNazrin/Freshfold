<?php
include('./includes/navbar.php');
?>
<style>
    .accordion-button {
        font-weight: bold;
        background-color: #007bff;
        color: white;
    }

    .accordion-button:focus {
        box-shadow: none;
    }

    .accordion-body {
        background-color: #f8f9fa;
        padding: 20px;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .accordion-item {
        margin-bottom: 10px;
        border: 1px solid #dee2e6;
        border-radius: 5px;
    }
</style>

<div class="container mt-5 mb-5">
    <h1 class="text-center">Our Services</h1>
    <div class="accordion mt-5" id="accordionExample">
        <?php
        $sel = $conn->query("SELECT `id`, `title`, `description`, `price` FROM `category`");
        if ($sel->num_rows > 0) {
            while ($r = mysqli_fetch_array($sel)) {
                $id = $r['id'];
                $title = $r['title'];
                $description = $r['description'];
                $price = $r['price'];
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#<?php echo $id; ?>" aria-expanded="true" aria-controls="<?php echo $id; ?>">
                            <i class="fas fa-clipboard-list"></i> <?php echo $title; ?>
                        </button>
                    </h2>
                    <div id="<?php echo $id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><?php echo $description; ?></p>
                           
                        </div>
                        <form action="placeorder.php" method="get">
                            <button type="submit" class="btn btn-success" name="avail"
                                    value="<?php echo $id; ?>">Place Order
                            </button>
                        </form>
                    </div>
                </div> 
                <?php
            }
        } else {
            echo "<h3 class='text-danger'>Sorry, no services available right now</h3>";
        }
        ?>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<?php
include('./includes/footer.php');
?>
