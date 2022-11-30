<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
$view = new view;
?>



 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="resource/img/daap-icon.png">
   <title>DAAP Register Account</title>
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
   <link href="vendor/css/all.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 </head>
 <body>
 <nav class="navbar navbar-expand-md navbar-dark">
      <a href="index.php"><img src="resource/img/DAAPlogo-white.png" class="img-fluid logo" alt="daap-logo"></a>
      <a href="registrar.php"><i class="fas fa-home ceucolor"></i></a>
    </nav>

         <div class="container mt-4 puff-in-center">
             <div class="row">
                 <div class="col-12">
                     <h1 class="text-center mt-5 font-weight-bold">Register New Admin Account</h1>
                 </div>
            </div>
            <form action="" method="post">
                <table class="table ">
                    <tr>
                        <td>
                            <div class="row justify-content-center">
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                 <label for = "username" class=""> Username:</label>
                                 <input class="form-control"  type = "text" name="username" id="username" value ="<?php echo input::get('username');?>" autocomplete="off" required />
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                 <label for = "password"> Password:</label>
                                 <input type="password" class="form-control" name="password" id="password" value ="<?php echo input::get('password');?>" autocomplete="off" required/>
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                 <label for = "ConfirmPassword"> Confirm Password:</label>
                                 <input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" value ="<?php echo input::get('ConfirmPassword');?>" autocomplete="off"required/>
                                </div>
                             </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row justify-content-center">
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                 <label for = "fullName" class=""> Full Name</label>
                                 <input class="form-control" type = "text" name="fullName" id="fullName" value ="<?php echo input::get('fullName');?>" required>
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                  <label for="College" >College/s to handle</label>
                                      <select id="College" name="College" class="selectpicker form-control" data-live-search="true" required>
                                        <?php $view->collegeSP2();?>
                                      </select>
                                </div>
                                <div class="form-group col-12 col-md-6 col-lg-4">
                                 <label for = "email" class=""> Email Address</label>
                                 <input class="form-control" type = "text" name="email" id="email" value ="<?php echo input::get('email');?>" required>
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
                                 <input type="submit" value="Register New SRA" class=" form-control btn btn-success" name="register" id="register" />
                                 <?php
                                if($_SERVER['REQUEST_METHOD']=='POST'){
                                    $registerAccount = new registerAccount();
                                    $registerAccount->verifyAdmin($_POST['username'], $_POST['password'], $_POST['ConfirmPassword'], $_POST['fullName'], $_POST['College'], $_POST['email']);
                                }
                                ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
             </form>
         </div>
 </body>
 <footer id="sticky-footer" class="py-4 bg-dark text-white-50 fixed-bottom">
   <div class="container text-center">
   <div class="row">
           <div class="col col-sm-5 text-left">
               <small>Copyright &copy; Discount Application & Alumni Portal</small>
           </div>
           <div class="col text-right">
               <small>Del Rosario, JK. | Cruz, RC. | Heyrana, PK. | Forbes, LI. | Bolasoc, R. (2022)</small>
           </div>
       </div>
   </div>
 </footer>
     <script src="vendor/js/jquery.js"></script>
     <script src="vendor/js/popper.js"></script>
     <script src="vendor/js/bootstrap.min.js"></script>
     <script src="vendor/js/bootstrap-select.min.js"></script>
 </body>
 </html>
