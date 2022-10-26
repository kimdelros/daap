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
        $message = null;
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

                    $db = new config();
                    $con = $db->con();

                    $sql = "SELECT `appID` FROM `application` WHERE `transID` = $_GET[id]";

                    $data= $con->prepare($sql);
                    $data->execute();
                    $result = $data->fetchAll(PDO::FETCH_ASSOC);

                    var_dump($result);
                    $sql = "UPDATE `alumni` SET `alumniYB` = '$alumniYB', `alumniDiploma` = '$alumniDiploma',  `alumniTOR` = '$alumniTOR' WHERE `appID` = '$result[0][id]'";
                    $data= $con->prepare($sql);
                    $data->execute();

                    $sql = "UPDATE `application` SET `isHold` = '0', `isApproved` = '1' WHERE `appID` = '$result[0][id]'";
                    $data= $con->prepare($sql);
                    $data->execute();

                    echo "<script>
                        Swal.fire({
                                title: \"Thank you for uploading your documents!\",
                                icon: \"success\",
                                width: 900
                            });
                        </script>";
                    header("Location: index.php");
                }
                break;
            case 2:

                break;
            case 3:

                break;
            default:
            break;
        }
        echo "<script>
        Swal.fire({
                title: \"$message\",
                icon: \"error\",
                width: 900
            });
        </script>";
    }

}

?>