<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
isLogin();
$user = new user();
isAccounting($user->data()->groups);
$view = new viewtable();
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
                    <a href="#">
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
                <!--search-->
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search"><ion-icon name="search-outline"></ion-icon>
                        <span class="clear"></span>
                    </label>
                </div>
                <!--user image-->
                <div class="user">
                    <img src="resource/img/user.jpg" alt="">
                </div>
            </div>

            <!--form types-->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php //echo $alumni->totalAlumni(); ?></div>
                        <div class="cardName">Alumni Discount</div>
                    </div>
                    <div class="iconDisplay">
                        <ion-icon name="diamond-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">2,000</div>
                        <div class="cardName">Sibling Discount</div>
                    </div>
                    <div class="iconDisplay">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">2,000</div>
                        <div class="cardName">CEIS Graduate</div>
                    </div>
                    <div class="iconDisplay">
                        <ion-icon name="school-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">2,000</div>
                        <div class="cardName">Total Applications</div>
                    </div>
                    <div class="iconDisplay">
                        <ion-icon name="information-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- application details -->
            <div class="details">
            </div>
        </div>


    </div>

    <!--Scripts-->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="resource/js/script.js"></script>

</body>
</html>
