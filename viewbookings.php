<?php
include ('./includes/navbar.php');


if(isset($_POST["update"]))
    {
        $id=$_POST['id'];
        $userid=$_POST['userid'];
        $categoryid=$_POST['categoryid'];
        $date=$_POST['date'];
        $status=$_POST['status'];
        $update=$conn->query("UPDATE `booking` SET `id`='$id',`userid`='$userid',`categoryid`='$categoryid',`date`='$date',`status`='$status' WHERE `id` =`$id`");
    }
    if(isset($_POST["delete"])){
        $d=$_POST["delete"];
        $delete=$conn->query("DELETE FROM `booking` WHERE `id`='$d'");
        }

        $userid=$_SESSION['user_id'];
    $booking=$conn->query("SELECT * FROM booking where userid = '$userid'");
    
        if($booking->num_rows>0){
        ?>
        <div class="row">
        <?php
       
        
        while($r=mysqli_fetch_array($booking)){
            ?>
            <div class="col">
    
    <form action="" method="post" >
    <div class="card" style="width: 18rem;">
    <div class="card-body">
      <!-- <h5 class="card-subtitle">ID<input  class="form-control " type="text" name="id" value="<?php echo $r['id'];?>"></h5> -->
      <!-- <p class="card-text">User ID<input class="form-control " type="text" name="userid" value="<?php echo $r['userid'];?>"></p> -->
      <p class="card-text">Category <input disabled class="form-control " type="text" name="categoryid" value="<?php echo $r['categoryid'];?>"></p>
      <p class="card-text">Date<input  class="form-control " type="text" name="date" value="<?php echo $r['date'];?>"></p>
      <p class="card-text">Status<input disabled class="form-control " type="text" name="status" value="<?php echo $r['status'];?>"></p>
      <button type="submit" class="btn w-100 mt-2   btn-warning" name="update" value="<?php echo $r['id'];?>">UPDATE</button> </form>
      <form action="" method="post"><button name="delete" class=" btn w-100 mt-2  btn-danger" type="submit" value=<?php echo $r["id"];?>>DELETE</button></form>
    </div>
  </div>
  
  </div>
  <?php
        }

        ?>
        </div>
        <?php
    }
    
   
        else{
            echo"TABLE IS EMPTY";
        }
       
?>
<?php
include ('./includes/footer.php');
?>