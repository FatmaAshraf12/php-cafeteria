<?php
require_once "product.php";
$id=$_REQUEST['id'];
$product = DB::findtById("product",$id);

echo $product["avilable"];

if($product["avilable"]){
    DB::updateCol("product",'avilable',0,$id);
}else{
    DB::updateCol("product",'avilable',1,$id);

}

