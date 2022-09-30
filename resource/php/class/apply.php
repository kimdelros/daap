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
         if(verifyStudent($studentID, $studentEmail, $studentName)){
           if($alumniName == "")
             $message = "Student Number is required!";
           else if($studentEmail == "")
             $message = "Email address is required!";
           else if($studentName == "")
             $message = "Full name is required!";
         }
    }
}
?>
