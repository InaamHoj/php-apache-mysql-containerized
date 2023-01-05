<?php

session_start();
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits et formules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<?php
if(isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('connect.php');
    
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
<a href="index.php"> Home</a>
<a href="logout.php"> Logout</a>
<h1> Nos produits </h1>
<li> Name: <?= $allproducts["name"] ?> </li>
<li> Description: <?= $allproducts["description"] ?> </li>
<li> </li> 

<?php
$sql = "SELECT * FROM formule WHERE product_id='".$id."'";
$query = $db->prepare($sql);
$query->execute();
$relativeformule = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<main class="container">
    <div class="row">
        <section class="col-12">
        <h1> Nos formules </h1>
        <table class="table">
            <thead>    
                <th> Name </th>
                <th> Code </th>
                <th> Tarif </th>
            </thead>
            <tbody>
                <?php 
                foreach ($relativeformule as $relativeformule) { ?>
                <tr>
                <td> <?= $relativeformule["formulename"] ?> </td>
                <td> <?= $relativeformule["code"] ?> </td>
                <td> <?= $relativeformule["tarif"] ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </section>
    </div>
</main>
</body>
</html>






