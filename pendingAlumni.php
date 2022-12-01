<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
isLogin();
$user = new user();
isRegistrar($user->data()->groups);
$view = new viewtable();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="resource/css/dashboard.css">
    <link rel="stylesheet" href="resource/css/viewStyle.css">
    <link rel="icon" href="resource/img/daap-icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>DAAP Dashboard</title>
</head>
<body>
    <div class="container-fluid">

        <!--sidebar-->
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><img src="resource/img/daap-icon.png" width="40px" alt=""></span>
                        <span class="title pt-2">DAAP System</span>
                    </a>
                </li>
                <li>
                    <a href="registrar.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="pendingAlumni.php">
                        <span class="icon"><ion-icon name="diamond-outline"></ion-icon></span>
                        <span class="title">Alumni</span>
                    </a>
                </li>
                <li>
                    <a href="pendingSibling.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Sibling</span>
                    </a>
                </li>
                <li>
                    <a href="pendingCeis.php">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="title">CEIS</span>
                    </a>
                </li>

                <li>
                    <a href="report.php">
                        <span class="icon"><ion-icon name="document-outline"></ion-icon></span>
                        <span class="title">Reports</span>
                    </a>
                </li>
                
                <li>
                    <a href="changepassword.php">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="update.php">
                        <span class="icon"><ion-icon name="options-outline"></ion-icon></span>
                        <span class="title">Update Profile</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Log out</span>
                    </a>
                </li>

                
            </ul>
        </div>

        <!--main dashboard-->
        <div class="main" id="#main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="username">
                <a><?php echo $user->data()->username ?> </a>
                </div>

                <!--user image-->
                <div class="user">
                    <img src="resource/img/user.jpg" alt="">
                </div>
            </div>

            <div class="details">
                <div class="applyDetails">
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="true">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="onhold-tab" data-toggle="tab" href="#onhold" role="tab" aria-controls="onhold" aria-selected="false">On-Hold</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="rejected-tab" data-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false">Rejected</a>
                    </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">
                        <section class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <?php $view->viewPendingApplications("1");
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                $action = new action();
                                $action->execute();
                            }
                        ?>
                        </section>
                        <section class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tab">
                            <?php $view->viewApprovedApplications("1"); ?>
                        </section>
                        <section class="tab-pane fade" id="onhold" role="tabpanel" aria-labelledby="onhold-tab">
                            <?php $view->viewOnHoldApplications("1"); ?>
                        </section>
                        <section class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                            <?php $view->viewRejectedApplications("1"); ?>
                        </section>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <section class="regOverlay" id="viewDoc">
    <div class="regWrapper">
      <a class="close" href="" >&times;</a>
      <div class="regContent">
        <div class="regForm">
          <img src="<?php echo $_GET['document'];?>" alt="" width=100%>
        </div>
      </div>
    </div>
    </section>

    <section class="regOverlay" id="viewSum">
    <div class="regWrapper">
      <a class="close" href="" >&times;</a>
      <div class="regContent">
        <div class="regForm text-center">
          <?php 
          $transID = $_GET['transID'];

          $con = new config();
          $link = $con->con();
          $sql = "SELECT * FROM `applications` WHERE `transID` = '$transID'";
          $stmt = $link->prepare($sql);
          $stmt->execute();
          $result = $stmt->fetchAll();

          $appID = (int) $result[0]['appID'];
          
          $campusID = $result[0]['campusID'];
          $cdID = $result[0]['cdID'];
          $courseID = $result[0]['courseID'];

          $link2 = $con->con();
          $sql2 = "SELECT * FROM `campus` WHERE `campusID` = '$campusID'";
          $stmt2 = $link2->prepare($sql2);
          $stmt2->execute();
          $campus = $stmt2->fetchAll();
          
          $link3 = $con->con();
          $sql3 = "SELECT * FROM `collegedepartment` WHERE `cdID` = '$cdID'";
          $stmt3 = $link3->prepare($sql3);
          $stmt3->execute();
          $college = $stmt3->fetchAll();

          $link4 = $con->con();
          $sql4 = "SELECT * FROM `courses` WHERE `courseID` = '$courseID'";
          $stmt4 = $link4->prepare($sql4);
          $stmt4->execute();
          $course = $stmt4->fetchAll();
        
          $link5 = $con->con();
          switch($result[0]['appType']){
            case 1: 
                $appType = "Alumni Discount";
                $sql = "SELECT * FROM `alumni` WHERE `appID`= '$appID'";
                break;
            case 2: 
                $appType = "Sibling Discount";
                $sql = "SELECT * FROM `sibling` WHERE `appID`= '$appID'";
                break;
            case 3: 
                $appType = "CEIS Graduate Discount";
                $sql = "SELECT * FROM `ceis` WHERE `appID`= '$appID'";
                break;
          }
          $stmt5= $link5->prepare($sql);
          $stmt5->execute();
          $files = $stmt5->fetch(PDO::FETCH_ASSOC);

          ?>
          <h2><?php echo $result[0]['transID']; ?></h2>
          <h3>Student Information</h3>
          <h3><?php echo $result[0]['studentName']; ?></h3>
          <h5><?php echo $result[0]['studentID']; ?><br></h5>
          <h5><?php echo $result[0]['studentEmail']; ?><br><br></h5>
          <h4><?php echo $campus[0]['campusName']." Campus<br>".$college[0]['cdName']."<br>".$course[0]['courseName']; ?></h4>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="regForm col-6 text-center">
                    
                <h4>Application Information</h4>
                <div class="row">
                <div class="col-1"></div>
                    <div class="col-11 text-left">
                    <h5>Discount Type: <?php echo $appType; ?></h5>
                    <?php 
                    switch($result[0]['appType']){
                        case 1:
                            echo "<h5>Alumni Name: $files[alumniName]</h5>";
                            echo "<h5>Alumni Campus: $files[alumniName]</h5>";
                            echo "<h5>Alumni Year Graduated: $files[alumniYearGraduated]</h5>";
                            break;
                        case 2:

                            break;
                        case 3:

                            break;
                    }
                    ?>
                    </div>
                    </div>
                    
                </div>
                <div class="regForm col-6 text-center">
                    <h5>File/s Uploaded</h5>
                    <?php 
                    switch($result[0]['appType']){
                        case 1: 
                            if($files['alumniYB']){
                                $src = $files['alumniYB'];
                                echo "<img src='$src' width=50%><br>Alumni Year Book<br>";
                            }
                            if($files['alumniDiploma']){
                                $src = $files['alumniDiploma'];
                                echo "<img src='$src' width=50%><br>Alumni Diploma<br>";
                            }
                            if($files['alumniTOR']){
                                $src = $files['alumniTOR'];
                                echo "<img src='$src' width=50%><br>Alumni TOR<br>";
                            }
                            break;
                        case 2: 
                            if($files['applicantCOM']){
                                $src = $files['applicantCOM'];
                                echo "<img src='$src' width=50%><br>Applicant COM<br>";
                            }
                            if($files['siblingCOM']){
                                $src = $files['siblingCOM'];
                                echo "<img src='$src' width=50%><br>Sibling COM<br>";
                            }
                            break;
                        case 3: 
                            $appType = "CEIS Graduate Discount";
                            $sql = "SELECT * FROM `ceis` WHERE `appID`= '$appID'";
                            break;
                      }
                    ?>  
                </div>
            </div>
        </div>
      </div>
    </div>
    </section>



    <!--Scripts-->
    <script>
        $(document).ready(function () {
        $('#scholartable').dataTable({
            select: {
            style: 'multi',
            selector: 'td:first-child'
            }
        });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="resource/js/script.js"></script>
    <script src="resource/js/scripts.js"></script>
    <script src="resource/js/pendingActions.js"></script>
    <!-- <script>
    (function() {

        const idleDurationSecs = 60;    // X number of seconds
        const redirectUrl = 'logout.php';  // Redirect idle users to this URL
        let idleTimeout; // variable to hold the timeout, do not modify

        const resetIdleTimeout = function() {

            // Clears the existing timeout
            if(idleTimeout) clearTimeout(idleTimeout);

            // Set a new idle timeout to load the redirectUrl after idleDurationSecs
            idleTimeout = setTimeout(() => location.href = redirectUrl, idleDurationSecs * 1000);
        };

        // Init on page load
        resetIdleTimeout();

        // Reset the idle timeout on any of the events listed below
        ['click', 'touchstart', 'mousemove'].forEach(evt => 
            document.addEventListener(evt, resetIdleTimeout, false)
        );

    })();
    </script> -->

</body>
</html>
