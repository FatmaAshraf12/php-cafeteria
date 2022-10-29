<?php
require_once 'Auth.php';
function is_admin() {
	if (Auth::guest() || (Auth::check() && Auth::user()['role'] != 'admin')) {
        header('location:users.php');   
        
	}else {
		return true;
	}
}
?>