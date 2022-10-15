<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
require_once 'config.php';

class viewtable extends config{


  public function viewRequestAlumni(){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `isApproved`= 0 AND `appType` = 1";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3 class='text-center'> Entrance Grant Application </h3>";
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th class='d-none d-sm-table-cell'>Application ID</th>";
    echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
    echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
    echo "<th class='d-none d-sm-table-cell'>Student Email</th>";
    echo "<th class='d-none d-sm-table-cell'>View Document</th>";
    echo "<th style='font-size: 85%;'>Actions</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td class='d-none d-sm-table-cell' >$data[appID]</td>";
    echo "<td class='d-none d-sm-table-cell' >$data[studentID]</td>";
    echo "<td class='d-none d-sm-table-cell' >$data[studentName]</td>";
    echo "<td class='d-none d-sm-table-cell' >$data[studentEmail]</td>";
    echo "<td class='d-none d-sm-table-cell' ><a href='#' class='btn btn-secondary btn-sm col-12 mt-1'><i class='fa fa-edit'></i>View</a></td>";
    echo "<td>
              <a href='editES.php?tn=' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Approve Application</a>
              <a href='editES.php?tn=' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>On-Hold</a>
              <a href='admesreject.php?tn=' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Reject Application</a>
          </td>";
    echo "</tr>";
    }
    echo "</table>";

  }

  public function viewRequestCEIS(){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `isApproved`= 0 AND `appType` = 3";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3 class='text-center'> Entrance Grant Application </h3>";
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th class='d-none d-sm-table-cell'>Application ID</th>";
    echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
    echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
    echo "<th class='d-none d-sm-table-cell'>Student Email</th>";
    echo "<th class='d-none d-sm-table-cell'>View Document</th>";
    echo "<th style='font-size: 85%;'>Actions</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td class='d-none d-sm-table-cell' >$data[appID]</td>";
    echo "<td class='d-none d-sm-table-cell' >$data[studentID]</td>";
    echo "<td class='d-none d-sm-table-cell' >$data[studentName]</td>";
    echo "<td class='d-none d-sm-table-cell' >$data[studentEmail]</td>";
    echo "<td class='d-none d-sm-table-cell' ><a href='#' class='btn btn-secondary btn-sm col-12 mt-1'><i class='fa fa-edit'></i>View</a></td>";
    echo "<td>
              <a href='editES.php?tn=' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Approve Application</a>
              <a href='editES.php?tn=' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>On-Hold</a>
              <a href='admesreject.php?tn=' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Reject Application</a>
          </td>";
    echo "</tr>";
    }
    echo "</table>";

  }

  public function viewRequestSibling(){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `isApproved`= 0 AND `appType` = 2";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3 class='text-center'> Entrance Grant Application </h3>";
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th class='d-none d-sm-table-cell'>Application ID</th>";
    echo "<th class='d-none d-sm-table-cell'>Student Number</th>";
    echo "<th class='d-none d-sm-table-cell'>Student Name</th>";
    echo "<th class='d-none d-sm-table-cell'>Student Email</th>";
    echo "<th class='d-none d-sm-table-cell'>View Document</th>";
    echo "<th style='font-size: 85%;'>Actions</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td class='d-none d-sm-table-cell' >$data[appID]</td>";
    echo "<td class='d-none d-sm-table-cell' >$data[studentID]</td>";
    echo "<td class='d-none d-sm-table-cell' >$data[studentName]</td>";
    echo "<td class='d-none d-sm-table-cell' >$data[studentEmail]</td>";
    echo "<td class='d-none d-sm-table-cell' ><a href='#' class='btn btn-secondary btn-sm col-12 mt-1'><i class='fa fa-edit'></i>View</a></td>";
    echo "<td>
              <a href='editES.php?tn=' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Approve Application</a>
              <a href='editES.php?tn=' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>On-Hold</a>
              <a href='admesreject.php?tn=' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Reject Application</a>
          </td>";
    echo "</tr>";
    }
    echo "</table>";

  }


}
