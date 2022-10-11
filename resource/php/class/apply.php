<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/sendEmail.php';
class apply extends config{

    private function verifyStudent($studentID, $studentEmail, $studentName){
      $studentName = str_replace(' ', '', $studentName);
      $studentName = str_replace('.', '', $studentName);

      if($studentID == "")
        $message = "Student Number is required!";
      else if(!preg_match("/^[0-9]{4,4}+\-[0-9]{5,5}$/", $studentID))
        $message = "Student Number is invalid!";
      else if($studentEmail == "")
        $message = "Email address is required!";
      else if(!filter_var($studentEmail, FILTER_VALIDATE_EMAIL))
        $message = "Email address is invalid!";
      else if($studentName == "")
        $message = "Full name is required!";
      else if(!ctype_alpha($studentName))
        $message = "Full Name is invalid!";
      else
        return true;

      echo "<script>alert('$message');</script>";
      return false;
    }

    private function getTransID($transID){
      $length = 20;
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
        default:
          break;
      }
      $pathFile = $targetDir . $file["name"];
      move_uploaded_file($file["tmp_name"], $pathFile);
      return $pathFile;
    }

   private function applyStudent($studentID, $studentEmail, $studentName, $appType, $transID){
      $link = config::con();

      $sql = "INSERT INTO `applications`(`studentID`, `studentName`, `studentEmail`, `appType`, `transID`) VALUES ('$studentID', '$studentEmail', '$studentName', '$appType', '$transID')";

      $stmt = $link->prepare($sql);
      $stmt->execute();
      $lastID = $link->lastInsertId();
      $link->connection = null;
      return ($lastID);
    }

   private function applyAlumni($lastID, $alumniName, $alumniYB, $alumniDiploma, $alumniTOR){
      $link = config::con();

      $sql = "INSERT INTO `alumni`(`appID`, `alumniName`, `alumniYB`, `alumniDiploma`, `alumniTOR`) VALUES ('$lastID', '$alumniName', '$alumniYB', '$alumniDiploma', '$alumniTOR')";

      $link = $link->prepare($sql);
      $link->execute();
      $link->connection = null;
    }

    public function verifyAlumni($studentID, $studentEmail, $studentName, $alumniName, $alumniYB, $alumniDiploma, $alumniTOR){
      $yb = pathinfo($alumniYB['name'], PATHINFO_EXTENSION);
      $dip = pathinfo($alumniDiploma['name'], PATHINFO_EXTENSION);
      $tor = pathinfo($alumniTOR['name'], PATHINFO_EXTENSION);

      $tempAName = str_replace(' ', '', $alumniName);
      $tempAName = str_replace('.', '', $tempAName);

         if($this->verifyStudent($studentID, $studentEmail, $studentName)){
           if($alumniName == "")
             $message = "Alumni's Name is required!";
           else if(!ctype_alpha($tempAName))
             $message = "Alumni's Name is invalid!";
           else if($dip !== '' && $dip !== 'gif' && $dip !== 'png' && $dip !== 'jpg' && $dip !== 'jpeg' && $dip !== 'jfif')
             $message = "Diploma must be an image file only!";
           else if($yb !== '' && $yb !== 'gif' && $yb !== 'png' && $yb !== 'jpg' && $yb !== 'jpeg' && $yb !== 'jfif')
             $message = "Alumni's Yearbook must be an image file only!";
           else if($tor !== '' && $tor !== 'gif' && $tor !== 'png' && $tor !== 'jpg' && $tor !== 'jpeg' && $tor !== 'jfif')
             $message = "Transcript of Record must be an image file only!";
           else if($yb == '' && $dip == '' && $tor == '')
             $message = "Please upload atleast one document!";
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
                    window.location = \"landing.php\";
              });
             </script>";

             //email
             exit();
           }
           echo "<script>alert('$message');</script>";
           exit();
         }
    }
}
?>
