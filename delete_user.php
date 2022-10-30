<?php
require_once('User.php');

$result=User::delete_user($_REQUEST['id']);

echo $result;