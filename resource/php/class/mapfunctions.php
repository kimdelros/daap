<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $view = new viewmap();
    $maprow = $view->getCountryName($id);
 }

?>