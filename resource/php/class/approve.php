<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
$user = new user();
isRegistrar($user->data()->groups);

require 'config.php';

$db = new config();
$con = $db->con();

$transID = $_GET['id'];
$approvedBy = $user->data()->id;
$dateApproved = date('Y-m-d H:i:s', time());

$sql = "UPDATE `applications` SET `isApproved` = '1', `dateApproved` = '$dateApproved',  `approvedBy` = $approvedBy WHERE `transID` = '$transID'";
$data= $con->prepare($sql);
$data->execute();

$strArray = explode('-',$transID);
switch($strArray[0]){
  case "ALUM":
  header('Location: ../../../pendingAlumni.php');
  break;
  case "SIBL":
  header('Location: ../../../pendingSibling.php');
  break;
  case "CEIS":
  header('Location: ../../../pendingCeis.php');
  break;
  default:break;
}
 ?>
