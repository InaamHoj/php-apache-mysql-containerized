<?php
require_once('connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    
    $id = strip_tags($_GET['id']);

    $sql = "DELETE FROM product WHERE id='".$id."'";
    $query = $db->prepare($sql);
    $query->execute([$id]);

    header('Location: index.php');
}