<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DAAP Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="resource/img/daap-icon.png">

    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/login.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark">
      <img src="resource/img/DAAPlogo-white.png" class="img-fluid logo" alt="daap-logo">

    </nav>

    <div class="container-fluid">
      <div class="header-top mt-5">
          <h1>THE UNIVERSITY OF FIRST CHOICE</h1>
          <h2>Empowers. Inspires.</h2>
      </div>
    </div>


    <div class="wrapper">
      <div class="title-text">
        <img class="ceu" src="resource/img/CEULOGO.png" alt="ceu-logo">
        <div class="title login">CENTRO ESCOLAR UNIVERSITY</div>
        <p>Manila - Makati - Malolos</p>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <label class="slide login">Administration Office</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form action="" class="login" method="post">
          <?php logd(); ?>
            <div class="field">
              <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="field">
              <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="pass-link"><a href="#">Forgot password?</a></div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
              <input type="submit" value="Login">

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");

      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });

    </script>

  </body>
</html>
