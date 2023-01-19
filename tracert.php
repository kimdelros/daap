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


    <link rel="stylesheet" href="resource/css/tracert.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="resource/js/scripts.js"></script>
    <link rel="icon" href="resource/img/daap-icon.png">

    <title>DAAP Locate</title>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark">
        <a href="index.php"><img src="resource/img/DAAPlogo-white.png" class="img-fluid logo" alt="daap-logo"></a>
    </nav>
    <section class="tracert" id="tracert">
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
            
            var tracertCampus = document.getElementById("tracertCampus");
            var tracertCollege = document.getElementById("tracertCollege");
            var tracertCourse = document.getElementById("tracertCourse");

            for (var x in allData) {
        tracertCampus.options[tracertCampus.options.length] = new Option(x, x);
            }

            tracertCampus.onchange = function() {
            //empty Chapters- and Topics- dropdowns
            tracertCourse.length = 1;
            tracertCollege.length = 1;
            //display correct values
            for (var y in allData[this.value]) {
            tracertCollege.options[tracertCollege.options.length] = new Option(y, y);
            }
        }
        tracertCollege.onchange = function() {
            //empty Chapters dropdown
            tracertCourse.length = 1;
            //display correct values
            var z = allData[tracertCampus.value][this.value];
            for (var i = 0; i < z.length; i++) {
            tracertCourse.options[tracertCourse.options.length] = new Option(z[i], z[i]);
            }
        }
        }
    </script>
    <script>
        AOS.init();
    </script>
</body>

</html>