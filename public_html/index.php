<?php
include "Product.php";
session_start();
$dbh = new PDO("mysql:dbname=dbtest;host=mysql", "root", "rootpassword");
$query = $dbh->query("SELECT * FROM product");
$allproducts = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="Stylesheet" type="text/css" href="index.css" />
      <title>Document</title>
</head>
<body>
<?php if (!isset($_SESSION["user_id"])) { ?>      
<a class="navLink" href="Login.php">Login</a>
<br /><br /><a class="navLink" href="register.php">Register</a>
<?php }  ?>
<?php if (isset($_SESSION["user_id"])) { ?>  
<a href="profileeditform.php?id=<?= $_SESSION["user_id"] ?>"> Edit profile</a>
<a href="logout.php"> Logout</a>
<?php } ?>


<h1> Nos Produits </h1>
<?php 
 foreach ($allproducts as $key => $allproducts) { ?>
<div class="container">
<div class="allproducts">
<ul>
<li> Name: <?= $allproducts["name"] ?> </li>
<li> Description: <?= $allproducts["description"] ?> </li>
<li> <a href="relativeformule.php?id=<?= $allproducts["id"]; ?>"> Découvrir les formules:</a></li> ?>
</ul>
</div>
</div>
<?php } ?> 

</body>
</html>
