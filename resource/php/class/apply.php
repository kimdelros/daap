<?php
class apply extends config{

    public function verifyStudent($studentID, $studentEmail, $studentName){
      if($studentID == "")
        $message = "Student Number is required!";
      else if($studentEmail == "")
        $message = "Email address is required!";
      else if($studentName == "")
        $message = "Full name is required!";
      else
        return true;

      echo "<script>alert('$message');</script>";
      return false;
    }

    public function fileMover(){

    }

   public function applyStudent($studentID, $studentEmail, $studentName, $appType){
      $link = config::con();

      $sql = "INSERT INTO `applications`(`studentID`, `studentName`, `studentEmail`, `appType`) VALUES ('$studentID', '$studentEmail', '$studentName', '$appType')";

      $stmt = $link->prepare($sql);
      $stmt->execute();
      $lastID = $link->lastInsertId();
      $link->connection = null;

      return ($lastID);
    }

   public function applyAlumni($alumniName, $alumniYB, $alumniDiploma, $alumniTOR, $lastID){
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

         if($this->verifyStudent($studentID, $studentEmail, $studentName)){
           if($alumniName == "")
             $message = "Alumni's Name is required!";
           else if($dip !== '' && $dip !== 'gif' && $dip !== 'png' && $dip !== 'jpg' && $dip !== 'jpeg' && $dip !== 'jfif' && $dip !== 'pdf')
             $message = "Diploma must be an image file or pdf only!";
           else if($yb !== '' && $yb !== 'gif' && $yb !== 'png' && $yb !== 'jpg' && $yb !== 'jpeg' && $yb !== 'jfif' && $yb !== 'pdf')
             $message = "Alumni's Yearbook must be an image file or pdf only!";
           else if($tor !== '' && $tor !== 'gif' && $tor !== 'png' && $tor !== 'jpg' && $tor !== 'jpeg' && $tor !== 'jfif' && $tor !== 'pdf')
             $message = "Transcript of Record must be an image file or pdf only!";
           else if($yb == '' && $dip == '' && $tor == '')
             $message = "Please upload atleast one document!";
           else {
             $lastID = $this->applyStudent($studentID, $studentEmail, $studentName, "1");

             $this->applyAlumni($alumniName, $alumniYB['name'], $alumniDiploma['name'], $alumniTOR['name'], $lastID);
             exit();
           }
           echo "<script>alert('$message');</script>";
           exit();
         }
    }
}
?>
