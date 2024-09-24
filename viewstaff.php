<?php
include('./includes/adminnavbar.php');

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $phoneno=$_POST['phoneno'];
    $idproof=$_POST['idproof'];
    $password=$_POST['password'];
    $u=$_POST['update'];
    $update=$conn->query("UPDATE `staff` SET `name`='$name',`phoneno`='$phoneno',`idproof`='$idproof',`password`='$password' WHERE `userid`='$u'");
    if(!$update)
    {
        mysqli_error($conn);
    }
}
if(isset($_POST["delete"])){
    $d=$_POST["delete"];
    $delete=$conn->query("DELETE FROM `staff` WHERE `userid`='$d'");
    }
    $staff=$conn->query("SELECT * FROM `staff`");
    
    if($staff->num_rows>0){
    ?>
    
        <table>
        <tr>
        <th>name</th>
        <th>phoneno</th>
        <th>idproof</th>
        <th>userid</th>
        <th>password</th>
</tr>

    <?php
   
    
    while($r=mysqli_fetch_array($staff)){
        ?>
        <tr>
        <form method="post" action="">
            <td><input type="text" name="name" value="<?php echo $r['name'];?>"></td>
            <td><input type="text" name="phoneno" value="<?php echo $r['phoneno'];?>"></td>
            <td><input type="text" name="idproof" value="<?php echo $r['idproof'];?>"></td>
            <td><input type="text" name="userid" value="<?php echo $r['userid'];?>"></td>
            <td><input type="text" name="password" value="<?php echo $r['password'];?>"></td>
       
            <td><button type="submit" name="update" value="<?php echo $r["userid"];?>">UPDATE</button></td></form>
            <td> <form action="" method="post"><button type="submit" name="delete" value=<?php echo $r["userid"];?>> DELETE</button></td></form>
    </tr>
<?php
    }
    

?>
</table>
    <?php

}
    else{
        echo"TABLE IS EMPTY";
    }
   

?>
<?php
include ('./includes/adminfooter.php');
?>