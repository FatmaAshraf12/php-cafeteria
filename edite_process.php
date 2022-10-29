<?php 

require_once('User.php');
require_once('save_image.php');
$_REQUEST['image']=save('user',$_FILES);



if(User::update_user(['id'=>$_REQUEST['id']],$_REQUEST))
{
 echo 'successfull updated!!!!!!!';
    
}