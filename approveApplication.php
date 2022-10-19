<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

approveApplication();
header('Location:registrar.php');
?>