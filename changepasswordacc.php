<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
isLogin();
$view = new view;
$user = new user();
isAccounting($user->data()->groups);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/dashboard.css">
    <link rel="icon" href="resource/img/daap-icon.png">
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
                        <span class="title">DAAP System</span>
                    </a>
                </li>
                <li>
                    <a href="registrar.php">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="approveAlumni.php">
                        <span class="icon"><ion-icon name="diamond-outline"></ion-icon></span>
                        <span class="title">Alumni</span>
                    </a>
                </li>
                <li>
                    <a href="approveSibling.php">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Sibling</span>
                    </a>
                </li>
                <li>
                    <a href="approveCeis.php">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="title">CEIS</span>
                    </a>
                </li>
                <li>
                    <a href="changepasswordacc.php">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="updateacc.php">
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
        <div class="container mt-5 puff-in-center">
             <div class="row">
                 <div class="col-12">
                     <h1 class="text-center">CHANGE PASSWORD</h1>
                 </div>
            </div>
            <form action="" method="post">
                <table class="table ">
                    <tr>
                        <td>
                            <div class="row justify-content-md-center">
                                <div class="form-group col-4">
                                 <label for = "password_current"> Enter Current Password:</label>
                                 <input type="password" class="form-control" name="password_current" id="password" value ="<?php echo input::get('password_current');?>" autocomplete="off" required/>
                                </div>
                                <div class="form-group col-4">
                                 <label for = "password"> Enter New Password:</label>
                                 <input type="password" class="form-control" name="password" id="password" value ="<?php echo input::get('password');?>" autocomplete="off" required/>
                                </div>
                                <div class="form-group col-4">
                                 <label for = "ConfirmPassword"> Confirm New Password:</label>
                                 <input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" value ="<?php echo input::get('ConfirmPassword');?>" autocomplete="off" required/>
                                </div>
                             </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row justify-content-center">
                                <div class="form-group col-7">
                                    <label  >&nbsp;</label>
                                <input type="hidden" name ="Token" value="<?php echo Token::generate();?>" />
                                 <input type="submit" value="Change Password" class=" form-control btn btn-primary" name="changeP" id="changeP"/>
                                 <?php
                                if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['changeP']){
                                    $changePassword = new changePassword();
                                    $changePassword->verifyPass($user->data()->username, $user->data()->password, $user->data()->salt, $_POST['password_current'], $_POST['password'], $_POST['ConfirmPassword'], $user->data()->groups);
                                }
                                ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
             </form>
         </div>

    <!--Scripts-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="resource/js/script.js"></script>
    <script>
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
    </script>
</body>
</html>
