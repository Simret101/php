<?php
$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="ss";
$conn="";
$conn=mysqli_connect($db_server, $db_user,$db_pass,$db_name);
if (!$conn ){
    echo("mysql is not connected");
    echo mysqli_connect_error();
  
}
$quer='SELECT title,ingredients FROM piz';
$res=mysqli_query($conn,$quer);
$conn_res=mysqli_fetch_all($res, MYSQLI_ASSOC);

mysqli_free_result($res);
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<?php include ("templates/header.php");?>
<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
    <div class="row">
        <?php foreach($conn_res as $con_re) {?>
            <div class="col s6 md3"> 
                <div class="card z-depth-0">
                <div class="card-content center">
                    <h6><?php echo htmlspecialchars($con_re['title']);?></h6>
                    <div><?php echo htmlspecialchars($con_re['ingredients']);?></div>
                </div>
                <div class="card-action right-align">
                    <a href="#" class="brand-text">more info</a>
                </div>
            </div>
            </div>

        <?php } ?>
    </div>

</div>
<?php include ("templates/footer.php");?>


</html>