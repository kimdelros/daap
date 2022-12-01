<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

class viewSummary extends config{
    
    function viewAllData($transID){
        $link = $this->con();
        $sql = "SELECT * FROM `applications` WHERE `transID` = '$transID'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function viewCampus($campusID){
        $link = $this->con();
        $sql = "SELECT * FROM `campus` WHERE `campusID` = '$campusID'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $campus = $stmt->fetchAll();
        return $campus[0]['campusName'];
    }

    function viewCollege($cdID){
        $link = $this->con();
        $sql = "SELECT * FROM `collegedepartment` WHERE `cdID` = '$cdID'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $college = $stmt->fetchAll();
        return $college[0]['cdName'];
    }

    function viewCourse($courseID){
        $link = $this->con();
        $sql = "SELECT * FROM `courses` WHERE `courseID` = '$courseID'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $course = $stmt->fetchAll();
        return $course[0]['courseName'];
    }

    function viewAppType($appType){
        switch($appType){
            case 1: 
                return "Alumni Discount";
            case 2: 
                return "Sibling Discount";
            case 3: 
                return "CEIS Graduate Discount";
          }
    }

    function viewSpecificInfo($appID, $appType){
        $link = $this->con();
        switch($appType){
            case 1:
                $sql = "SELECT * FROM `alumni` WHERE `appID`= '$appID'";
                break;
            case 2:
                $sql = "SELECT * FROM `sibling` WHERE `appID`= '$appID'";
                break;
            case 3:
                $sql = "SELECT * FROM `ceis` WHERE `appID`= '$appID'";
                break;
          }
        $stmt = $link->prepare($sql);
        $stmt->execute();
        return  $stmt->fetchAll();

    }
}
?>