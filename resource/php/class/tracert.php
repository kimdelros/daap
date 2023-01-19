<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/daap/resource/php/class/core/init.php';

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
      $config = new config();
      $link = $config->con();

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
      $config = new config();
      $link = $config->con();

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
      $config = new config();
      $link = $config->con();

      $sql = "SELECT * FROM `courses` WHERE `campusID` = '$campusID' AND `cdID` = '$cdID' AND `courseName` = '$studentCourse'";
      $stmt = $link->prepare($sql);
      $stmt->execute();
      $courseID = $stmt->fetchAll();

      if($courseID[0][0])
        return $courseID[0][0];
      else
        return 0;
    }

    private function verifyCountry($country){
      $link = $this->conn();

      $sql = "SELECT * FROM `tbl_countries` WHERE `countryname` = '$country'";
      $stmt = $link->prepare($sql);
      $stmt->execute();
      $countryCode = $stmt->fetchAll();

      if($countryCode[0]['ccode'])
        return $countryCode[0]['ccode'];
      else
        return "";
    }


    public function verifyTracert($firstname, $middlename, $lastname, $campus, $college, $course, $yearsGrad, $country, $companyName){
        $error = "";
        $campusID = $this->verifyCampus($campus);
        $cdID = $this->verifycollege($campusID, $college);
        $courseID = $this->verifycourse($campusID, $cdID, $course);
        $countryCode = $this->verifyCountry($country);

        if($campusID == 0)
          $error = "Campus is invalid.";
        else if($cdID == 0)
          $error = "College is invalid.";
        else if($courseID == 0)
          $error = "Course is invalid.";
        else if($countryCode == "")
          $error = "Country is invalid.";
        else
          $error = $this->verifyFullname("$firstname $middlename $lastname");

        if($error == "" && preg_match("/[\^£$%&*()}{@#~?><>,|=_+¬-]/", $companyName))
          $error = "Input Error.\\nCompany Name should not contain any special character";

        if($error == ""){

          switch($campusID){
            case 1: $campusCode="MLS"; break;
            case 2: $campusCode="MNL"; break;
            case 3: $campusCode="MKT"; break;
          }

          $link = $this->conn();

          $sql = "INSERT INTO `tbl_students`(`firstName`, `middleName`, `lastName`, `degree`, `yearsGrad`, `campus`, `country`, `company_name`,`employee_name`) VALUES ('$firstname', '$middlename', '$lastname', '$course', '$yearsGrad', '$campusCode', '$countryCode', '$companyName', 'N/A')";
          $stmt = $link->prepare($sql);
          $stmt->execute();

          echo "<script>
             Swal.fire({
                    title: \"Thank you for the information!\",
                    icon: \"success\",
                    width: 700
              }).then(function() {
                    window.location = \"index.php\";
              });
             </script>";

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