<?php

require_once 'User.php';
require_once 'validator.php';
session_start();

$errors = validator($_POST, [
	'email' => 'required|email|string|min:10|max:100|exists:users,email',
	'password' => 'required|string|min:6|max:100'
]);

if (count($errors) > 0) {
	$_SESSION['errors'] = $errors;
    var_dump($errors);
	header('location:login.php');
}

$row = User::query_excute("SELECT * FROM users WHERE email = '{$_POST['email']}' LIMIT 1");
var_dump($row);
if ($row['password'] == $_POST['password']) {
	// success
	$_SESSION['user_id'] = $row['id'];
	// redirect('index.php');
} else {
	$_SESSION['error'] = 'password is not correct';
	// redirect('login.php');
}