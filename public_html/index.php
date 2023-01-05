<?php

session_start();
require_once('connect.php');

$sql = 'SELECT * FROM product';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<?php if (!isset($_SESSION["user_id"])) { ?>      
<a class="navLink" href="Login.php">Login</a>
<br /><br /><a class="navLink" href="register.php">Register</a>
<?php }  ?>
<?php if (isset($_SESSION["user_id"])) { ?>  
<a href="logout.php"> Logout</a>
<div class="alert alert-success" role="alert">
  You are successfully logged in !
</div>
<?php } ?>

<main class="container">
      <div class="row">
            <section class="col-12">
            <?php
               if(!empty($_SESSION['erreur'])){ 
                  echo '<div class="alert alert-danger" role="alert">
                   '. $_SESSION['erreur'].'
                   </div>';
                  $_SESSION['erreur'] = "";
             } ?>
            <h1> Nos Produits </h1>
            <table class="table">
                  <thead>
                        <th> ID </th>      
                        <th> Name </th>
                        <th> Code </th>
                        <th> Action </th>
                  </thead>
                  <tbody>
                  <?php 
                        foreach ($result as $allproducts) { ?>
                        <tr>
                        <td> <?= $allproducts["id"] ?> </td>
                        <td> <?= $allproducts["name"] ?> </td>
                        <td> <?= $allproducts["code"] ?> </td>
                        <td> <a href="relativeformule.php?id=<?= $allproducts["id"]; ?>"> Voir détails</a></td> ?>
                        </tr>
                  <?php } ?> 
                  </tbody>
            </table>
            <?php
            if ($_SESSION["user_id"]) { ?>
            <a href="addproduct.php" class="btn btn-primary"> Add Product</a>
            <?php } ?>
</section>
</div>
</main>
</body>
</html>
