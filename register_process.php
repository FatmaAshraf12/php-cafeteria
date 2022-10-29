<?php 

require_once('User.php');
require_once('save_image.php');
require_once('validator.php');
session_start();
$errors = validator($_REQUEST, [
	'name' => 'required|string|min:3|max:50',
	'email' => 'required|email|string|min:10|max:255',
	'password' => 'required|numeric|min:8',
	'room' => 'required|numeric',
	'ext' => 'required|numeric',
]);

$result=save('user',$_FILES);
if ($result) {
    $_REQUEST['image']=save('user',$_FILES);
}else{
    $errors['image']='insert valied image';
}

if (count($errors) > 0) {
	$_SESSION['errors'] = $errors;
	header('location:admin_add_user/addUser.php');
    // var_dump($_SESSION['errors']);
}else{
    
    if(User::store($_REQUEST))
    {
        header('location:users.php');   
    }

}