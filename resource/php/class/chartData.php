<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

class chartData extends config{


    public function getData(){
        $link = config::con();

        $sql = "SELECT * FROM `applications` WHERE `dateApplied` BETWEEN '$year1-03-11 00:00:00' and '2012-05-11 23:59:00'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
    }
?>