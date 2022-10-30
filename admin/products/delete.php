<?php
require_once "product.php";
$id=$_REQUEST['id'];
$product = DB::findtById("product",$id);
if(file_exists('../../assets/img/'.$product['image'])){
    unlink('../../assets/img/'.$product['image']);
}
$result=DB::delete("product",$id);
echo $result;