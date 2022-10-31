<?php


include __DIR__ . '/layout/header.php';
require_once __DIR__ . '/classes/product_order.php';
require_once __DIR__ . '/classes/order.php';


$DB = 'mysql:host=127.0.0.1:4306;dbname=cafeteria';
$con = new PDO($DB,'root',"");

$user_id = $_SESSION["user_id"] ;

  $id = $_GET['product_id'];
     $query_cart = "INSERT INTO cart (`user_id`, `product_id`, `quantity`) VALUES ($user_id , $id , 1)";

    $sql = $con->prepare($query_cart);
    $sql->execute();
     header('Location:product.php');

?>
    