<?php
require 'config.php';

$db = new config();
$con = $db->con();

$transID = $_GET['id'];
$sql = "UPDATE `applications` SET `isHold` = '1' WHERE `transID` = '$transID'";
$data= $con->prepare($sql);
$data->execute();

$strArray = explode('-',$transID);
// switch($strArray[0]){
//   case "ALUM":
//   header('Location: ../../../pendingAlumni.php');
//   break;
//   case "SIBL":
//   header('Location: ../../../pendingSibling.php');
//   break;
//   case "CEIS":
//   header('Location: ../../../pendingCeis.php');
//   break;
//   default:break;
// }
 ?>
