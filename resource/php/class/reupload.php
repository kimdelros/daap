<?php

class reupload extends config{

    private function verifyFile($file, $name, $message){
        if($file['name'] != ""){
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

            if($ext !== '' && $ext !== 'gif' && $ext !== 'png' && $ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'jfif')
                return "$name must be an image file.";
        }
        
        
        return $message;        
    }

    private function storeFile($file, $type, $transID){
        if($file['name'] != ""){
            $imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
            $file['name'] = $transID.".".$type.".".$imageFileType;
            $targetDir = "resource/documents/$type/";
            $pathFile = $targetDir . $file["name"];
            move_uploaded_file($file["tmp_name"], $pathFile);
            return $pathFile;
        }
      }

    public function reuploadDoc($files, $type){
        $message = "";
        switch($type){
            case 1:
                if($files['alumniYB']['name'] == "" && $files['alumniDiploma']['name'] == "" && $files['alumniTOR']['name'] == ""){
                    $message = "Please upload atleast one document.";
                 break;
                }
                $message = $this->verifyFile($files['alumniYB'], "Alumni's Yearbook", $message);
                $message = $this->verifyFile($files['alumniDiploma'], "Alumni's Diploma", $message);
                $message = $this->verifyFile($files['alumniTOR'], "Alumni's TOR", $message);

                if($message == ""){
                    $alumniYB = $this->storeFile($files['alumniYB'], "alumniYB", $_GET['id']);
                    $alumniDiploma = $this->storeFile($files['alumniDiploma'], "alumniDiploma", $_GET['id']);
                    $alumniTOR = $this->storeFile($files['alumniTOR'], "alumniTOR", $_GET['id']);

                    $con = config::con();

                    $sql = "SELECT * FROM `applications` WHERE `transID` = '$_GET[id]'";

                    $data= $con->prepare($sql);
                    $data->execute();
                    $result = $data->fetchAll(PDO::FETCH_ASSOC);

                    $appID = (int)$result[0]['appID'];

                    $sql = "UPDATE `alumni` SET `alumniYB` = '$alumniYB', `alumniDiploma` = '$alumniDiploma',  `alumniTOR` = '$alumniTOR' WHERE `appID` = '$appID'";
                    $data= $con->prepare($sql);
                    $data->execute();
                    

                    $sql = "UPDATE `applications` SET `isHold` = '0' WHERE `appID` = '$appID'";
                    $data= $con->prepare($sql);
                    $data->execute();
                }
                break;
            case 2:
                if($files['applicantCOM']['name'] == "" || $files['siblingCOM']['name'] == ""){
                    $message = "Please upload all the documents needed.";
                 break;
                }

                $message = $this->verifyFile($files['applicantCOM'], "Applicant's COM", $message);
                $message = $this->verifyFile($files['siblingCOM'], "Sibling's COM", $message);

                if($message == ""){
                    $applicantCOM = $this->storeFile($files['applicantCOM'], "applicantCOM", $_GET['id']);
                    $siblingCOM = $this->storeFile($files['siblingCOM'], "siblingCOM", $_GET['id']);

                    $con = config::con();

                    $sql = "SELECT * FROM `applications` WHERE `transID` = '$_GET[id]'";

                    $data= $con->prepare($sql);
                    $data->execute();
                    $result = $data->fetchAll(PDO::FETCH_ASSOC);

                    $appID = (int)$result[0]['appID'];

                    $sql = "UPDATE `sibling` SET `applicantCOM` = '$applicantCOM', `siblingCOM` = '$siblingCOM' WHERE `appID` = '$appID'";
                    $data= $con->prepare($sql);
                    $data->execute();
                    

                    $sql = "UPDATE `applications` SET `isHold` = '0' WHERE `appID` = '$appID'";
                    $data= $con->prepare($sql);
                    $data->execute();
                }
                break;
            case 3:
                if($files['ceisDiploma']['name'] == ""){
                    $message = "Please upload the document needed.";
                 break;
                }

                $message = $this->verifyFile($files['ceisDiploma'], "Applicant's Diploma", $message);

                if($message == ""){
                    $ceisDiploma = $this->storeFile($files['ceisDiploma'], "ceisDiploma", $_GET['id']);

                    $con = config::con();

                    $sql = "SELECT * FROM `applications` WHERE `transID` = '$_GET[id]'";

                    $data= $con->prepare($sql);
                    $data->execute();
                    $result = $data->fetchAll(PDO::FETCH_ASSOC);

                    $appID = (int)$result[0]['appID'];

                    $sql = "UPDATE `ceis` SET `ceisDiploma` = '$ceisDiploma' WHERE `appID` = '$appID'";
                    $data= $con->prepare($sql);
                    $data->execute();
                    
                    $sql = "UPDATE `applications` SET `isHold` = '0' WHERE `appID` = '$appID'";
                    $data= $con->prepare($sql);
                    $data->execute();
                }
                break;
            default:
            break;
        }
        if($message !== ""){
        
        echo "<script>
            Swal.fire({
                    title: \"$message\",
                    icon: \"error\",
                    width: 900
                });
            </script>";
        }else{
            echo "<script>
            Swal.fire({
                    title: \"Your documents has been submitted!\",
                    icon: \"success\",
                    width: 700
            }).then(function() {
                    window.location = \"index.php\";
            });
            </script>";
        }
    }

}

?>