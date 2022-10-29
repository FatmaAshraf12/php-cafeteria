<?php
require_once('Category.php');

$result=Category::delete_Category($_REQUEST['id']);

if ($result) {
	header('location:show_categories.php');
}else
{
 echo $result;
}