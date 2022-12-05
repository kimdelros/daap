<?php 

class tracert extends config2{

    private function verifyFullname($fullname){
        if($fullname == "" || $fullname == null)
            return $error = "Input Error.\\nPlease enter your full name.";
        if(preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $fullname))
            return $error = "Input Error.\\nName should not contain any special character";
        if(preg_match("/\d/", $fullname))
            return $error = "Input Error.\\nName should not contain any digit";
        if(preg_match("/\s\s/", $fullname))
            return $error = "Input Error.\\nName should not contain too much spaces";
         
        return $error = "";
    }

    private function verifyCampus($studentCampus){
        $link = config::con();
  
        $sql = "SELECT * FROM `campus` WHERE `campusName` = '$studentCampus'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $campusID = $stmt->fetchAll();
  
        if($campusID[0][0])
          return $campusID[0][0];
        else
          return 0;
      }
  
      private function verifyCollege($campusID, $studentCollege){
        $link = config::con();
  
        $sql = "SELECT * FROM `collegedepartment` WHERE `campusID` = '$campusID' AND `cdName` = '$studentCollege'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $cdID = $stmt->fetchAll();
  
        if($cdID[0][0])
          return $cdID[0][0];
        else
          return 0;
      }
  
      private function verifyCourse($campusID, $cdID, $studentCourse){
        $link = config::con();
  
        $sql = "SELECT * FROM `courses` WHERE `campusID` = '$campusID' AND `cdID` = '$cdID' AND `courseName` = '$studentCourse'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        $courseID = $stmt->fetchAll();
  
        if($courseID[0][0])
          return $courseID[0][0];
        else
          return 0;
      }

    public function verifyTracert($firstname, $middlename, $lastname, $campus, $college, $course, $country, $companyName){
        $error = "";

        $error = $this->verifyFullname("$firstname $middlename $lastname");
        if($error = "")
            $campusID = $this->verifyCampus($campus);


        var_dump($error);

        if($error == ""){

        }else{
            echo "<script>
                Swal.fire({
                        title: \"$error\",
                        icon: \"error\",
                        width: 900
                });
                </script>";
            }
    }

}

?>