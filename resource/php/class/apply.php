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

   public function applyStudent($studentID, $studentEmail, $studentName, $appType){
      $link = config::con();

      $sql = "INSERT INTO `applications`(`studentID`, `studentName`, `studentEmail`, `appType`) VALUES ('$studentID', '$studentEmail', '$studentName', '$appType')";

      $stmt = $link->prepare($sql);
      $stmt->execute();
      $lastID = $link->lastInsertId();
      $link->connection = null;

      return ($lastID);
    }

   public function applyAlumni($alumniName, $studentBC, $alumniDiploma, $alumniTOR, $lastID){
      $link = config::con();

      $sql = "INSERT INTO `alumni`(`appID`, `studentBC`, `alumniName`, `alumniDiploma`, `alumniTOR`) VALUES ('$lastID', '$alumniName', '$studentBC', '$alumniDiploma', '$alumniTOR')";

      $link = $link->prepare($sql);
      $link->execute();
      $link->connection = null;
    }

    public function verifyAlumni($studentID, $studentEmail, $studentName, $alumniName, $studentBC, $alumniDiploma, $alumniTOR){
      $bc = pathinfo($studentBC['name'], PATHINFO_EXTENSION);
      $dip = pathinfo($alumniDiploma['name'], PATHINFO_EXTENSION);
      $tor = pathinfo($alumniTOR['name'], PATHINFO_EXTENSION);

         if($this->verifyStudent($studentID, $studentEmail, $studentName)){
           if($alumniName == "")
             $message = "Alumni's Name is required!";
           else if($dip !== 'gif' && $dip !== 'png' && $dip !== 'jpg' && $dip !== 'jpeg' && $dip !== 'jfif')
             $message = "Diploma must be a image file!";
           else if($bc !== 'pdf')
             $message = "Birth Certificate must be a pdf file!";
           else if($tor !== 'pdf')
             $message = "Transcript of Record must be a pdf file!";
           else {
             $lastID = $this->applyStudent($studentID, $studentEmail, $studentName, "1");
             $this->applyAlumni($alumniName, $studentBC['name'], $alumniDiploma['name'], $alumniTOR['name'], $lastID);
             exit();
           }
           echo "<script>alert('$message');</script>";
           exit();
         }
    }
}
?>
