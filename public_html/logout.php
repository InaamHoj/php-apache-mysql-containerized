<?php
session_start();
session_destroy();
// Redirect to the login page:
header('Location: index.php');
?>

<h2>log out. Au revoir</h2>