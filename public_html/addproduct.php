<?php

session_start();

if (isset($_POST)) {
      if(isset($_POST["name"]) && !empty($_POST["name"])
      && isset($_POST["description"]) && !empty($_POST["description"])
      && isset($_POST["code"]) && !empty($_POST["code"])) 
      
      {
            require_once('connect.php');

            $name = strip_tags($_POST["name"]);
            $description = strip_tags($_POST["description"]);
            $code = strip_tags($_POST["code"]);
      
            $sql = "INSERT INTO product (name, description, code) VALUES (?,?,?)";
            $query = $db->prepare($sql);
            $query->execute([$name, $description, $code]);

            $_SESSION['message'] = "Produit ajouté";
            header('Location: index.php');
     
      } else {
            $_SESSION['erreur'] = "le formulaire est incomplet";
      }
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Ajouter un produit</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
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
<a href="index.php"> Home</a>
      <H1>Ajouter un produit</H1> <br>
      <Form method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="inputs" class="form-control"/> <br>
            <label for="description">Description</label>
            <input type="text" name="description" id="inputs" class="form-control"/><br>
            <label for="code">Code</label>
            <input type="text" name="code" id="inputs"  class="form-control"/> <br>
            <button class="btn btn-primary"> Add Product</button>
      </form>

      </section>
      </div>
</main>
</body>
</html>