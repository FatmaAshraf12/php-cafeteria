<?php
require_once('User.php');

$file = $_FILES['avatar'];
$file_type = $_FILES['avatar']['type'];
$arr=explode('/',$file_type);
$ext = end($arr);
$avatar_name= time() . ".$ext";
move_uploaded_file($file['tmp_name'],"./images/".$avatar_name);

$title=$_REQUEST['title'];
$price=$_REQUEST['price'];
$avatar="./images/".$avatar_name;
var_dump(User::get());