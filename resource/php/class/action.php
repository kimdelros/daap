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
                'Blurry Document/s': 'Blurry Document/s',
                'Unviewable Document/s': 'Unviewable Document/s',
                'Wrong Document/s': 'Wrong Document/s',
                'Other': 'Other Reason'
              }
            },
            inputPlaceholder: 'Select a Reason',
            showCancelButton: true
          })

          if (reason != 'Other') {
            window.location = \"resource/php/class/hold.php?id=$transID&reason=\"+reason;
          }else{
            (async () => {
              const { value: otherReason } = await Swal.fire({
                title: 'Enter your reason for on-hold.',
                input: 'text',
                showCancelButton: true,
                inputValidator: (value) => {
                  if (!value) {
                    return 'You need to write something!'
                  }
                }
              })

              if (otherReason) {
                window.location = \"resource/php/class/hold.php?id=$transID&reason=\"+otherReason;
              }

            })()
          }
          })()
          </script>";
          break;
        case "reject":
          echo "<script>
          (async () => {
            const { value: reason } = await Swal.fire({
              title: 'Enter your reason for reject.',
              input: 'text',
              showCancelButton: true,
              inputValidator: (value) => {
                if (!value) {
                  return 'You need to write something!'
                }
              }
            })

            if (reason) {
              window.location = \"resource/php/class/reject.php?id=$transID&reason=\"+reason;
            }

          })()
          </script>";
          break;
        case "finish":
        echo "<script>
        Swal.fire({
               title: \"Are you sure?\",
               text: \"Finishing Application: $transID\",
               icon: \"question\",
               showDenyButton: true,
               confirmButtonText: \"Yes\",
               denyButtonText: \"No\",
               width: 600
         }).then((result) => {
            if (result.isConfirmed) {
                window.location = \"resource/php/class/finish.php?id=$transID\";
            }
          });
        </script>";
        break;
        default: break;
      }
    }
}
?>
