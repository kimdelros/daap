<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

class cascadingDropdown extends config{


    public function getAllData(){
        $data = array();
        $ctrCampus = 0;

        $link = config::con();
        $sql = "SELECT * FROM `campus`";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $campuses = $stmt->fetchAll();
        
        $sql = "SELECT * FROM `collegedepartment`";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $colleges = $stmt->fetchAll();

        
        $sql = "SELECT * FROM `courses`";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $courses = $stmt->fetchAll();

        foreach($campuses as $campus){
            $ctrCollege = 0;
            foreach($colleges as $college){
                foreach($courses as $course){
                    if($ctrCampus+1 == $course['campusID'] && $ctrCollege+1 == $course['cdID'])
                        $data[$campus['campusName']][$college['cdName']][] = $course['courseName'];
                }
                $ctrCollege++;
            }
            
            $ctrCampus++;
        }
        return json_encode($data);
    }

}
?>