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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/dashboard.css">
    <link rel="icon" href="resource/img/daap-icon.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <title>DAAP Reports</title>
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
                    <!--user image-->
                    <div class="username">
                    <a><?php echo $user->data()->username ?> </a>
                    </div>
                    <div class="user">
                        <img src="resource/img/user.jpg" alt="">
                    </div>
                </div>
            

            <!-- Reports -->
            <div class="cardBox">
                <div class="card-1">
                <div class="col-sm">
                <h4 class="font-weight-bold">Entrance Benefits</h4>
                Total Number of Applicants:<span class="font-weight-bold text-primary"> <?php echo $view->viewTotalApplicants(); ?></span>
                <br>
                For Registrar Approval: <span class="font-weight-bold text-primary"><?php echo $view->viewTotalPending(); ?></span>
                <br>
                Scholarship Approved: <span class="font-weight-bold text-primary"><?php echo $view->viewTotalApproved(); ?></span>
                <br>
                Scholarship Rejected: <span class="font-weight-bold text-primary"> <?php echo $view->viewTotalRejected(); ?></span>
                <br>
                Discounted Applications:<span class="font-weight-bold text-primary"><?php echo $view->viewTotalDiscounted(); ?></span> 
                </div>
                </div>
            </div>
            <div class="details-1">
                <div class="applyDetails-1 m-3">
                    <h4 class="font-weight-bold">DAAP System Admin Setting</h4>
                    <div class="row lowerlft col-6">    
                    <div class="col-6 form-group">
                        <label for="SemesterSettings">Semester Settings</label>
                        <select class="form-control" id="SemSettings">
                            <option>1st Semester</option>
                            <option>2nd Semester</option>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label for="SchoolYRSettings">School Year Settings</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <br>
                    <div class="CAS form-group">
                        <input class="btn btn-primary btn-lg btn-block fw-bold" type="submit" name="changeAdminSettings" value="Change Settings">
                    </div>
                    </div>
                </div>
            </div>        
    </div>
    <!--Scripts-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="resource/js/script.js"></script>
</body>
</html>


    