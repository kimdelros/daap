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
                  echo "<h5 class='text-center'>Congratulations! Your application has been approved by the Registrar. <br>You may download your certification below. <br><a href='generatepdf.php?transID=$data[transID]'>Click Here to download your certificate</a> <br>You may present it to the Accounting department for adjustments.</h5>";
              }
              else if($data['isApproved'] === '0' && $data['isHold'] === '1' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
                  echo "<h5 class='text-center'>Your application has been currently on hold by the Registrar due to <br><b>$data[reasonHold] Document/s</b>
                  <br>Kindly reupload your document/s in the <a href=\"uploader.php\">Document Uploader</a></h5>";
              }
              else if($data['isApproved'] === '0' && $data['isHold'] === '0' && $data['isRejected'] === '1' && $data['isDiscounted'] === '0'){
                  echo "<h5 class='text-center'>We are sorry that your application has been rejected due to <b>$data[reasonReject]</b>.<br>For clarification/s you may send an email to ceu.mls.daap@gmail.com</h5>";
              }
              else if($data['isApproved'] === '0' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
                  echo "<h5 class='text-center'>Your application is still being reviewed by the Registrar. <br>Kindly wait for at least 2-3 working days in processing your application.</h5>";
              }
              else if($data['isApproved'] === '1' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '1'){
                  echo "<h5 class='text-center'>Congratulations! Your application has been approved and discounted.<br>Thank you for using DAAP Portal for your discount grant application.</h5>";
              }
          }
        }else{
          echo "<h4 class='text-center'>The Transaction ID is not correct.</h4>";
        }

    }
}


?>
