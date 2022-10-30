<?php
require_once 'Auth.php';
function is_admin() {
	if (Auth::guest() || (Auth::check() && Auth::user()['role'] != 'admin')) { // guest or user but not admin
       // header('location:index.php'); 
	   return false;  
        
	}else {
		return true;
	}
}
?>