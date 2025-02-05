<?php
include("config/db.connect.php");
$quer='SELECT * FROM piz ORDER BY created_at';
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
        <?php foreach($conn_res as $con_re):?>
            <div class="col s6 md3"> 
                <div class="card z-depth-0">
                    <img src="assets/colorful-round-tasty-pizza-vector-illustration_614983-4957.avif" class="pizza"  alt="">
                <div class="card-content center">
                    <h6><?php echo htmlspecialchars($con_re['title']);?></h6>
                    <h6><?php echo htmlspecialchars($con_re['email']);?></h6>
                    <ul>
                        <?php foreach(explode(',',$con_re['ingredients']) as $cre):?>
                        
                        <li><?php echo htmlspecialchars($cre);?></li>
                        
                    
                    <?php endforeach; ?>
                    </ul>
                    
                </div>
                <div class="card-action right-align">
                    <a href="detail.php?id=<?php echo $con_re['id']?>" >more info</a>
                </div>
            </div>
            </div> 

        <?php endforeach; ?>
        

    </div>
    <!--using ternary operator-->
    <?php echo count($conn_res)>2? 'result is greater than 2':'result is less than 2';?>
    <!--using if statment-->
    <?php if (count($conn_res)>=2):?>
            <p>result is a lot greater than 2</p>
            <?php else:?>
            <p>result is a lot less than 2</p>
        <?php endif;?>
    <?php
    echo $_SERVER['REQUEST_METHOD'] . '<br/>';
    echo $_SERVER['SCRIPT_FILENAME'].'<br>';
    echo $_SERVER['SERVER_NAME'].'<br>';

    ?>

</div>
<?php include ("templates/footer.php");?>


</html>