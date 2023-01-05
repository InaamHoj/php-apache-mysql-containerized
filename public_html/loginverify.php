<?php
session_start();
require_once('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['useremail'];
    $password = $_POST['userpassword'];
}

//check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['useremail'], $_POST["userpassword"])) {
    // Could not get the data that should have been sent.
    echo 'Please fill both the username and password fields!';
}

    $sql = "SELECT * from prospect where email='".$email."'";
    $query = $db->prepare($sql);
    $query->execute();
    $user = $query->fetch();


if ((password_verify($password, $user["password"]))) {
    unset($user['password']); ///unset pour supprimer le password de la mémoire
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["user_firstName"] = $user["firstName"];
    $_SESSION["user_lastName"] = $user["lastName"];
    header("Location: index.php");
} else {
    echo "<p>Email ou mot de passe incorrect</p>";
}



