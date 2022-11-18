<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

class updateProfile extends config{

    private function checkUsername($username){
        $link = config::con();
    
        $sql = "SELECT * FROM `tbl_accounts` WHERE `username` = '$username'";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0)
            return true;
        
        return false;
    }
    
    private function verifyUsername($newUsername){
        if($newUsername == "" || $newUsername == null)
            return $error = "Input Error.\\nPlease enter a username";
        if(strlen($newUsername) < 8 || strlen($newUsername) > 16)
            return $error = "Input Error.\\nUsername should be min 8 characters and max 16 characters";
        if($this->checkUsername($newUsername))
            return $error = "Input Error.\\n<b>$newUsername</b> is taken. Please enter a new username."; 
        if(preg_match("/\s/", $newUsername))
            return $error = "Input Error.\\nUsername should not contain any white space";
        if(preg_match("/\W/", $newUsername))
            return $error = "Input Error.\\nUsername should not contain any special character";
         
        return $error = "";
    }

    private function verifyFullname($fullname){
        $name = str_replace('.', '', $fullname);
        if($name == "" || $name == null)
            return $error = "Input Error.\\nPlease enter your full name.";
        if(preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $name))
            return $error = "Input Error.\\nName should not contain any special character";
        if(preg_match("/\d/", $name))
            return $error = "Input Error.\\nName should not contain any digit";
        if(preg_match("/\s\s/", $name))
            return $error = "Input Error.\\nName should not contain too much spaces";
         
        return $error = "";
        
    }

    public function verifyUpdate($oldUsername, $oldFullName, $oldEmail, $newUsername, $newFullName, $newEmail, $group){
        $error = "";
        $username = "";
        $fullname = "";
        $email = "";

        if($newUsername == "" && $newFullName == "" && $newEmail == ""){
            $error = "There is nothing to change.";
        }

        if($newUsername != "" && $newUsername != $oldUsername && $error == ""){
            $error = $this->verifyUsername($newUsername);

            if($error == ""){
                $username = $newUsername;
            }
        }else{
            $username = $oldUsername;
        }

        if($newFullName != "" && $newFullName != $oldFullName && $error == ""){
            $error = $this->verifyFullname($newFullName);

            if($error == ""){
                $fullname = $newFullName;
            }
        }else{
            $fullname = $oldFullName;
        }

        if($newEmail != "" && $newEmail != $oldEmail && $error == ""){
            If(!filter_var($newEmail, FILTER_VALIDATE_EMAIL))
                $error = "Input Error.\\n$newEmail is a not valid email address";

            if($error == ""){
                $email = $newEmail;
            }
        }else{
            $email = $oldEmail;
        }

        if($username == $oldUsername && $fullname == $oldFullName && $email == $oldEmail)
            $error = "There is nothing to change.";

        if($error != ""){
            echo "<script>
                Swal.fire({
                        title: \"$error\",
                        icon: \"error\",
                        width: 900
                });
                </script>";
        }else{
            $link = config::con();

            $sql = "UPDATE `tbl_accounts` SET `username` = '$username', `name` = '$fullname', `email` = '$email' WHERE `username` = '$oldUsername'";
            $stmt = $link->prepare($sql);
            $stmt->execute();

            if($group == 1)
                $location = "update.php";
            else
                $location = "updateacc.php";
            
            echo "<script>
                    Swal.fire({
                            title: \"Updated successfully!\",
                            icon: \"success\",
                            width: 700
                    }).then(function() {
                        window.location = \"$location\";
                  });
                    </script>";
        }
    }
}
?>