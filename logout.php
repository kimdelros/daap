<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
$user = new user();
$user->logout();
Redirect::to('login.php');
 ?>
