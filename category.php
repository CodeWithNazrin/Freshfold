<?php
include ('./includes/navbar.php');
?>
<div class="container mt-5 mb-5">
    <h1>Our Services</h1>
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
                            <?php echo $title; ?>
                        </button>
                    </h2>
                    <div id="<?php echo $id; ?>" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <?php echo $description; ?>
                        </div>
                        <form action="placeorder.php" method="get"><button type="submit" class="btn btn-success" name="avail"
                                value="<?php echo $id; ?>">Place Order</button></form>
                    </div>
                </div> <?php
            }
        } else {
            echo "<h3>sorry no services available right now</h3>";
        }
        ?>
    </div>
</div>

<?php
include ('./includes/footer.php');
?>