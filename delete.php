<?php
$DB = 'mysql:host=localhost;dbname=cafe project';
$con = new PDO($DB,'root',"");
$id = $_REQUEST['product_id'];
$q = "DELETE FROM cart WHERE `product_id`=$id";
$sql=$con->prepare($q);
$result = $sql->execute();
echo $result;

?>