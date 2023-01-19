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
            
            <!--All Applications displayed-->
            
            <div class="details-1">
                <div class="applyDetails-1 m-3">
                    <h4 class="font-weight-bold">DAAP System Admin Setting</h4>
                    <div class="row lowerlft col-6">  
                        <form method="POST">  
                            <div class="form-group">
                                <label for="SemesterSettings">Semester Settings</label>
                                <select name='semester'class="form-control" id="SemSettings">
                                    <option data-tokens="1" value="1">1</option>
                                    <option data-tokens="2" value="2">2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SchoolYRSettings">School Year Settings</label>
                                <input type="text" name='schoolYear' class="form-control">
                            </div>
                            <br>
                            <div class="CAS form-group">
                                <input class="btn btn-primary btn-sm btn-block fw-bold" type="submit" name="submit" value="Change Settings">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="details">
                <div class="applyDetails">
                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="alumni-tab" data-toggle="tab" href="#alumni" role="tab" aria-controls="alumni" aria-selected="true">ALUMNI DISCOUNT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sibling-tab" data-toggle="tab" href="#sibling" role="tab" aria-controls="sibling" aria-selected="false">SIBLING DISCOUNT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="ceis-tab" data-toggle="tab" href="#ceis" role="tab" aria-controls="ceis" aria-selected="false">CEIS DISCOUNT</a>
                    </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">
                        <?php
                        if(empty($_POST['submit'])){
                        ?>
                        <section class="tab-pane fade show active" id="alumni" role="tabpanel" aria-labelledby="alumni-tab">
                        <?php $view->viewAllApplications("1");
                        ?>
                        </section>
                        <section class="tab-pane fade" id="sibling" role="tabpanel" aria-labelledby="sibling-tab">
                            <?php $view->viewAllApplications("2"); ?>
                        </section>
                        <section class="tab-pane fade" id="ceis" role="tabpanel" aria-labelledby="ceis-tab">
                            <?php $view->viewAllApplications("3"); ?>
                        </section>
                        <?php }
                        
                        if(isset($_POST['submit'])){
                            if (!empty($_POST['semester'] && !empty($_POST['schoolYear']))){ ?>
                            <section class="tab-pane fade show active" id="alumni" role="tabpanel" aria-labelledby="alumni-tab">
                            <?php $view->viewAllApplicationsFiltered("1", $_POST['semester'], $_POST['schoolYear']);
                            ?>
                            </section>
                            <section class="tab-pane fade" id="sibling" role="tabpanel" aria-labelledby="sibling-tab">
                                <?php $view->viewAllApplicationsFiltered("2", $_POST['semester'], $_POST['schoolYear']); ?>
                            </section>
                            <section class="tab-pane fade" id="ceis" role="tabpanel" aria-labelledby="ceis-tab">
                                <?php $view->viewAllApplicationsFiltered("3", $_POST['semester'], $_POST['schoolYear']); ?>
                            </section>
                        <?php }
                        }
                        ?>
                        
                        
                    </div>
                    
                </div>
            </div>        
    </div>
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
    
</body>
</html>


    