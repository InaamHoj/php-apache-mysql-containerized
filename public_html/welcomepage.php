<?php
session_start();
if(!isset($_SESSION["user"])) {
    session_destroy();
    header("Location: login.php?error=true");
} 
?>
<p>welcome <?php echo $_SESSION["user"]["firstName"];?>! You are connected</p>