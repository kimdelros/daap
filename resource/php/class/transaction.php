<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

class transaction extends config {
    public $transactionID;

    function __construct($transactionID){
        $this->transactionID = $transactionID;
    }

    public function statusCheck(){
        $con = $this->con();
        $sql = "SELECT * FROM `applications` WHERE `transID` = '$this->transactionID'";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        if($result){
          foreach ($result as $data){
              if($data['isApproved'] === '1' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
                  echo "<h4 class='text-center'>Approved by Registrar but not yet discounted. <br><a href='generatepdf.php?transID=$data[transID]'>Download your certification here</a></h4>";
              }
              else if($data['isApproved'] === '0' && $data['isHold'] === '1' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
                  echo "<h4 class='text-center'>Currently on hold by the Registrar due to $data[reasonHold] Document/s</h4>";
                  echo "<h4 class='text-center'>Please reupload your document/s in the <a href=\"uploader.php\">Document Uploader</a></h4>";
              }
              else if($data['isApproved'] === '0' && $data['isHold'] === '0' && $data['isRejected'] === '1' && $data['isDiscounted'] === '0'){
                  echo "<h4 class='text-center'>Application has been rejected</h4>";
              }
              else if($data['isApproved'] === '0' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
                  echo "<h4 class='text-center'>Still being reviewed by Registrar and not yet discounted</h4>";
              }
              else if($data['isApproved'] === '1' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '1'){
                  echo "<h4 class='text-center'>Congratulations! Your application has been approved and discounted</h4>";
              }
          }
        }else{
          echo "<h4 class='text-center'>The Transaction ID is not correct.</h4>";
        }

    }
}


?>
