<?php
$DB = 'mysql:host=localhost;dbname=cafe project';
$con = new PDO($DB,'root',"");
  $id = $_GET['product_id'];
     $query_cart = "INSERT INTO cart (`product_id`)
     VALUES ($id)";
    $sql = $con->prepare($query_cart);
    $sql->execute();
     header('Location:product.php');

?>
    