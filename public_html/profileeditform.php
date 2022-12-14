<?php
session_start();
$id = $_GET["id"];
$dbh = new PDO("mysql:dbname=dbtest;host=mysql", "root", "rootpassword");
$query = $dbh->query("SELECT * FROM prospect WHERE id='".$id."'");
$query->execute([$id]);
$user = $query->fetch();
?>
<a href="logout.php"> Logout</a>
<h1>Edit profile<h1>
<Form action="" method="POST">

  <input type="text" name="firstName" id="inputs" value="<?= $user["firstName"] ?>" />
        <br /><br />
  <input type="text" name="lastName" id="inputs" value="<?= $user["lastName"]?>"/>
        <br /><br />
  <input id="submit" type="submit" value="submit" />
        <br><br>
        
</Form>

<?php
if(isset($_SESSION["user_id"])) {
$id = $_GET["id"];
$firstname = $user["firstName"];
$lastname = $user["lastName"];

$dbh = new PDO("mysql:dbname=dbtest;host=mysql", "root", "rootpassword");
$query = $dbh->query("UPDATE 'prospect' SET 'firstName'='".$firstname."' WHERE 'id'='".$id."'");
$query->execute([$firstname]);
$query->execute([$id]);
$user = $query->fetch();
} else echo "error";


