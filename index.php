<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/daap/resource/php/class/core/init.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/daap/resource/php/class/apply.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/daap/resource/php/class/cascadingDropdown.php';
$view = new view();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="resource/css/home.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="resource/js/scripts.js"></script>
  <link rel="icon" href="resource/img/daap-icon.png">


  <!-- <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap.min.css">
   <link href="vendor/css/all.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css"  href="resource/css/styles.css">
   <link rel="stylesheet" type="text/css"  href="vendor/css/bootstrap-select.min.css">

   <script src="vendor/js/jquery.js"></script>
     <script src="vendor/js/popper.js"></script>
     <script src="vendor/js/bootstrap.min.js"></script>
     <script src="vendor/js/bootstrap-select.min.js"></script> -->

  <title>DAAP Homepage</title>
</head>

<body>
  <section class="home flex-center" id="home">
    <div class="text-center">
      <div class="daaplogo" data-aos="fade-down" data-aos-duration="2000">
        <img src="resource/img/DAAPlogo-white.png" alt="daap-logo">
        <div class="info">
          <h2>Welcome, Escolarian!</h2>
          <p>DAAP or Discount Application and Alumni Portal is a proposed system for Centro Escolar University wherein the students can apply for the student discount provided by the University called Entrance Benefits. And a collaboration with the Candidate Verification Portal wherein the Alumni can register and provide information so they can view the latest events of the University and the success of their co-Escolarians.</p>
        </div>
      </div>
      <div class="scroll" data-aos="fade-up" data-aos-duration="2000">
        <a href="#gallery" class="scroll-down">Scroll Down <i class="fa fa-arrow-down" aria-hidden="true"></i></a>
      </div>
    </div>
  </section>

  <section class="discount" id="gallery">
    <div class="container container-fluid">
      <div class="row text-center pt-lg-4">
        <div class="daapheader" data-aos="fade-down" data-aos-duration="2000">
          <img src="resource/img/DAAP-header.png" alt="daap-header">
        </div>
        <div class="container pt-md-5">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card cardcon mt-2" data-aos="fade-up" data-aos-duration="2000">
                <img src="resource/img/lc-alumni.jpg" class="card-img-top" alt="alumni" />
                <div class="card-body">
                  <p class="card-text text-justify">
                    CEU provides different entrance grant scholarships that will help our Escolarians in reaching their goals in life. Here in Alumni Discount, an Alumni can enroll their children to the University and they will be granted a 5% discount on their tuition fee (max. of 4 children) if their application will be approved by the Admin.
                  </p>
                  <a href="#AlumniForm" class="btn-card">APPLY NOW</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card cardcon mt-2" data-aos="fade-up" data-aos-duration="2000">
                <img src="resource/img/lc-sibling.jpg" class="card-img-top" alt="sibling" />
                <div class="card-body">
                  <p class="card-text text-justify">
                    CEU provides different entrance grant scholarships that will help our Escolarians in reaching their goals in life. Here in Sibling Discount, as long as they are enrolled at the same year, they will be granted a 5% discount on their tuition fee (maximum of 4 siblings) if their application will be approved by the Admin.
                  </p>
                  <a href="#SiblingForm" class="btn-card">APPLY NOW</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="card cardcon mt-2" data-aos="fade-up" data-aos-duration="2000">
                <img src="resource/img/lc-ceis.jpg" class="card-img-top" alt="CEIS" />
                <div class="card-body">
                  <p class="card-text text-justify">
                    CEU provides different entrance grant scholarships that will help our Escolarians in reaching their goals in life. If the freshman student graduated from CEIS, he/she shall be entitled to 10% discount in tuition fee only upon enrollment in college. This application is only applicable on the FIRST YEAR of college only.
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

  <!-- status checker
    <section class="statusCheck" id="statusCheck">
      <div class="max-width">
          <h2 class="title">Discount Application and Alumni Portal <br> Status Checker</h2>
          <form action="index.php" method="post">
            <div class="field">
                <h5>*Please enter your transaction ID below</h5>
               <input type="text" placeholder="Your Transaction ID" required>
            </div>
            <div class="field">
               <input type="submit" value="Check Status">
            </div>
         </form>
      </div>
    </section> -->
  <section class="map">
    <div class="container px-3 my-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="text-center">
            <h2 class="font-weight-bold">Escolarians Around the World!</h2>
            <p class="text-muted mb-5">It's incredible how these successful people measured and shared their accomplishment with the rest of the world.</p>
          </div>
        </div>
      </div>

      <p class="pb-5 text-left">Use the scroll wheel to zoom.</p>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <?php require_once 'maps.php';
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- <section class="tracert" id="tracert">
    <div class="container">
      <h2 class="text-center mb-5">Help us to locate you and other Escolarians!</h2>
      <form method="POST" action="#tracert">
        <div class="row m-3">
          <div class="col-md-4">
            <label for="firstName">First Name</label>
            <input id="firstName" name="firstName" type="text" class="form-control" placeholder="First Name" required pattern="[a-zA-Z\s\.]*$" autocomplete="no">
          </div>
          <div class="col-md-4">
            <label for="middleName">Middle Name</label>
            <input id="middleName" name="middleName" type="text" class="form-control" placeholder="Middle Name" required pattern="[a-zA-Z\s\.]*$" autocomplete="no">
          </div>
          <div class="col-md-4">
            <label for="lastName">Last Name</label>
            <input id="lastName" name="lastName" type="text" class="form-control" placeholder="Last name" required pattern="[a-zA-Z\s\.]*$" autocomplete="no">
          </div>
        </div>
        <div class="row m-3">
          
          <div class="col-md-4">
            <label for="tracertCampus">Campus</label>
            <select id="tracertCampus" name="tracertCampus" class="selectpicker form-control" title="Select Campus" required>
              <option value="" selected="selected">Select your Campus</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="tracertCollege">College / Department</label>
            <select id="tracertCollege" name="tracertCollege" class="selectpicker form-control" title="Select College / Department" required>
              <option value="" selected="selected">Choose your College / Department</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="tracertCourse">Course / Degree</label>
            <select id="tracertCourse" name="tracertCourse" class="selectpicker form-control" title="Select Campus" required>
              <option value="" selected="selected">Choose your Course / Degree</option>
            </select>
          </div>
        </div>
        <div class="row m-3">
          <div class="col-md-4">
          <label for="yearGraduated" class="form-label">Year Graduated</label>
                <select id="yearGraduated" name="yearGraduated" class="selectpicker form-control" title="Select Year Graduated" required>
                  <option value="" selected="selected">Choose...</option>
                  <?php $view->years(); ?>
                </select>
            </div>

            <div class="col-md-4">
              <label for="inputState" class="form-label">Country</label>
              <select id="country" name="country" class="selectpicker form-control"  title="Select Country" required>
                <option value="" selected="selected">Choose...</option>
                <?php $view->countries();?>
              </select>
            </div>

          <div class="col-md-4">
            <label for="companyName">Company Name</label>
            <input id="companyName" name="companyName" type="text" class="form-control" placeholder="Company Name" required autocomplete="no">
          </div>
          <div class="form-group mt-4">
            <button class="fancy" type="submit" name="tracert" id="tracert" value="tracert">
              <span class="top-key"></span>
              <span class="text">Submit Form</span>
              <span class="bottom-key-1"></span>
              <span class="bottom-key-2"></span></button>
            </div>
            <?php 
          if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['tracert']){
            $applyClass = new tracert();
            $applyClass->verifyTracert($_POST['firstName'], $_POST['middleName'], $_POST['lastName'], $_POST['tracertCampus'], $_POST['tracertCollege'], $_POST['tracertCourse'], $_POST['yearGraduated'], $_POST['country'], $_POST['companyName']);
          }
          ?>
          </div>
        </div>
      </form>
  </section> -->

  <section class="regOverlay" id="AlumniForm">
    <div class="regWrapper">
      <a class="close" href="">&times;</a>
      <div class="regContent">
        <div class="regForm">
          <h2 class="text-center font-weight-bold">ALUMNI DISCOUNT FORM</h2>
          <form class="row pt-3 g-3 needs-validation" enctype="multipart/form-data" method="POST" action="">
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentID" class="form-label">Applicant's Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2022-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no" 
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyAlumni']){
                  echo "value='$_POST[studentID]'";
                }
                ?>
                >
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentName" class="form-label">Applicant's Full Name</label>
                <input type="text" class="form-control text-center" name="studentName" placeholder="Juan Santos Dela Cruz" pattern="[a-zA-Z\s\.]*$" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyAlumni']){
                  echo "value='$_POST[studentName]'";
                }
                ?>
                >
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control text-center" name="studentEmail" placeholder="delacruz2200000@ceu.edu.ph" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyAlumni']){
                  echo "value='$_POST[studentEmail]'";
                }
                ?>
                >
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentYearLevel" class="form-label">Year Level</label>
                <select id="studentYearLevel" name="studentYearLevel" class="selectpicker form-control text-center" data-live-search="true" required>
                <option value="" selected="selected">Select Year Level</option>
                  <?php $view->yearLevel(); ?>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="alumniStudentCampus" class="form-label">Campus</label>
                <select id="alumniStudentCampus" name="alumniStudentCampus" class="selectpicker form-control text-center " title="Select Campus" required>
                  <option value="" selected="selected">Select Campus</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="alumniStudentCollege" class="form-label">College / Department</label>
                <select id="alumniStudentCollege" name="alumniStudentCollege" class="selectpicker form-control text-center" title="Select College" required>
                  <option value="" selected="selected">Please Select Campus first</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="alumniStudentCourse" class="form-label">Course / Degree</label>
                <select id="alumniStudentCourse" name="alumniStudentCourse" class="selectpicker form-control" data-live-search="true" required>
                  <option value="" selected="selected">Please Select College / Department first</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="alumniName" class="form-label">Alumni's Full Name</label>
                <input type="text" class="form-control text-center" name="alumniName" placeholder="Parent's Name" pattern="[a-zA-Z\s\.]*$" autocomplete="no" required 
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyAlumni']){
                  echo "value='$_POST[alumniName]'";
                }
                ?>
                >
              </div>
            </div>

            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="campusGraduated" class="form-label">Campus Graduated</label>
                <select id="campusGraduated" name="campusGraduated" class="selectpicker form-control text-center" title="Select Campus" required>
                  <option value="" selected="selected">Select Campus</option>
                  <?php $view->campus(); ?>
                </select>
              </div>
            </div>

            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="yearGraduated" class="form-label">Year Graduated</label>
                <select id="yearGraduated" name="yearGraduated" class="selectpicker form-control text-center" title="Select Year Graduated" required>
                  <option value="" selected="selected">Select Year Graduatd</option>
                  <?php $view->years(); ?>
                </select>
              </div>
            </div>

            <div class="row justify-content-center text-center">
              <h6 class="Reminder pt-4 text-danger">*Please upload atleast one document (image file format)*<br>*Maximum of 2MB file size*</h6>
              <div class="col-md-8 pt-3">
                <label for="alumniSID" class="form-label">Alumni's School ID</label>
                <input type="file" class="form-control text-center" aria-label="file example" name="alumniSID" id="alumniSID" accept="image/*" autocomplete="no" onchange="return validateSizeYB()">
                <script>
                  validateSizeYB = () => {
                    const fi = document.getElementById('alumniSID');
                    // Check if any file is selected.
                    if (fi.files.length > 0) {
                      for (var i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        // The size of the file.
                        if (file >= 2048) {
                          document.getElementById('alumniSID').value = "";
                          Swal.fire({
                            title: "File is too big. Please upload a file that is less than 2MB",
                            icon: "error",
                            width: 900
                          });

                        }
                      }
                    }
                  }
                </script>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="alumniDiploma" class="form-label">Alumni's Diploma</label>
                <input type="file" class="form-control text-center" aria-label="file example" name="alumniDiploma" id="alumniDiploma" accept="image/*" autocomplete="no" onchange="return validateSizeDip()">
                <script>
                  validateSizeDip = () => {
                    const fi = document.getElementById('alumniDiploma');
                    // Check if any file is selected.
                    if (fi.files.length > 0) {
                      for (var i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        // The size of the file.
                        if (file >= 2048) {
                          document.getElementById('alumniDiploma').value = "";
                          Swal.fire({
                            title: "File is too big. Please upload a file that is less than 2MB",
                            icon: "error",
                            width: 900
                          });

                        }
                      }
                    }
                  }
                </script>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="alumniTOR" class="form-label">Alumni's TOR</label>
                <input type="file" class="form-control text-center" aria-label="file example" name="alumniTOR" id="alumniTOR" accept="image/*" autocomplete="no" onchange="return validateSizeTOR()">
                <script>
                  validateSizeTOR = () => {
                    const fi = document.getElementById('alumniTOR');
                    // Check if any file is selected.
                    if (fi.files.length > 0) {
                      for (var i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        // The size of the file.
                        if (file >= 2048) {
                          document.getElementById('alumniTOR').value = "";
                          Swal.fire({
                            title: "File is too big. Please upload a file that is less than 2MB",
                            icon: "error",
                            width: 900
                          });

                        }
                      }
                    }
                  }
                </script>
              </div>
            </div>
            <div class="col-12 text-center">
              <input class="btn btn-secondary btn-lg btn-block" type="submit" name="applyAlumni" id="applyAlumni" value="Apply">
              <?php
              if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyAlumni']) {
                $applyClass = new apply();
                $applyClass->verifyAlumni($_POST['studentID'], $_POST['studentEmail'], $_POST['studentName'], $_POST['studentYearLevel'], $_POST['alumniStudentCampus'], $_POST['alumniStudentCollege'], $_POST['alumniStudentCourse'], $_POST['alumniName'], $_POST['campusGraduated'], $_POST['yearGraduated'], $_FILES['alumniSID'], $_FILES['alumniDiploma'], $_FILES['alumniTOR']);
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
          <form class="row pt-3 g-3 needs-validation" enctype="multipart/form-data" method="post" action="">
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentID" class="form-label">Applicant's Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applySibling']){
                  echo "value='$_POST[studentID]'";
                }
                ?>>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control text-center" name="studentEmail" placeholder="delacruz1900000@ceu.edu.ph" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applySibling']){
                  echo "value='$_POST[studentEmail]'";
                }
                ?>>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentName" class="form-label">Applicant's Full Name</label>
                <input type="text" class="form-control text-center" name="studentName" placeholder="Juan Santos Dela Cruz" pattern="[a-zA-Z\s\.]*$" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applySibling']){
                  echo "value='$_POST[studentName]'";
                }
                ?>>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentYearLevel" class="form-label">Applicant's Year Level</label>
                <select id="studentYearLevel" name="studentYearLevel" class="selectpicker form-control text-center" data-live-search="true" required>
                  <option value="" selected="selected">Select Year Level</option>
                  <?php $view->yearLevel(); ?>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingApplicantCampus" class="form-label">Applicant's Campus</label>
                <select id="siblingApplicantCampus" name="siblingApplicantCampus" class="selectpicker form-control text-center " title="Select Campus" required>
                  <option value="" selected="selected">Select Campus</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingApplicantCollege" class="form-label">Applicant's College / Department</label>
                <select id="siblingApplicantCollege" name="siblingApplicantCollege" class="selectpicker form-control text-center" title="Select College" required>
                  <option value="" selected="selected">Please Select Campus first</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingApplicantCourse" class="form-label">Applicant's Course / Degree</label>
                <select id="siblingApplicantCourse" name="siblingApplicantCourse" class="selectpicker form-control" data-live-search="true" required>
                  <option value="" selected="selected">Please Select College / Department first</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="siblingID" class="form-label">Sibling's Student Number</label>
                <input type="text" class="form-control text-center" name="siblingID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applySibling']){
                  echo "value='$_POST[siblingID]'";
                }
                ?>>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingName" class="form-label">Sibling's Full Name</label>
                <input type="text" class="form-control text-center" name="siblingName" placeholder="Sibling's Full Name" pattern="[a-zA-Z\s\.]*$" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applySibling']){
                  echo "value='$_POST[siblingName]'";
                }
                ?>>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingYearLevel" class="form-label">Sibling's Year Level</label>
                <select id="siblingYearLevel" name="siblingYearLevel" class="selectpicker form-control text-center" data-live-search="true" required>
                  <option value="" selected="selected">Select Year Level</option>
                  <?php $view->yearLevel(); ?>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingSiblingCampus" class="form-label">Sibling's Campus</label>
                <select id="siblingSiblingCampus" name="siblingSiblingCampus" class="selectpicker form-control text-center " title="Select Campus" required>
                  <option value="" selected="selected">Select Campus</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingSiblingCollege" class="form-label">Sibling's College / Department</label>
                <select id="siblingSiblingCollege" name="siblingSiblingCollege" class="selectpicker form-control text-center" title="Select College" required>
                  <option value="" selected="selected">Please Select Campus first</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingSiblingCourse" class="form-label">Sibling's Course / Degree</label>
                <select id="siblingSiblingCourse" name="siblingSiblingCourse" class="selectpicker form-control" data-live-search="true" required>
                  <option value="" selected="selected">Please Select College / Department first</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <h6 class="Reminder pt-4 text-danger">*Kindly convert your COM into an image file*<br>*Maximum of 2MB file size*</h6>
              <div class="col-md-8 pt-3">
                <label for="applicantBC" class="form-label">Applicant's Birth Certificate</label>
                <input type="file" class="form-control text-center" aria-label="file example" name="applicantBC" id="applicantBC" accept="image/*" autocomplete="no" onchange="return validateSizeACOM()">
                <script>
                  validateSizeACOM = () => {
                    const fi = document.getElementById('applicantBC');
                    // Check if any file is selected.
                    if (fi.files.length > 0) {
                      for (var i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        // The size of the file.
                        if (file >= 2048) {
                          document.getElementById('applicantBC').value = "";
                          Swal.fire({
                            title: "File is too big. Please upload a file that is less than 2MB",
                            icon: "error",
                            width: 900
                          });

                        }
                      }
                    }
                  }
                </script>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="siblingBC" class="form-label">Sibling's Birth Certificate</label>
                <input type="file" class="form-control text-center" aria-label="file example" name="siblingBC" id="siblingBC" accept="image/*" autocomplete="no" onchange="return validateSizeSCOM()">
                <script>
                  validateSizeSCOM = () => {
                    const fi = document.getElementById('siblingBC');
                    // Check if any file is selected.
                    if (fi.files.length > 0) {
                      for (var i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        // The size of the file.
                        if (file >= 2048) {
                          document.getElementById('siblingBC').value = "";
                          Swal.fire({
                            title: "File is too big. Please upload a file that is less than 2MB",
                            icon: "error",
                            width: 900
                          });

                        }
                      }
                    }
                  }
                </script>
              </div>
            </div>
            <div class="col-12 text-center">
              <input class="btn btn-secondary btn-lg btn-block" type="submit" name="applySibling" id="applySibling" value="Apply"></input>
              <?php
              if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applySibling']) {
                $applyClass = new apply();
                $applyClass->verifySibling($_POST['studentID'], $_POST['studentEmail'], $_POST['studentName'], $_POST['studentYearLevel'], $_POST['siblingApplicantCampus'], $_POST['siblingApplicantCollege'], $_POST['siblingApplicantCourse'], $_POST['siblingID'], $_POST['siblingName'], $_POST['siblingYearLevel'], $_POST['siblingSiblingCampus'], $_POST['siblingSiblingCollege'], $_POST['siblingSiblingCourse'], $_FILES['applicantBC'], $_FILES['siblingBC']);
              }
              ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="regOverlay" id="CEISForm">
    <div class="regWrapper">
      <a class="close" href="">&times;</a>
      <div class="regContent">
        <div class="regForm">
          <h2 class="text-center">CEIS DISCOUNT FORM</h2>
          <p class="text-center">This application is applicable for 1 Academic Year ONLY.</p>
          <form class="row pt-3 g-3 needs-validation" enctype="multipart/form-data" method="post" action="">
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentID" class="form-label">Applicant's Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyCEIS']){
                  echo "value='$_POST[studentID]'";
                }
                ?>
                >
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="CEISstudentID" class="form-label">Applicant's CEIS Student Number</label>
                <input type="text" class="form-control text-center" name="CEISstudentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyCEIS']){
                  echo "value='$_POST[CEISstudentID]'";
                }
                ?>
                >
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control text-center" name="studentEmail" placeholder="delacruz1900000@ceu.edu.ph" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyCEIS']){
                  echo "value='$_POST[studentEmail]'";
                }
                ?>
                >
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentName" class="form-label">Applicant's Full Name</label>
                <input type="text" class="form-control text-center" name="studentName" placeholder="Juan Santos Dela Cruz" pattern="[a-zA-Z\s]*$" autocomplete="no"
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyCEIS']){
                  echo "value='$_POST[studentName]'";
                }
                ?>
                >
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="ceisCampus" class="form-label">Campus</label>
                <select id="ceisCampus" name="ceisCampus" class="selectpicker form-control text-center " title="Select Campus" required>
                  <option value="" selected="selected">Select Campus</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="ceisCollege" class="form-label">College / Department</label>
                <select id="ceisCollege" name="ceisCollege" class="selectpicker form-control text-center" title="Select College" required>
                  <option value="" selected="selected">Please Select Campus first</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="ceisCourse" class="form-label">Course / Degree</label>
                <select id="ceisCourse" name="ceisCourse" class="selectpicker form-control" data-live-search="true" required>
                  <option value="" selected="selected">Please Select College / Department first</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="ceisCampusGraduated" class="form-label">CEIS Campus Graduated</label>
                <select id="ceisCampusGraduated" name="ceisCampusGraduated" class="selectpicker form-control text-center" title="Select Campus" required>
                  <option value="" selected="selected">Select Campus</option>
                </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <h6 class="Reminder pt-4 text-danger">*Kindly convert your diploma into an image file* <br>*Maximum of 2MB file size*</h6>
              <div class="col-md-8 pt-3">
                <label for="ceisDiploma" class="form-label">CEIS Diploma</label>
                <input type="file" class="form-control text-center" aria-label="file example" name="ceisDiploma" id="ceisDiploma" accept="image/*" autocomplete="no" onchange="return validateSizeCEISDip()">
                <script>
                  validateSizeCEISDip = () => {
                    const fi = document.getElementById('ceisDiploma');
                    // Check if any file is selected.
                    if (fi.files.length > 0) {
                      for (var i = 0; i <= fi.files.length - 1; i++) {

                        const fsize = fi.files.item(i).size;
                        const file = Math.round((fsize / 1024));
                        // The size of the file.
                        if (file >= 2048) {
                          document.getElementById('ceisDiploma').value = "";
                          Swal.fire({
                            title: "File is too big. Please upload a file that is less than 2MB",
                            icon: "error",
                            width: 900
                          });

                        }
                      }
                    }
                  }
                </script>
              </div>
            </div>
            <div class="col-12 text-center">
              <input class="btn btn-secondary btn-lg btn-block" type="submit" name="applyCEIS" id="applyCEIS" value="Apply"></input>
              <?php
              if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['applyCEIS']) {
                $applyClass = new apply();
                $applyClass->verifyCEIS($_POST['studentID'], $_POST['CEISstudentID'], $_POST['studentEmail'], $_POST['studentName'], $_POST['ceisCampus'], $_POST['ceisCollege'], $_POST['ceisCourse'], $_POST['ceisCampusGraduated'], $_FILES['ceisDiploma']);
              }
              ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/DanielHoffmann/jquery-svg-pan-zoom/master/compiled/jquery.svg.pan.zoom.js"></script>
  <script src="resource/js/map-country.js"></script>
  <script src="resource/js/map.js"></script>
  <script src="vendor/js/popper.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>



  <?php
  $getData = new cascadingDropdown();
  $allData = $getData->getAllData();
  ?>
  <script>
    var allData = <?php echo $allData; ?>;
    window.onload = function() {

      var alumniCampus = document.getElementById("alumniStudentCampus");
      var alumniCollege = document.getElementById("alumniStudentCollege");
      var alumniCourse = document.getElementById("alumniStudentCourse");

      var siblingApplicantCampus = document.getElementById("siblingApplicantCampus");
      var siblingApplicantCollege = document.getElementById("siblingApplicantCollege");
      var siblingApplicantCourse = document.getElementById("siblingApplicantCourse");


      var siblingSiblingCampus = document.getElementById("siblingSiblingCampus");
      var siblingSiblingCollege = document.getElementById("siblingSiblingCollege");
      var siblingSiblingCourse = document.getElementById("siblingSiblingCourse");

      var ceisCampus = document.getElementById("ceisCampus");
      var ceisCollege = document.getElementById("ceisCollege");
      var ceisCourse = document.getElementById("ceisCourse");

      var ceisCampusGraduated = document.getElementById("ceisCampusGraduated");

      // var tracertCampus = document.getElementById("tracertCampus");
      // var tracertCollege = document.getElementById("tracertCollege");
      // var tracertCourse = document.getElementById("tracertCourse");

      for (var x in allData) {
        alumniCampus.options[alumniCampus.options.length] = new Option(x, x);
      }
      for (var x in allData) {
        siblingApplicantCampus.options[siblingApplicantCampus.options.length] = new Option(x, x);
      }
      for (var x in allData) {
        siblingSiblingCampus.options[siblingSiblingCampus.options.length] = new Option(x, x);
      }
      for (var x in allData) {
        ceisCampus.options[ceisCampus.options.length] = new Option(x, x);
      }
      for (var x in allData) {
        ceisCampusGraduated.options[ceisCampusGraduated.options.length] = new Option(x, x);
      }
      // for (var x in allData) {
      //   tracertCampus.options[tracertCampus.options.length] = new Option(x, x);
      // }

      alumniCampus.onchange = function() {
        //empty Chapters- and Topics- dropdowns
        alumniCourse.length = 1;
        alumniCollege.length = 1;
        //display correct values
        for (var y in allData[this.value]) {
          alumniCollege.options[alumniCollege.options.length] = new Option(y, y);
        }
      }
      alumniCollege.onchange = function() {
        //empty Chapters dropdown
        alumniCourse.length = 1;
        //display correct values
        var z = allData[alumniCampus.value][this.value];
        for (var i = 0; i < z.length; i++) {
          alumniCourse.options[alumniCourse.options.length] = new Option(z[i], z[i]);
        }
      }
      siblingApplicantCampus.onchange = function() {
        //empty Chapters- and Topics- dropdowns
        siblingApplicantCourse.length = 1;
        siblingApplicantCollege.length = 1;
        //display correct values
        for (var y in allData[this.value]) {
          siblingApplicantCollege.options[siblingApplicantCollege.options.length] = new Option(y, y);
        }
      }
      siblingApplicantCollege.onchange = function() {
        //empty Chapters dropdown
        siblingApplicantCourse.length = 1;
        //display correct values
        var z = allData[siblingApplicantCampus.value][this.value];
        for (var i = 0; i < z.length; i++) {
          siblingApplicantCourse.options[siblingApplicantCourse.options.length] = new Option(z[i], z[i]);
        }
      }
      siblingSiblingCampus.onchange = function() {
        //empty Chapters- and Topics- dropdowns
        siblingSiblingCourse.length = 1;
        siblingSiblingCollege.length = 1;
        //display correct values
        for (var y in allData[this.value]) {
          siblingSiblingCollege.options[siblingSiblingCollege.options.length] = new Option(y, y);
        }
      }
      siblingSiblingCollege.onchange = function() {
        //empty Chapters dropdown
        siblingSiblingCourse.length = 1;
        //display correct values
        var z = allData[siblingSiblingCampus.value][this.value];
        for (var i = 0; i < z.length; i++) {
          siblingSiblingCourse.options[siblingSiblingCourse.options.length] = new Option(z[i], z[i]);
        }
      }
      ceisCampus.onchange = function() {
        //empty Chapters- and Topics- dropdowns
        ceisCourse.length = 1;
        ceisCollege.length = 1;
        //display correct values
        for (var y in allData[this.value]) {
          ceisCollege.options[ceisCollege.options.length] = new Option(y, y);
        }
      }
      ceisCollege.onchange = function() {
        //empty Chapters dropdown
        ceisCourse.length = 1;
        //display correct values
        var z = allData[ceisCampus.value][this.value];
        for (var i = 0; i < z.length; i++) {
          ceisCourse.options[ceisCourse.options.length] = new Option(z[i], z[i]);
        }
      }
      // tracertCampus.onchange = function() {
      //   //empty Chapters- and Topics- dropdowns
      //   tracertCourse.length = 1;
      //   tracertCollege.length = 1;
      //   //display correct values
      //   for (var y in allData[this.value]) {
      //     tracertCollege.options[tracertCollege.options.length] = new Option(y, y);
      //   }
      // }
      // tracertCollege.onchange = function() {
      //   //empty Chapters dropdown
      //   tracertCourse.length = 1;
      //   //display correct values
      //   var z = allData[tracertCampus.value][this.value];
      //   for (var i = 0; i < z.length; i++) {
      //     tracertCourse.options[tracertCourse.options.length] = new Option(z[i], z[i]);
      //   }
      // }
    }
  </script>




  <script>
    AOS.init();
  </script>
</body>
<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
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

</html>