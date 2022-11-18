<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

class changePassword extends config{

    private function verifyCurrentPassword($password, $salt, $currentPassword){
        if($password == Hash::make($currentPassword,$salt))
            return $error = "";
        else
            return $error = "The current password does not match our records!";
    }
    
    private function verifyNewPassword($newPassword, $confirmPassword){
        if($newPassword == "" || $newPassword == null)
            return $error = "Input Error.\\nPlease enter a password";
        if(strlen($newPassword) < 8 || strlen($newPassword) > 16)
            return $error = "Input Error.\\nPassword should be min 8 characters and max 16 characters";
        if(!preg_match("/\d/", $newPassword))
            return $error = "Input Error.\\nPassword should contain at least one digit";
        if(!preg_match("/[A-Z]/", $newPassword))
            return $error = "Input Error.\\nPassword should contain at least one Capital Letter";
        if(!preg_match("/[a-z]/", $newPassword))
            return $error = "Input Error.\\nPassword should contain at least one small Letter";
        if(!preg_match("/\W/", $newPassword))
            return $error = "Input Error.\\nPassword should contain at least one special character";
        if(preg_match("/\s/", $newPassword))
            return $error = "Input Error.\\nPassword should not contain any white space";
        if($confirmPassword == "" || $confirmPassword == null)
            return $error = "Input Error.\\nPlease enter a confirm password";
        if(!($newPassword == $confirmPassword))
            return $error = "Input Error.\\nPasswords are not matching.";
        
        return $error = "";
    }

    public function verifyPass($username, $password, $salt, $currentPassword, $newPassword, $confirmPassword, $group){
        $error = $this->verifyCurrentPassword($password, $salt, $currentPassword);
        if($error == "")        
            $error = $this->verifyNewPassword($newPassword, $confirmPassword);
        
        if($newPassword == $currentPassword && $error == "")
            $error = "Please enter new password.";

        if($error == ""){
            $newSalt = Hash::salt(32);
            $newPassword = Hash::make($newPassword,$newSalt);

            $link = config::con();

            $sql = "UPDATE `tbl_accounts` SET `password` = '$newPassword', `salt` = '$newSalt' WHERE `username` = '$username'";
            $stmt = $link->prepare($sql);
            $stmt->execute();

            if($group == 1)
                $location = "changepassword.php";
            else
                $location = "changepasswordacc.php";

            echo "<script>
             Swal.fire({
                    title: \"You have successfully changed your password!\",
                    icon: \"success\",
                    width: 700
              }).then(function() {
                window.location = \"$location\";
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