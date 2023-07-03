<?php

session_start();
require_once('connect.php');

$sql = 'SELECT * FROM prospect';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

class Prospect {
    public $id;
    public $firstName;
    public $lastName;
    public $password;
    public $confirm_password;
    public $mobile;
    public $email;

    public function __construct() 
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->confirm_password = $confirm_password;
        $this->mobile = $mobile;
        $this->email = $email;
    
    }   
}  

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
<?php }  


    ?>
    <h1> Liste de prospects </h1>
            <table class="table">
                  <thead>
                        <th> Prenom </th>      
                        <th> Nom </th>
                        <th> Telephone </th>
                        <th> Email </th>
                  </thead>
                  <tbody>
                        <?php
                        foreach ($result as $allprospects) { ?>
                        <tr>
                        <td> <?= $allprospects["firstName"] ?> </td>
                        <td> <?= $allprospects["lastName"] ?> </td>
                        <td> <?= $allprospects["mobile"] ?> </td>
                        <td> <?= $allprospects["email"] ?> </td> ?>
                        <?php
                         if ($_SESSION["user_id"]) { ?>
                        <td> <a href="editproduct.php?id=<?= $allproducts["id"]; ?>" class="btn btn-warning"> Edit</a>
                        <a href="deleteproduct.php?id=<?= $allproducts["id"]; ?>" class="btn btn-danger"> Delete</a>
                         </tr>
                       <?php } ?> 
                       <?php } ?>
                  </tbody>
            </table>
    
