<?php
$db_server="localhost";
$db_user="root";
$db_pass="";
$db_name="ss";
$conn="";
$conn=mysqli_connect($db_server, $db_user,$db_pass,$db_name);
if ($conn ){
    die("my sql is  connected");
}else{
    
    echo("mysql is not connected");
    echo mysqli_connect_error();
}
?>


<!DOCTYPE html>
<html lang="en">
<?php include ("templates/header.php");?>
<?php include ("templates/footer.php");?>


</html>