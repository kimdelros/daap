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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupporteContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i> <?php echo $user->data()->username ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="changepassword.php" class="dropdown-item">Setting</a></li>
                                <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--form types-->


            <!-- application details -->
            <div class="details">
                <div class="applyDetails">
                    <?php $view->viewRequests("2");
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                      $action = new action();
                      $action->execute();
                    }?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

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
