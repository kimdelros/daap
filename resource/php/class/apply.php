<?php
require $_SERVER['DOCUMENT_ROOT'].'/daap/vendor/sendmail.php';
class apply extends config{

    private function verifyStudent($studentID, $studentEmail, $studentName){
      $studentName = str_replace(' ', '', $studentName);
      $studentName = str_replace('.', '', $studentName);

      if($studentID == "")
        $message = "Student Number is required.";
      else if(!preg_match("/^[0-9]{4,4}+\-[0-9]{5,5}$/", $studentID))
        $message = "Student Number is invalid.";
      else if($studentEmail == "")
        $message = "Email address is required.";
      else if(!filter_var($studentEmail, FILTER_VALIDATE_EMAIL))
        $message = "Email address is invalid.";
      else if($studentName == "")
        $message = "Applicant's name is required.";
      else if(!ctype_alpha($studentName))
        $message = "Applicant's Name is invalid.";
      else
        return true;

      echo "<script>
      Swal.fire({
             title: \"$message\",
             icon: \"error\",
             width: 900
       });
      </script>";
      return false;
    }

    private function getTransID($transID){
      $length = 20;
      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      for ($ctr = 0; $ctr < $length; $ctr++) {
          $transID .= $characters[rand(0, $charactersLength - 1)];
      }
      return $transID;
    }

    private function checkTransID($transID){
      $link = config::con();

      $sql = "SELECT * FROM `applications` WHERE `transID` = '$transID'";
      $stmt = $link->prepare($sql);
      $stmt->execute();
      if($stmt->rowCount() > 0)
        return true;
      else
        return false;
    }

    private function storeFile($file, $type, $transID){
      $imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
      $file['name'] = $transID.".".$type.".".$imageFileType;
      switch ($type) {
        case "1":
        $targetDir = "resource/documents/alumniYB/";
          break;
        case "2":
        $targetDir = "resource/documents/alumniDiploma/";
          break;
        case "3":
        $targetDir = "resource/documents/alumniTOR/";
          break;
        case "4":
        $targetDir = "resource/documents/applicantCOM/";
          break;
        case "5":
        $targetDir = "resource/documents/siblingCOM/";
          break;
        case "6":
        $targetDir = "resource/documents/applicantDiploma/";
          break;
        default:
          break;
      }
      $pathFile = $targetDir . $file["name"];
      move_uploaded_file($file["tmp_name"], $pathFile);
      return $pathFile;
    }

   private function applyStudent($studentID, $studentEmail, $studentName, $appType, $transID){
     $dateApplied = date('Y-m-d H:i:s', time());

      $link = config::con();

      $sql = "INSERT INTO `applications`(`studentID`, `studentName`, `studentEmail`, `appType`, `transID`, `dateApplied`) VALUES ('$studentID', '$studentName', '$studentEmail', '$appType', '$transID', '$dateApplied')";

      $stmt = $link->prepare($sql);
      $stmt->execute();
      $lastID = $link->lastInsertId();
      $link->connection = null;
      return $lastID;
    }

   private function applyAlumni($lastID, $alumniName, $alumniYB, $alumniDiploma, $alumniTOR){
      $link = config::con();

      $sql = "INSERT INTO `alumni`(`appID`, `alumniName`, `alumniYB`, `alumniDiploma`, `alumniTOR`) VALUES ('$lastID', '$alumniName', '$alumniYB', '$alumniDiploma', '$alumniTOR')";

      $link = $link->prepare($sql);
      $link->execute();
      $link->connection = null;
    }

