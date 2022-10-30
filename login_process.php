<?php

require_once 'User.php';
require_once 'validator.php';
session_start();
$errors = validator($_REQUEST, [
	'email' => 'required|email|string|min:10|max:100',
	'password' => 'required|string|min:6|max:100'
]);
if (count($errors) > 0) {
	$_SESSION['errors'] = $errors;
    header('location:login.php');   
}
$users=User::get();
function Even($user)
{
      if($user['email']==$_REQUEST['email'])
       return $user;
    else 
       return FALSE; 
}
$row=array_filter($users, "Even");

if ($row){
 
    if ($row[0]['password'] == $_REQUEST['password']) {

        $_SESSION['user_id'] = $row[0]['id'];
       
        header('location:users.php');   

    } else {
        $_SESSION['error'] = 'email or password are not found';
        header('location:login.php');   
    }
}else {
    $_SESSION['error'] = 'email or password are not found';
}

