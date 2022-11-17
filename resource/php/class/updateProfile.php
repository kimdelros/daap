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
    
    private function verifyUsername($newUsername, $username){
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

    public function verifyUpdate($username, $name, $email, $newUsername, $newFullName, $newEmail){
        if($newUsername == "" && $newFullName == "" && $newEmail == ""){
            $error = "There is nothing to change.";
        }

        if($newUsername != "" && $newUsername != $username){
            $error = $this->verifyUsername($newUsername, $username);

            if($error == ""){

            }
        }



        if($error != ""){
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