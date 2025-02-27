<?php
include("config/db.connect.php");
$errors=array("email"=>'',"title"=>'',"ingredients"=>'');
$email=$title=$ingredients='';

if (isset($_POST['submit'])){

    //check email
    if (empty($_POST['email'])){
        $errors['email']= "An email shouldn't be empty <br>" ;
    }else{
        $email=$_POST['email'];
        if( !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email']= "email must be a valid email address";
        }

    }
    //check title
    if (empty($_POST['title'])){
        $errors['title'] = "A title shouldn't be empty <br>";
    }else{
        $title= $_POST['title'];
        if (!preg_match('/^[a-zA-Z\s]+$/',$title)){
            $errors['title'] = "title must include a letter and a space only";
        }
    }
    //check ingredients
    if (empty($_POST['ingredients'])){
        $errors['ingredients'] = "At least one ingredient is needed.<br>";
    }else{
       
        $ingredients= $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
            $errors['ingredients'] = "ingredients must include a letter and a space only";
        }
    }
    if (array_filter($errors)){

    }else{
        
    
$email=mysqli_real_escape_string($conn,$_POST['email']);
$title=mysqli_real_escape_string($conn,$_POST['title']);
$ingredients=mysqli_real_escape_string($conn,$_POST['ingredients']);
$sql="INSERT INTO piz(email,ingredients,title) VALUES('$email','$ingredients','$title')";
if (mysqli_query($conn,$sql)){
    header('Location:project.index.php');
}else{
    echo"query error". mysqli_error();
}
}}
?>
<!DOCTYPE html>
<html lang="en">
<?php include ("templates/header.php");?>
<section class="container grey-text">
<h4 class="center">Add a Pizza</h4>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="white">
    <label >Your Email:</label>
    <input type="text" name="email" value= <?php echo htmlspecialchars($email);?>>
    <div class="red-text"><?php echo $errors['email'];?></div>
    <label >Pizza Title:</label>
    <input type="text" name="title" value= <?php echo htmlspecialchars($title);?>>
    <div class="red-text"><?php echo $errors['title'];?></div>
    <label >Ingredients(comma separated):</label>
    <input type="text" name="ingredients" value= <?php echo htmlspecialchars($ingredients);?>>
    <div class="red-text"><?php echo $errors['ingredients'];?></div>
    <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
    </div>
</form>

</section>




<?php include ("templates/footer.php");?>
</html>