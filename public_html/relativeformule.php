<?php
include "Formule.php"; 
$id = $_GET["id"];
$dbh = new PDO("mysql:dbname=dbtest;host=mysql", "root", "rootpassword");
$query = $dbh->query("SELECT * FROM product WHERE id='".$id."'");
$query->execute([$id]);
$allproducts = $query->fetch();

?>

<h1> Nos formules </h1>
<li> Name: <?= $allproducts["name"] ?> </li>
<li> Description: <?= $allproducts["description"] ?> </li>
<li> </li> ?>






