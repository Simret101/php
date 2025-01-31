<?php
function sayHello($username="shalom"){
    echo "hello $username";
}
sayHello("simret");
function result($work){
    return "{$work["name"]} and price is {$work["price"]}";
}
$x = result(["name"=>"simret","price"=>20]);
echo $x;
?>