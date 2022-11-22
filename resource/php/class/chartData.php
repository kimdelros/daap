<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

class chartData extends config{


    public function getData($year, $sem){
        $link = config::con();

        if($sem == 2)
            $sql = "SELECT * FROM `applications` WHERE `dateApplied` BETWEEN '$year-01-01 00:00:00' and '$year-06-30 23:59:59'";
        else 
            $sql = "SELECT * FROM `applications` WHERE `dateApplied` BETWEEN '$year-07-01 00:00:00' and '$year-12-31 23:59:59'";

        $stmt = $link->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

}
?>