<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/apply.php';
  $view = new view();
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link rel="stylesheet" href="resource/css/home.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="resource/js/scripts.js"></script>
    <link rel="icon" href="resource/img/daap-icon.png">
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
            <a href="#gallery" class="scroll-down">Scroll Down <i class="fas fa-arrow-down"></i></a>
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
                <img src="resource/img/lc-alumni.jpg" class="card-img-top"  alt="alumni"/>
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
                <img src="resource/img/lc-sibling.jpg" class="card-img-top" alt="sibling"/>
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
                <img src="resource/img/lc-ceis.jpg" class="card-img-top" alt="CEIS"/>
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
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="text-center">
                    <h2 class="fw-bolder esco">Escolarians Around the World!</h2>
                    <p class="lead fw-normal caption-world text-muted mb-5">It's amazing how these successful
                        people benchmarked their success and shared it with the rest of the world.</p>
                </div>
            </div>
        </div>

        <p class="pb-5">Use the scroll wheel to zoom.</p>
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
  <!-- <section class="tracert">

  </section>-->

  <section class="regOverlay" id="AlumniForm">
    <div class="regWrapper">
      <a class="close" href="">&times;</a>
      <div class="regContent">
        <div class="regForm">
          <h2 class="text-center font-weight-bold">ALUMNI DISCOUNT FORM</h2>
          <form class="row pt-3 g-3 needs-validation" enctype="multipart/form-data" method="POST" action="/index.php">
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentID" class="form-label">Applicant's Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2022-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentName" class="form-label">Applicant's Full Name</label>
                <input type="text" class="form-control text-center" name="studentName" placeholder="Juan Santos Dela Cruz" pattern="[a-zA-Z\s\.]*$" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control text-center" name="studentEmail" placeholder="delacruz2200000@ceu.edu.ph" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                  <label for="studentYearLevel" class="form-label">Year Level</label>
                  <select id="studentYearLevel" name="studentYearLevel" class="selectpicker form-control text-center" data-live-search="true" required>
                    <?php $view->yearLevel(); ?>  
                  </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                  <label for="studentCampus" class="form-label">Campus</label>
                  <select id="studentCampus" name="studentCampus" class="selectpicker form-control text-center" title="Select Campus" required>
                  <option value="" selected="selected">Select Campus</option>
                  </select>
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                  <label for="studentCourse" class="form-label">Course / Degree</label>
                  <select id="studentCourse" name="studentCourse" class="selectpicker form-control" data-live-search="true" required>
                    <option value="" selected="selected">Please select campus first</option>
                  </select>
              </div>
            </div>
            
            <script>
              var campuses = {
                "Malolos": ["HTML","CSS","JavaScript"],
                "Manila": ["PHP", "SQL"],
                "Makati": ["C++", "C#"]
              }
              window.onload = function() {
                var campus = document.getElementById("studentCampus");
                var course = document.getElementById("studentCourse");
                for (var x in campuses) {
                  campus.options[campus.options.length] = new Option(x, x);
                }
                campus.onchange = function() {
                course.length = 1;
                  for (var y in campuses[this.value]) {
                    course.options[course.options.length] = new Option(y, y);
                  }
                }
              }
            </script>

            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="alumniName" class="form-label">Alumni's Full Name</label>
                <input type="text" class="form-control text-center" name="alumniName" placeholder="Parent's Name" pattern="[a-zA-Z\s\.]*$" autocomplete="no">
              </div>
            </div>

            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                  <label for="campusGraduated" class="form-label">Campus Graduated</label>
                  <select id="campusGraduated" name="campusGraduated" class="selectpicker form-control text-center" title="Select Campus" required>
                  <?php $view->campus(); ?>
                  </select>
              </div>
            </div>

            <div class="row justify-content-center text-center">
            <div class="col-md-8  pt-3">
                  <label for="yearGraduated" class="form-label">Year Graduated</label>
                  <select id="yearGraduated" name="yearGraduated" class="selectpicker form-control text-center" title="Select Year Graduated" required>
                    <?php $view->years(); ?>
                  </select>
              </div>
            </div>
            
            <div class="row justify-content-center text-center">
                <h6 class="Reminder pt-4 text-danger">*Please upload atleast one document (image file)*<br>*Maximum of 2MB file size*</h6>
              <div class="col-md-8 pt-3">
                <label for="alumniYB" class="form-label">Alumni's Yearbook</label>
                   <input type="file" class="form-control text-center" aria-label="file example" name="alumniYB" id="alumniYB" accept="image/*" autocomplete="no" onchange="return validateSizeYB()">
                   <script>
                    validateSizeYB = () => {
                      const fi = document.getElementById('alumniYB');
                      // Check if any file is selected.
                      if (fi.files.length > 0) {
                          for (var i = 0; i <= fi.files.length - 1; i++) {
                    
                              const fsize = fi.files.item(i).size;
                              const file = Math.round((fsize / 1024));
                              // The size of the file.
                              if (file >= 2048) {
                                  document.getElementById('alumniYB').value = "";
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
                                  document.getElementById('alumniYB').value = "";
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
                                  document.getElementById('alumniYB').value = "";
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
              if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['applyAlumni']){
                $applyClass = new apply();
                $applyClass->verifyAlumni($_POST['studentID'], $_POST['studentEmail'], $_POST['studentName'], $_POST['studentYearLevel'], $_POST['studentCourse'], $_POST['studentCampus'], $_POST['alumniName'], $_POST['campusGraduated'], $_POST['yearGraduated'], $_FILES['alumniYB'], $_FILES['alumniDiploma'], $_FILES['alumniTOR']);
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
                <input type="text" class="form-control text-center" name="studentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control text-center" name="studentEmail" placeholder="delacruz1900000@ceu.edu.ph" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentName" class="form-label">Applicant's Full Name</label>
                <input type="text" class="form-control text-center" name="studentName" placeholder="Juan Santos Dela Cruz" pattern="[a-zA-Z\s\.]*$" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="siblingID" class="form-label">Sibling's Student Number</label>
                <input type="text" class="form-control text-center" name="siblingID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="siblingName" class="form-label">Sibling's Full Name</label>
                <input type="text" class="form-control text-center" name="siblingName" placeholder="Sibling's Full Name" pattern="[a-zA-Z\s\.]*$" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
            <h6 class="Reminder pt-4">*Kindly convert your COM into an image file*<br>*Maximum of 2MB file size*</h6>
              <div class="col-md-8 pt-3">
                <label for="applicantCOM" class="form-label">Applicant's COM</label>
                   <input type="file" class="form-control text-center" aria-label="file example" name="applicantCOM" id="applicantCOM" accept="image/*" autocomplete="no" onchange="return validateSizeACOM()">
                   <script>
                    validateSizeACOM = () => {
                      const fi = document.getElementById('applicantCOM');
                      // Check if any file is selected.
                      if (fi.files.length > 0) {
                          for (var i = 0; i <= fi.files.length - 1; i++) {
                    
                              const fsize = fi.files.item(i).size;
                              const file = Math.round((fsize / 1024));
                              // The size of the file.
                              if (file >= 2048) {
                                  document.getElementById('alumniYB').value = "";
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
                <label for="siblingCOM" class="form-label">Sibling's COM</label>
                   <input type="file" class="form-control text-center" aria-label="file example" name="siblingCOM" id="siblingCOM" accept="image/*" autocomplete="no" onchange="return validateSizeSCOM()">
                   <script>
                    validateSizeSCOM = () => {
                      const fi = document.getElementById('siblingCOM');
                      // Check if any file is selected.
                      if (fi.files.length > 0) {
                          for (var i = 0; i <= fi.files.length - 1; i++) {
                    
                              const fsize = fi.files.item(i).size;
                              const file = Math.round((fsize / 1024));
                              // The size of the file.
                              if (file >= 2048) {
                                  document.getElementById('alumniYB').value = "";
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
              if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['applySibling']){
                $applyClass = new apply();
                $applyClass->verifySibling($_POST['studentID'], $_POST['studentEmail'], $_POST['studentName'], $_POST['siblingID'], $_POST['siblingName'], $_FILES['applicantCOM'], $_FILES['siblingCOM']);
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
      <a class="close" href="" >&times;</a>
      <div class="regContent">
        <div class="regForm">
          <h2 class="text-center">CEIS DISCOUNT FORM</h2>
          <p class="text-center">This application is applicable for 1 Academic Year ONLY.</p>
          <form class="row pt-3 g-3 needs-validation" enctype="multipart/form-data" method="post" action="">
          <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="studentID" class="form-label">Applicant's Student Number</label>
                <input type="text" class="form-control text-center" name="studentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no">
              </div>
          </div>
          <div class="row justify-content-center text-center">
              <div class="col-md-8 pt-3">
                <label for="CEISstudentID" class="form-label">Applicant's CEIS Student Number</label>
                <input type="text" class="form-control text-center" name="CEISstudentID" placeholder="2010-00000" pattern="[0-9]{4}-[0-9]{5}" autocomplete="no">
              </div>
          </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control text-center" name="studentEmail" placeholder="delacruz1900000@ceu.edu.ph" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
              <div class="col-md-8  pt-3">
                <label for="studentName" class="form-label">Applicant's Full Name</label>
                <input type="text" class="form-control text-center" name="studentName" placeholder="Juan Santos Dela Cruz" pattern="[a-zA-Z\s]*$" autocomplete="no">
              </div>
            </div>
            <div class="row justify-content-center text-center">
            <h6 class="Reminder pt-4">*Maximum of 2MB file size*</h6>
              <div class="col-md-8 pt-3">
                <label for="ceisDiploma" class="form-label">CEIS Diploma (Image Upload)</label>
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
                                  document.getElementById('alumniYB').value = "";
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
              if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['applyCEIS']){
                $applyClass = new apply();
                $applyClass->verifyCEIS($_POST['studentID'], $_POST['CEISstudentID'], $_POST['studentEmail'], $_POST['studentName'], $_FILES['ceisDiploma']);
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
  <script src="https://kit.fontawesome.com/b04d2a2a76.js" crossorigin="anonymous"></script>
  
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/DanielHoffmann/jquery-svg-pan-zoom/master/compiled/jquery.svg.pan.zoom.js"></script>
  <script src="resource/js/map-country.js"></script>

     <script src="vendor/js/popper.js"></script>
     <script src="vendor/js/bootstrap.min.js"></script>
  <script>
        $(function () {
        $('[data-toggle=" "]').tooltip()
      })
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