    public function verifyAlumni($studentID, $studentEmail, $studentName, $studentYearLevel, $studentCourse, $studentCampus, $alumniName, $alumniCampusGraduated, $alumniYearGraduated, $alumniYB, $alumniDiploma, $alumniTOR){
      $maxSize = 2 * 1024 * 1024;

      $yb = strtolower(pathinfo($alumniYB['name'], PATHINFO_EXTENSION));
      $dip = strtolower(pathinfo($alumniDiploma['name'], PATHINFO_EXTENSION));
      $tor = strtolower(pathinfo($alumniTOR['name'], PATHINFO_EXTENSION));

      $tempAName = str_replace(' ', '', $alumniName);
      $tempAName = str_replace('.', '', $tempAName);

         if($this->verifyStudent($studentID, $studentEmail, $studentName)){
           if($alumniName == "")
             $message = "Alumni's Name is required.";
           else if(!ctype_alpha($tempAName))
             $message = "Alumni's Name is invalid.";
           else if($dip !== '' && $dip !== 'gif' && $dip !== 'png' && $dip !== 'jpg' && $dip !== 'jpeg' && $dip !== 'jfif')
             $message = "Diploma must be an image file only.";
           else if($yb !== '' && $yb !== 'gif' && $yb !== 'png' && $yb !== 'jpg' && $yb !== 'jpeg' && $yb !== 'jfif')
             $message = "Alumni's Yearbook must be an image file only!";
           else if($tor !== '' && $tor !== 'gif' && $tor !== 'png' && $tor !== 'jpg' && $tor !== 'jpeg' && $tor !== 'jfif')
             $message = "Alumni's TOR must be an image file only.";
           else if($yb == '' && $dip == '' && $tor == '')
             $message = "Please upload atleast one document.";
           else if($alumniYB['size'] >= $maxSize && $alumniDiploma ['size'] >= $maxSize && $alumniTOR['size'] >= $maxSize)
             $message = "File too large. File must be less than 2 megabytes.";
           else {
             do{
               $transID = $this->getTransID('ALUM-');
             }while($this->checkTransID($transID));
             $lastID = $this->applyStudent($studentID, $studentEmail, $studentName, "1", $transID);

             if($alumniYB['name'] != '')
                $AYB = $this->storeFile($alumniYB, "1", $transID);
             else
                $AYB = '';
             if($alumniDiploma['name'] != '')
                $AD = $this->storeFile($alumniDiploma, "2", $transID);
             else
                $AD = '';
             if($alumniTOR['name'] != '')
                $ATOR = $this->storeFile($alumniTOR, "3", $transID);
             else
                $ATOR = '';
             $this->applyAlumni($lastID, $alumniName, $AYB, $AD, $ATOR);
             echo "<script>
             Swal.fire({
                    title: \"Your application has been submitted!\",
                    html: \"Your tracking ID is: <br>\" +
                    \"<b>$transID</b>\",
                    icon: \"success\",
                    width: 700
              }).then(function() {
                    window.location = \"index.php\";
              });
             </script>";
             sendConfirmationEmail($studentName, $studentEmail, "Alumni Discount", $transID);
             notifyRegistrar("Alumni Discount", $transID);
             exit();
           }
           echo "<script>
           Swal.fire({
                  title: \"$message\",
                  icon: \"error\",
                  width: 900
            });
           </script>";
           exit();
         }
    }

    private function applySibling($lastID, $siblingID, $siblingName, $applicantCOM, $siblingCOM){
       $link = config::con();

       $sql = "INSERT INTO `sibling`(`appID`, `siblingStudentID`, `siblingName`, `applicantCOM`, `siblingCOM`) VALUES ('$lastID', '$siblingID', '$siblingName', '$applicantCOM', '$siblingCOM')";

       $link = $link->prepare($sql);
       $link->execute();
       $link->connection = null;
     }

