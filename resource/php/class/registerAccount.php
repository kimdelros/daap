<?php

class registerAccount extends config{

private function checkUsername($username){
    $link = config::con();

    $sql = "SELECT * FROM `tbl_accounts` WHERE `username` = '$username'";
    $stmt = $link->prepare($sql);
    $stmt->execute();
    if($stmt->rowCount() > 0)
        return true;
    
    return false;
}

private function verifyUsername($username){
    if($username == "" || $username == null)
        return $error = "Input Error.\\nPlease enter a username";
    if(strlen($username) < 8 || strlen($username) > 16)
        return $error = "Input Error.\\nUsername should be min 8 characters and max 16 characters";
    if($this->checkUsername($username))
        return $error = "Input Error.\\n<b>$username</b> is taken. Please enter a new username."; 
    if(preg_match("/\s/", $username))
        return $error = "Input Error.\\nUsername should not contain any white space";
    if(preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $username))
        return $error = "Input Error.\\nUsername should not contain any special character";
     
    return $error = "";
}

private function verifyPassword($password, $confirmPassword){
    if($password == "" || $password == null)
        return $error = "Input Error.\\nPlease enter a password";
    if(strlen($password) < 8 || strlen($password) > 16)
        return $error = "Input Error.\\nPassword should be min 8 characters and max 16 characters";
    if(!preg_match("/\d/", $password))
        return $error = "Input Error.\\nPassword should contain at least one digit";
    if(!preg_match("/[A-Z]/", $password))
        return $error = "Input Error.\\nPassword should contain at least one Capital Letter";
    if(!preg_match("/[a-z]/", $password))
        return $error = "Input Error.\\nPassword should contain at least one small Letter";
    if(!preg_match("/\W/", $password))
        return $error = "Input Error.\\nPassword should contain at least one special character";
    if(preg_match("/\s/", $password))
        return $error = "Input Error.\\nPassword should not contain any white space";
    if($confirmPassword == "" || $confirmPassword == null)
        return $error = "Input Error.\\nPlease enter a confirm password";
    if(!($password == $confirmPassword))
        return $error = "Input Error.\\nPasswords are not matching.";
     
    return $error = "";
}

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

private function verifyCollege($college){
    $link = config::con();

    $sql = "SELECT `college_school` FROM `collegeschool`";
    $stmt = $link->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $data) {
        if($data['college_school'] == $college){
            return $error = "";
        }
    }
    return $error = "Input Error.\\nCollege does not match.";
    
}

public function verifyAdmin($username, $password, $confirmPassword, $fullname, $college, $email){
    $error = "";
    $error = $this->verifyUsername($username);
    if($error == "")
        $error = $this->verifyPassword($password, $confirmPassword);
    if($error == "")
        $error = $this->verifyFullname($fullname);    
    if($error == "")
        $error = $this->verifyCollege($college);
    if($error == "")
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $error = "Input Error.\\n$email is a not valid email address";

    if($error == ""){
    $salt = Hash::salt(32);
    $password = Hash::make($password,$salt);
    $joined = date('Y-m-d H:i:s');

    $link = config::con();

    $sql = "INSERT INTO `tbl_accounts`(`username`, `password`, `salt`, `name`, `joined`, `colleges`, `email`) VALUES ('$username', '$password', '$salt', '$fullname', '$joined', '$college', '$email')";
    $stmt = $link->prepare($sql);
    $stmt->execute();
    
    echo "<script>
             Swal.fire({
                    title: \"You have registered successfully!\",
                    icon: \"success\",
                    width: 700
              }).then(function() {
                    window.location = \"login.php\";
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