<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/reupload.php';

$db = new config();
$con = $db->con();
$sql = "SELECT * FROM `applications` WHERE `transID` = '$_GET[id]'";
$data= $con->prepare($sql);
$data->execute();
$result = $data->fetchAll(PDO::FETCH_ASSOC);

if(empty($result))
  header("Location: uploader.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>DAAP File Re-Uploader</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="resource/img/daap-icon.png">

    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="resource/css/uploader.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark">
        <a href="index.php"><img src="resource/img/DAAPlogo-white.png" class="img-fluid logo" alt="daap-logo"></a>
    </nav>
    <div class="wrapper">
    <div class="title">
        Discount Application and Alumni Portal <br> File Re-Uploader (Alumni)
    </div>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="row justify-content-center text-center">
        <h6 class="Reminder pt-5">*Please upload atleast one document (image file).</h6>
      <div class="col-md-8 pt-3">
        <label for="alumniSID" class="form-label">Alumni's School ID</label>
           <input type="file" class="form-control text-center" aria-label="file example" name="alumniSID" id="alumniSID" accept="image/*" autocomplete="no">
      </div>
    </div>
    <div class="row justify-content-center text-center">
      <div class="col-md-8 pt-3">
        <label for="alumniDiploma" class="form-label">Alumni's Diploma</label>
           <input type="file" class="form-control text-center" aria-label="file example" name="alumniDiploma" id="alumniDiploma" accept="image/*" autocomplete="no">
      </div>
    </div>
    <div class="row justify-content-center text-center">
      <div class="col-md-8 pt-3">
        <label for="alumniTOR" class="form-label">Alumni's TOR</label>
           <input type="file" class="form-control text-center" aria-label="file example" name="alumniTOR" id="alumniTOR" accept="image/*" autocomplete="no">
      </div>
    </div>
    <div class="col-12 text-center mt-4">
      <input class="btn btn-secondary btn-lg btn-block" type="submit" name="reupload_Alumni" id="reupload_Alumni" value="Re-Upload Document">
      <?php
        if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['reupload_Alumni']){
          $reupload = new reupload();
          $reupload->reuploadDoc($_FILES, 1);
        }
      ?>
    </div>
    </form>
    </div>
</body>
</html>
