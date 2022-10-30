<?php 

require_once('Category.php');



if(Category::update_Category(['id'=>$_REQUEST['id']],$_REQUEST))
{
	header('location:show_categories.php');
}