    public function verifySibling($studentID, $studentEmail, $studentName, $siblingID, $siblingName, $applicantCOM, $siblingCOM){
      $maxSize = 2 * 1024 * 1024;

      $acom = strtolower(pathinfo($applicantCOM['name'], PATHINFO_EXTENSION));
      $scom = strtolower(pathinfo($siblingCOM['name'], PATHINFO_EXTENSION));

      $tempSName = str_replace(' ', '', $siblingName);
      $tempSName = str_replace('.', '', $tempSName);

         if($this->verifyStudent($studentID, $studentEmail, $studentName)){
           if($siblingID == "")
             $message = "Student Number is required.";
           else if(!preg_match("/^[0-9]{4,4}+\-[0-9]{5,5}$/", $siblingID))
             $message = "Student Number is invalid.";
             else if($siblingName == "")
             $message = "Sibling's Name is required.";
           else if(!ctype_alpha($tempSName))
             $message = "Sibling's Name is invalid.";
           else if($acom == '')
             $message = "Applicant's COM is required.";
           else if($scom == '')
             $message = "Sibling's COM is required.";
           else if($acom !== 'gif' && $acom !== 'png' && $acom !== 'jpg' && $acom !== 'jpeg' && $acom !== 'jfif')
             $message = "Applicant's COM must be an image file only!";
           else if($scom !== 'gif' && $scom !== 'png' && $scom !== 'jpg' && $scom !== 'jpeg' && $scom !== 'jfif')
             $message = "Sibling's COM must be an image file only!";
           else if($applicantCOM['size'] >= $maxSize && $siblingCOM ['size'] >= $maxSize)
             $message = "File too large. File must be less than 2 megabytes.";
           else {
             do{
               $transID = $this->getTransID('SIBL-');
             }while($this->checkTransID($transID));
             $lastID = $this->applyStudent($studentID, $studentEmail, $studentName, "2", $transID);


             $ACM = $this->storeFile($applicantCOM, "4", $transID);
             $SCM = $this->storeFile($siblingCOM, "5", $transID);
             $this->applySibling($lastID, $siblingID, $siblingName, $ACM, $SCM);
             echo "<script>
             Swal.fire({
                    title: \"Your application has been submitted!\",
                    html: \"Your tracking ID is: <br>\" +
                    \"<b>$transID</b>\",
                    icon: \"success\",
                    width: 700
              }).then(function() {
                    window.location = \"index.php\";
              });
             </script>";
             sendConfirmationEmail($studentName, $studentEmail, "Sibling Discount", $transID);
             notifyRegistrar("Sibling Discount", $transID);
             exit();
           }
           echo "<script>
           Swal.fire({
                  title: \"$message\",
                  icon: \"error\",
                  width: 900
            });
           </script>";
           exit();
         }
    }
    private function applyCEIS($lastID, $CEISstudentID, $CDIP){
       $link = config::con();

       $sql = "INSERT INTO `ceis`(`appID`, `studentCID`, `studentDiploma`) VALUES ('$lastID', '$CEISstudentID', '$CDIP')";

       $link = $link->prepare($sql);
       $link->execute();
       $link->connection = null;
     }

    public function verifyCEIS($studentID, $CEISstudentID, $studentEmail, $studentName, $ceisDiploma){
      $maxSize = 2 * 1024 * 1024;

      $dip = strtolower(pathinfo($ceisDiploma['name'], PATHINFO_EXTENSION));

         if($this->verifyStudent($studentID, $studentEmail, $studentName)){
           if($CEISstudentID == "")
             $message = "CIES Student Number is required.";
           else if(!preg_match("/^[0-9]{4,4}+\-[0-9]{5,5}$/", $CEISstudentID))
             $message = "CEIS Student Number is invalid.";
           else if($dip == '')
             $message = "Applicant's CEIS Diploma is required.";
           else if($dip !== 'gif' && $dip !== 'png' && $dip !== 'jpg' && $dip !== 'jpeg' && $dip !== 'jfif')
             $message = "Applicant's CEIS Diploma must be an image file only.";
           else if($ceisDiploma['size'] >= $maxSize)
            $message = "File too large. File must be less than 2MB.";
           else {
             do{
               $transID = $this->getTransID('CEIS-');
             }while($this->checkTransID($transID));
             $lastID = $this->applyStudent($studentID, $studentEmail, $studentName, "3", $transID);

             $CDIP = $this->storeFile($ceisDiploma, "6", $transID);
             $this->applyCEIS($lastID, $CEISstudentID, $CDIP);
             echo "<script>
             Swal.fire({
                    title: \"Your application has been submitted!\",
                    html: \"Your tracking ID is: <br>\" +
                    \"<b>$transID</b>\",
                    icon: \"success\",
                    width: 700
              }).then(function() {
                    window.location = \"index.php\";
              });
             </script>";
             sendConfirmationEmail($studentName, $studentEmail, "CEIS Graduate Discount", $transID);
             notifyRegistrar("CEIS Graduate Discount", $transID);
             exit();
           }
           echo "<script>
           Swal.fire({
                  title: \"$message\",
                  icon: \"error\",
                  width: 900
            });
           </script>";
           exit();
         }
    }
}
?>
