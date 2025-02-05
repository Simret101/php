<?php
if(isset($_POST['submit'])){
    
    setcookie('gender', $_POST['gender'],time() + 86400);
    session_start();
    $_SESSION['name']=$_POST['name'];
    header('Location:project.index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" name="name">
        <select name="gender" >
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>