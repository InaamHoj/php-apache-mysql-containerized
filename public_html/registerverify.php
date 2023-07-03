<?php
include "connect.php";

$firstname = $lastname = $email = $password = $confirm_password = $mobile = "";
$firstname_err = $lastname_err = $email_err = $password_err = $confirm_password_err = $mobile_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty(trim($_POST["firstname"]))){
        $firstname_err = " please enter a first name ";
    } else if(!preg_match('/^[a-zA-Z]+$/', trim($_POST['firstname']))){
        $firstname_err = " firstname can only contain letters ";
    }else {
        $sql = "SELECT id FROM users WHERE firstname = ?";
        $firstname = htmlspecialchars($_POST["firstname"]);
    };

    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "please enter a last name ";
    } else if(!preg_match('/^[a-zA-Z]+$/', trim($_POST['lastname']))){
        $lastname_err = "lastname can only contain letters";
    }else {
        $sql = "SELECT id FROM users WHERE lastname = ?";
        $lastname = htmlspecialchars($_POST["lastname"]);
    };

    if(empty(trim($_POST["email"]))) {
       $email_err = "please enter an email";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

   if(empty(trim($_POST["password"]))){
    $password_err = "Please enter a password";
   } elseif(strlen(trim($_POST["password"])) < 6){
    $password_err = "Password must have atleast 6 characters.";
    } else{
    $password = htmlspecialchars($_POST["password"]);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   }

   if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Please confirm password.";
} else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(!empty($password_err) || ($password != $confirm_password)){
        $confirm_password_err = "Password did not match.";
    }
}
if(empty(trim($_POST["mobile"]))) {
    $mobile_err = "please enter an mobile number";
 } else {
     $mobile = htmlspecialchars($_POST["mobile"]);
 }

}

if (isset($confirm_password_err) && !empty($confirm_password_err)) {
    echo $confirm_password_err;
    die;
}

$sql = "INSERT INTO prospect (firstName, lastName, email, password, mobile) VALUES (?,?,?,?,?)";
$query = $db->prepare($sql);
$query->execute([$firstName, $lastName, $email, $password, $mobile]);

 
if(!$query){
    var_dump($query->errorInfo());die;
}

if ($query == true) {
    header("Location: login.php");
    echo "Please login to access the page";
} 
