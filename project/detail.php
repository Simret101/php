<?php
include("config/db.connect.php");
if (isset($_POST['delete'])){
    $id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);
    $sql="DELETE FROM piz WHERE id=$id_to_delete ";
    if (mysqli_query($conn,$sql)){
        header('LOCATION:project.index.php');
    }else{
        echo "Error Deleting Record" .mysqli_error($conn);
    }


}
if (isset($_GET['id'])){
    $id=mysqli_real_escape_string($conn,$_GET['id']);
    $sql="SELECT * FROM piz WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    $pizz=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
}
$sql="SELECT id"


?>
<!DOCTYPE html>
<html lang="en">
<?php include("templates/header.php");?>
<div class="container center grey-text">
    <?php if ($pizz):?>
    <h4><?php  echo htmlspecialchars($pizz['title']); ?></h4>
    <p>Created By :<?php echo htmlspecialchars(date($pizz['email'])); ?></p>
    <p><?php echo date($pizz['created_at']);?></p>
    <h5>Ingredients</h5>
    <p><?php echo htmlspecialchars($pizz['ingredients']);?></p>
    <form action="detail.php" method="POST">
        <input type="hidden" name="id_to_delete" value=<?php echo $pizz['id'];?>>
        <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">

    </form>

    <?php else:?>
        <h5>"No such pizza exists."</h5>;
    <?php endif;?>
    
</div>
<?php include("templates/footer.php");?>
</html>