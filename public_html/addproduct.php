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
      <title>Ajouter un produit</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<?php if (!isset($_SESSION["user_id"])) { ?> 
<br /><br /><a class="navLink" href="register.php">Register</a>
<?php }  ?>
<?php if (isset($_SESSION["user_id"])) { ?>  
<a href="logout.php"> Logout</a>
<?php } ?>

<main class="container">

      <div class="row">
            <section class="col-12">
    
            <h1> Ajouter un produit </h1>
            <table class="table">
                  <thead>
                        <th> ID </th>      
                        <th> Name </th>
                        <th> Code </th>
                        <th> Action </th>
                  </thead>
                  <tbody>
                  
                  </tbody>
            </table>
            <a href="addproduct.php" class="btn btn-primary"> Add Product</a>

</section>
</div>
</main>
</body>
</html>
