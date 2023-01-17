<?php
require_once('connect.php');

if (isset($_POST)) {

      if(isset($_POST["id"]) && !empty($_POST["id"])
      && isset($_POST["name"]) && !empty($_POST["name"])
      && isset($_POST["description"]) && !empty($_POST["description"])
      && isset($_POST["code"]) && !empty($_POST["code"])){
        $id = strip_tags($_POST["id"]);
        $name = strip_tags($_POST["name"]);
        $description = strip_tags($_POST["description"]);
        $code = strip_tags($_POST["code"]);
      
            $sql = "UPDATE product SET name='".$name."', description='".$description."', code='".$code."' WHERE id='".$id."'";
            $query = $db->prepare($sql);
            $query->execute(['id']);

            $_SESSION['message'] = "Produit modifié";
            header('Location: index.php');
     
      } else {
            $_SESSION['erreur'] = "le formulaire est incomplet";
      }
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    
    $id = strip_tags($_GET['id']);

    $sql = "SELECT * FROM product WHERE id='".$id."'";
    $query = $db->prepare($sql);
    $query->execute([$id]);
    $allproducts = $query->fetch();
}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Modifier un produit</title>
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
      <H1>Modifier un produit</H1> <br>
      <Form method="POST">
            <label for="name">Name</label>
            <input type="text" name="name" id="inputs" class="form-control" value="<?= $allproducts['name'] ?>" > <br>
            <label for="description">Description</label>
            <input type="text" name="description" id="inputs" class="form-control" value="<?= $allproducts['description'] ?>" ><br>
            <label for="code">Code</label>
            <input type="text" name="code" id="inputs"  class="form-control" value="<?= $allproducts['code'] ?>" > <br>
            <button class="btn btn-primary"> modifier</button>
            <input type="hidden" name="id" value="<?= $allproducts['id'] ?>" >
      </form>

      </section>
      </div>
</main>
</body>
</html>