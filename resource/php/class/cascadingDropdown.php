<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

class cascadingDropdown extends config{


    public function getCampus(){
        $link = config::con();
        $sql = "SELECT * FROM `campus`";

        $stmt = $link->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchColumn();
        foreach($rows as $row)
        $campus = $row['campusName'];
        return $campus;
    }

}
?>