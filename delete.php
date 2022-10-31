<?php

include __DIR__ . '/layout/header.php';
require_once __DIR__ . '/classes/product_order.php';
require_once __DIR__ . '/classes/order.php';


$DB = 'mysql:host=127.0.0.1:4306;dbname=cafeteria';
$con = new PDO($DB,'root',"");

$user_id = $_SESSION["user_id"] ;

$id = $_REQUEST['product_id'];
$q = "DELETE FROM cart WHERE `product_id`=$id AND `user_id` = $user_id ";
$sql=$con->prepare($q);
$result = $sql->execute();
echo $result;

?>