<?php
include('./includes/adminnavbar.php');

if(isset($_POST["update"]))
    {
        $name=$_POST['name'];
        $address=$_POST['address'];
        $phoneno=$_POST['phoneno'];
        $emailid=$_POST['emailid'];
        $location=$_POST['location'];
        $userid=$_POST['userid'];
        $password=$_POST['password'];
        $photo=$_POST['photo'];
        $update=$conn->query("UPDATE `user` SET `name`='$name',`userid`='$userid',`password`='$password',`address`='$address',`phoneno`='$phoneno',`email`='$email',`location`='$location',`photo`='$photo' WHERE `userid`=`$userid`");
    }
    if(isset($_POST["delete"])){
        $d=$_POST["delete"];
        $delete=$conn->query("DELETE FROM `user` WHERE `userid`='$d'");
        }
    $register=$conn->query("SELECT * FROM user");
    
        if($register->num_rows>0){
        ?>
        
            
    
        <?php
       
        
        while($r=mysqli_fetch_array($register)){
            ?>
            <div class="col">
    
    <form action="" method="get" >
    <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h1 class="card-title"><?php echo $r["userid"];?></h1>
      <h5 class="card-subtitle">Name<input class="form-control " type="text" name="name" value="<?php echo $r['name'];?>"></h5>
      <p class="card-text">Address<input class="form-control " type="text" name="address" value="<?php echo $r['address'];?>"></p>
      <p class="card-text">Phone No<input class="form-control " type="text" name="phoneno" value="<?php echo $r['phoneno'];?>"></p>
      <p class="card-text">Email ID<input class="form-control " type="text" name="emailid" value="<?php echo $r['emailid'];?>"></p>
      <p class="card-text">Location<input class="form-control " type="text" name="location" value="<?php echo $r['location'];?>"></p>
      <p class="card-text">User ID<input class="form-control " type="text" name="userid" value="<?php echo $r['userid'];?>"></p>
      <p class="card-text">Password<input class="form-control " type="text" name="password" value="<?php echo $r['password'];?>"></p>
      <p class="card-text">Photo<input class="form-control " type="text" name="photo" value="<?php echo $r['photo'];?>"></p>
      <button type="submit" class="btn w-100 mt-2   btn-warning" name="update" value="<?php echo $r['userid'];?>">UPDATE</button> </form>
      <form action="" method="post"><button name="delete" class=" btn w-100 mt-2  btn-danger" type="submit" value=<?php echo $r["userid"];?>>DELETE</button></form>
    </div>
  </div>
  
  </div>


    <?php
        }
    }
    
   
        else{
            echo"TABLE IS EMPTY";
        }
       
?>
<?php
include ('./includes/adminfooter.php');
?>