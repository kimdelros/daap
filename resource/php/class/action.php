<?php

class action extends config{

    public function execute(){
      foreach($_POST as $key => $value)
      {
        $data = $key;
      }
      $strArray = explode('_',$data);
      $action = $strArray[0];
      $transID = $strArray[1];

      switch($action){
        case "approve":
        echo "<script>
        Swal.fire({
               title: \"Are you sure?\",
               icon: \"question\",
               showDenyButton: true,
               confirmButtonText: \"Yes\",
               denyButtonText: \"No\"
         }).then((result) => {
            if (result.isConfirmed) {        
            }
          });
        </script>";
        break;
        case "hold":

        break;
        case "reject":

        break;
        default: break;
      }
    }

    public function approveApplication($transID){
        $con = $this->con();
        $sql = "UPDATE `applications` SET `isApproved` = 1, `dateApproved` = CURRENT_TIMESTAMP WHERE `transID` = '$transID'";
        $data = $con->prepare($sql);
        if($data->execute()){
            return true;
        } else {
            return false;
        }
    }

}
?>
