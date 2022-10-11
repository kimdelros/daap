<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/apply.php';
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="resource/css/landingStyle.css">
    <script src="resource/js/verify.js"></script>
    <script src="resource/js/scripts.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>DAAP Portal</title>
  </head>
  <body>
    <section class="discount" id="gallery">
      <div class="container container-fluid">
        <div class="row text-center">
        <div class="daaplogo" data-aos="fade-down" data-aos-duration="2000">
          <img src="resource/img/DAAP-transparent.png" width="230px" alt="daap-logo">
        </div>
        <div class="container pt-md-5">
          <div class="row">
            <div class="col-md-4">
              <div class="card cardcon mt-3" data-aos="fade-up" data-aos-duration="2000">
                <h2>Alumni Discount</h2>
                <img src="resource/img/alumni.png" class="card-img-top"  alt="alumni"/>
                <div class="card-body">
                <p class="card-text text-justify">
                  Ea eram veniam export possumus a vidisse illustriora ne offendit quo quo irure consectetur o mandaremus cillum aliquip, hic nam fore admodum ut sed tempor multos esse cernantur, iis veniam velit e vidisse, excepteur ad dolor. Excepteur aliqua ab incididunt praetermissum, aute aliquip proident qui pariatur quorum  cernantur, iis veniam velit e vidisse, excepteur ad dolor. Excepteur aliqua ab
                </p>
                <a href="#AlumniForm" class="btn-card">APPLY NOW</a>
              </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card cardcon mt-3" data-aos="fade-up" data-aos-duration="2000">
                <h2>Sibling Discount</h2>
                <img src="resource/img/sibling.png" class="card-img-top" alt="sibling"/>
                <div class="card-body">
                <p class="card-text text-justify">
                  Ea eram veniam export possumus a vidisse illustriora ne offendit quo quo irure consectetur o mandaremus cillum aliquip, hic nam fore admodum ut sed tempor multos esse cernantur, iis veniam velit e vidisse, excepteur ad dolor. Excepteur aliqua ab incididunt praetermissum, aute aliquip proident qui pariatur quorum  cernantur, iis veniam velit e vidisse, excepteur ad dolor. Excepteur aliqua ab
                </p>
                <a href="#SiblingForm" class="btn-card">APPLY NOW</a>
              </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card cardcon mt-3 mb-3" data-aos="fade-up" data-aos-duration="2000">
                <h2>CEIS Discount</h2>
                <img src="resource/img/ceis.png" class="card-img-top" alt="CEIS"/>
                <div class="card-body">
                <p class="card-text text-justify">
                  Ea eram veniam export possumus a vidisse illustriora ne offendit quo quo irure consectetur o mandaremus cillum aliquip, hic nam fore admodum ut sed tempor multos esse cernantur, iis veniam velit e vidisse, excepteur ad dolor. Excepteur aliqua ab incididunt praetermissum, aute aliquip proident qui pariatur quorum  cernantur, iis veniam velit e vidisse, excepteur ad dolor. Excepteur aliqua ab
                </p>
                <a href="#CEISForm" class="btn-card">APPLY NOW</a>
              </div>
              </div>
            </div>
          </div>
        </div>
       </div>
      </div>
    </section>
  <section class="map">

  </section>
  <section class="tracert">

  </section>

  <section class="regOverlay" id="AlumniForm">
    <div class="regWrapper">
      <a class="close" href="">&times;</a>
      <div class="regContent">
        <div class="regForm">
          <h2 class="text-center">ALUMNI DISCOUNT FORM</h2>
          <form class="row pt-3 g-3 needs-validation" enctype="multipart/form-data" method="post" action="">
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentID" class="form-label">Applicant's Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2022-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control text-center" name="studentEmail" placeholder="delacruz2200000@ceu.edu.ph" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentName" class="form-label">Student's Full Name</label>
                <input type="text" class="form-control text-center" name="studentName" placeholder="Juan Santos Dela Cruz" pattern="[a-zA-Z\s\.]*$" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="alumniName" class="form-label">Alumni's Full Name</label>
                <input type="text" class="form-control text-center" name="alumniName" placeholder="Parent's Name" pattern="[a-zA-Z\s\.]*$" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
                <h6 class="Reminder pt-4">Please upload atleast one document.</h6>
              <div class="col-md-8 pt-3">
                <label for="alumniYB" class="form-label">Alumni's Yearbook</label>
                   <input type="file" class="form-control text-center" aria-label="file example" name="alumniYB" id="alumniYB" accept="image/*" autocomplete="no" onchange="return validateYB()">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="alumniDiploma" class="form-label">Alumni's Diploma</label>
                   <input type="file" class="form-control text-center" aria-label="file example" name="alumniDiploma" id="alumniDiploma" accept="image/*" autocomplete="no" onchange="return validateAD()">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="alumniTOR" class="form-label">Transcript of Records</label>
                   <input type="file" class="form-control text-center" aria-label="file example" name="alumniTOR" id="alumniTOR" accept="image/*" autocomplete="no" onchange="return validateATOR()">
              </div>
            </div>
            <div class="col-12 text-center">
              <input class="btn btn-secondary btn-lg btn-block" type="submit" name"register" value="Register"></input>
              <?php
              if($_SERVER['REQUEST_METHOD']=='POST'){
                $applyClass = new apply();
                $applyClass->verifyAlumni($_POST['studentID'], $_POST['studentEmail'], $_POST['studentName'], $_POST['alumniName'], $_FILES['alumniYB'], $_FILES['alumniDiploma'], $_FILES['alumniTOR']);
              }
               ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="regOverlay" id="SiblingForm">
    <div class="regWrapper">
      <a class="close" href="">&times;</a>
      <div class="regContent">
        <div class="regForm">
          <h2 class="text-center">SIBLING DISCOUNT FORM</h2>
          <form class="row pt-3 g-3 needs-validation" enctype="multipart/form-data" method="post" action="index.php">
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentID" class="form-label">Applicant's Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control text-center" name="studentEmail" placeholder="delacruz1900000@ceu.edu.ph" pattern="[a-zA-Z\s]*$" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentName" class="form-label">Applicant's Full Name</label>
                <input type="text" class="form-control text-center" name="studentName" placeholder="Dela Cruz, Juan Santos" pattern="[a-zA-Z\s]*$" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="SiblingstudentID" class="form-label">Sibling's Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingName" class="form-label">Sibling's Full Name</label>
                <input type="text" class="form-control text-center" name="siblingName" placeholder="Sibling's Full Name" pattern="[a-zA-Z\s]*$" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="siblingCOM" class="form-label">Applicant's COM (PDF)</label>
                   <input type="file" class="form-control text-center" aria-label="file example" name="siblingCOM" id="siblingCOM" accept="application/pdf" autocomplete="no" onchange="return validateSCOM()">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="siblingCOM" class="form-label">Sibling's COM (PDF)</label>
                   <input type="file" class="form-control text-center" aria-label="file example" name="siblingCOM" id="siblingCOM" accept="application/pdf" autocomplete="no" onchange="return validateSCOM()">
              </div>
            </div>


            <div class="col-12 text-center">
              <input class="btn btn-secondary btn-lg btn-block" type="submit" name"register" value="Register"></input>
              <?php
              if($_SERVER['REQUEST_METHOD']=='POST'){
                validateAccount($_POST['StudentNumber'], $_POST['EmailAdd'], $_POST['FullName'], $_POST['SibFullName'], $_FILES['COM']);
              };
               ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="regOverlay" id="CEISForm">
    <div class="regWrapper">
      <a class="close" href="" >&times;</a>
      <div class="regContent">
        <div class="regForm">
          <h2 class="text-center">CEIS DISCOUNT FORM</h2>
          <p class="text-center">This application is applicable for 1 Academic Year ONLY.</p>
          <form class="row pt-3 g-3 needs-validation" enctype="multipart/form-data" method="post" action="index.php">
          <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentID" class="form-label">Applicant's Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no" required>
              </div>
          </div>
          <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="CEISstudentID" class="form-label">Applicant's CEIS Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no" required>
              </div>
          </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control text-center" name="studentEmail" placeholder="delacruz1900000@ceu.edu.ph" pattern="[a-zA-Z\s]*$" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentName" class="form-label">Applicant's Full Name</label>
                <input type="text" class="form-control text-center" name="studentName" placeholder="Dela Cruz, Juan Santos" pattern="[a-zA-Z\s]*$" autocomplete="no" required>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="ceisDiploma" class="form-label">CEIS Diploma (Image Upload)</label>
                   <input type="file" class="form-control text-center" aria-label="file example" name="ceisDiploma" id="ceisDiploma" accept="image/*" autocomplete="no" onchange="return validateCD()">
              </div>
            </div>
            <div class="col-12 text-center">
              <input class="btn btn-secondary btn-lg btn-block" type="submit" name"register" value="Register"></input>
              <?php
              if($_SERVER['REQUEST_METHOD']=='POST'){
                validateAccount($_POST['StudentNumber'], $_POST['EmailAdd'], $_POST['FullName'], $_POST['ReportCard'], $_FILES['CEISDiploma']);
              }
               ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
  <script type="text/javascript" src="resources/scripts/script.js"></script>
  <script src="https://kit.fontawesome.com/b04d2a2a76.js" crossorigin="anonymous"></script>
  <script>
    AOS.init();
  </script>
  </body>
</html>
