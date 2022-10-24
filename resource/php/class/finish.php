<?php
require $_SERVER['DOCUMENT_ROOT'].'/daap/vendor/sendmail.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
$user = new user();
isAccounting($user->data()->groups);

require 'config.php';

$db = new config();
$con = $db->con();

$transID = $_GET['id'];
$discountedBy = $user->data()->id;
$dateDiscounted = date('Y-m-d H:i:s', time());

$sql = "UPDATE `applications` SET `isDiscounted` = '1', `dateDiscounted` = '$dateDiscounted',  `discountedBy` = $discountedBy WHERE `transID` = '$transID'";
$data= $con->prepare($sql);
$data->execute();

$sql = "SELECT `studentName`, `studentEmail` FROM `applications` WHERE `transID` = '$transID'";
$data= $con->prepare($sql);
$data->execute();
$result = $data->fetchAll(PDO::FETCH_ASSOC);

sendAccountingUpdate($result[0]['studentName'], $result[0]['studentEmail'], $transID);

$strArray = explode('-',$transID);
switch($strArray[0]){
  case "ALUM":
  header('Location: ../../../approveAlumni.php');
  break;
  case "SIBL":
  header('Location: ../../../approveSibling.php');
  break;
  case "CEIS":
  header('Location: ../../../approveCeis.php');
  break;
  default:break;
}
 ?>
