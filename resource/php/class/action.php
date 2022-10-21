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
               text: \"Approving Application: $transID\",
               icon: \"question\",
               showDenyButton: true,
               confirmButtonText: \"Yes\",
               denyButtonText: \"No\",
               width: 600
         }).then((result) => {
            if (result.isConfirmed) {
                window.location = \"resource/php/class/approve.php?id=$transID\";
            }else if(result.isDenied){
                window.location = \"\";
            }
          });
        </script>";
        break;
        case "hold":
        echo "<script>
        (async () => {
        const { value: reason } = await Swal.fire({
          input: 'select',
          inputOptions: {
            'Reason': {
              blurry: 'Blurry Document',
              unviewable: 'Unviewable Document',
              wrong: 'Wrong Document'
            }
          },
          inputPlaceholder: 'Select a Reason',
          showCancelButton: true
        })

        if (reason) {
          window.location = \"resource/php/class/hold.php?id=$transID&reason=\"+reason;
        }
        })()
        </script>";
        break;
        case "reject":
        echo "<script>
        Swal.fire({
               title: \"Are you sure?\",
               text: \"Rejecting Application: $transID\",
               icon: \"question\",
               showDenyButton: true,
               confirmButtonText: \"Yes\",
               denyButtonText: \"No\",
               width: 600
         }).then((result) => {
            if (result.isConfirmed) {
                window.location = \"resource/php/class/reject.php?id=$transID\";
            }else if(result.isDenied){
                window.location = \"\";
            }
          });
        </script>";
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
