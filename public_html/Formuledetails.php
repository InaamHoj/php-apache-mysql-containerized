<?php
session_start();
require_once('connect.php');
require_once('Formule.php');
require_once('Product.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formule détaillée</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

<?php

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);

    $sql = "SELECT p.*, f.formulename, f.code, f.tarif from product p LEFT JOIN formule f ON p.id=f.product_id WHERE f.id=?";
    $query = $db->prepare($sql);
    $query->execute([$id]);
    $formuledetails = $query->fetch();

}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}

?>
<a href="index.php"> Home</a>
<?php
    if ($_SESSION["user_id"]) { ?>
    <a href="logout.php"> Logout</a>
    <?php } ?>

<table class="table">
<thead>    
    <th> Nom produit </th>
    <th> Description produit </th>
    <th> Nom formule</th>
    <th> Code </th>
    <th> Tarif </th>
</thead>
<tbody> 
    <tr>
    <td> <?= $formuledetails["name"] ?> </td>
    <td> <?= $formuledetails["description"] ?> </td>
    <td> <?= $formuledetails["formulename"] ?> </td>
    <td> <?= $formuledetails["code"] ?> </td>
    <td> <?= $formuledetails["tarif"] ?> </td>
    </tr>
</tbody>
</table>
<?php
if ($_SESSION["user_id"]) { ?>
            <a href="Devis.php?id=<?= $relativeformule["id"] ?>" class="btn btn-primary"> Imprimer devis </a>
            <?php } ?>
<?php
