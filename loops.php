<?php
$names=["hi","hello","there"];
for($i=0;$i<count($names);$i++){
    echo $names[$i] . "<br>";

}
foreach($names as $name){
    echo $name."<br>";
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
    <?php foreach( $names as $name){?>
    <h3><?php echo $name;?><h3>
    <?php }?>
</body>
</html>