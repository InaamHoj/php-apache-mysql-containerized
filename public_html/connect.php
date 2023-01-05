<?php
try{
  $db = new PDO('mysql:dbname=dbtest;host=mysql', 'root', 'rootpassword');
} catch (PDOException $e){
  echo 'Erreur : '.$e->getMessage();
  die();
}
?>
