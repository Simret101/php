<?php
session_start();
if ($_SERVER['QUERY_STRING']=="noname"){
    unset($_SESSION['name']);
}
$name=$_SESSION['name'] ?? 'Guest';
$gender=$_COOKIE['gender']??'Unknown';

?>
<head>
    
    <title>S&S PIZZA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand{
            background:#cbb09c !important;
        }
        .brand-text{
            color:#cbb09c !important;
        }
        form{
           max-width:460px; 
           margin:20px auto;
           padding:20px;
        }
        .pizza{
            width:100px;
            margin:40px auto -30px;
            display:block;
            position:relative;
            top:-30px;
        }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-deepth=0">
       
        <div class="container">
            <a href="#" class="brand-logo brand-text">S&S PIZZA</a>
            <ul id="nav-mobile" class="right hide-on-small-and-mobile">
                <li class="grey-text">Hello <?php echo htmlspecialchars($name);?></li>
                <li class="grey-text">(<?php echo htmlspecialchars($gender);?>)</li>
            <li><a href="#" class="btn  brand z-depth-0">ADD A PIZZA</a></li>
            </ul>
        </div>
    </nav>