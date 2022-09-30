<?php
class apply{
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

    public function verifyAlumni($studentID, $studentEmail, $studentName, $alumniName, $studentBC, $alumniDiploma, $alumniTOR){
      $bc = pathinfo($studentBC['name'], PATHINFO_EXTENSION);
      $dip = pathinfo($alumniDiploma['name'], PATHINFO_EXTENSION);
      $tor = pathinfo($alumniTOR['name'], PATHINFO_EXTENSION);

         if(verifyStudent($studentID, $studentEmail, $studentName)){
           if($alumniName == "")
             $message = "Alumni's Name is required!";
           else if($dip !== 'gif' && $dip !== 'png' && $dip !== 'jpg' && $dip !== 'jpeg' && $dip !== 'jfif')
             $message = "Diploma must be a image file!";
           else if($bc !== 'pdf')
             $message = "Birth Certificate must be a pdf file!";
           else if($tor !== 'pdf')
             $message = "Transcript of Record must be a pdf file!";
         }
    }
}
?>
