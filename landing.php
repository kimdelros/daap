<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';

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
    <link rel="stylesheet" href="resource/css/landingstyle.css">
    <title>DAAP Portal</title>
  </head>
  <body>
    <section class="bg-banner">
      <div class="container container-fluid">
        <div class="row text-center">
          <div class="daaplogo" data-aos="fade-down" data-aos-duration="2000">
            <img src="resource/img/DAAP-transparent.png" width="230px" alt="daap-logo">
          </div>
          <div id="carouselWorks" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up" data-aos-duration="2000">
            <div class="carousel-inner">
              <div class="AlumniDiscount carousel-item active container container-fluid">
                <h2>Alumni Discount</h2>
                <a href="#AlumniForm" class='btn btn-info btn-sm'>Apply Now</a>
              </div>
              <div class="SiblingDiscount carousel-item container container-fluid">
                <h2>Sibling Discount</h2>
                <a href="#AlumniForm" class='btn btn-info btn-sm'>Apply Now</a>
              </div>
              <div class="CEISDiscount carousel-item container container-fluid">
                <h2>CEIS Discount</h2>
                <a href="#AlumniForm" class='btn btn-info btn-sm'>Apply Now</a>
              </div>
            </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#carouselWorks" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselWorks" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
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
