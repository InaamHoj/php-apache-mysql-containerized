<?php
include "Formule.php"; 
$id = $_GET["id"];
$dbh = new PDO("mysql:dbname=dbtest;host=mysql", "root", "rootpassword");
$query = $dbh->query("SELECT * FROM product WHERE id='".$id."'");
$query->execute([$id]);
$allproducts = $query->fetch();

?>

<h1> Nos produits </h1>
<li> Name: <?= $allproducts["name"] ?> </li>
<li> Description: <?= $allproducts["description"] ?> </li>
<li> </li> 

<?php
$dbh = new PDO("mysql:dbname=dbtest;host=mysql", "root", "rootpassword");
$query = $dbh->query("SELECT * FROM formule WHERE product_id='".$id."'");
$query->execute([$product_id]);
$relativeformule = $query->fetchAll();
foreach ($relativeformule as $relativeformule) {
    ?>


<h1> Nos formules </h1>
<li> Name: <?= $relativeformule["formulename"] ?> </li>
<li> Code: <?= $relativeformule["code"] ?> </li>
<li> Tarif: <?= $relativeformule["tarif"] ?> </li>
<?php
}





