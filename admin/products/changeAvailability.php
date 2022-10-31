<?php
require_once "product.php";
$id=$_REQUEST['id'];
$product = DB::findtById("product",$id);
echo $product["avilable"];

