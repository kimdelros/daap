<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
require_once 'config.php';

class viewtable extends config{

  public function viewPendingSummaryCard($appType){
    $con = $this->con();
    switch($appType){
      case "1": case "2": case "3":
        $sql = "SELECT COUNT(*) FROM `applications` WHERE `isApproved`= 0 AND `appType` = '$appType'";
        break;
      case "4":
        $sql = "SELECT COUNT(*) FROM `applications` WHERE `isApproved`= 0";
        break;
      default: break;
    }

    $data= $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchColumn();
    return $rows;
  }

  public function viewApprovedSummaryCard($appType){
    $con = $this->con();
    switch($appType){
      case "1": case "2": case "3":
        $sql = "SELECT COUNT(*) FROM `applications` WHERE `isApproved`= 1 AND `appType` = '$appType' AND `isDiscounted`= 0";
        break;
      case "4":
        $sql = "SELECT COUNT(*) FROM `applications` WHERE `isApproved`= 1 AND `isDiscounted`= 0";
        break;
      default: break;
    }

    $data= $con->prepare($sql);
    $data->execute();
    $rows = $data->fetchColumn();
    return $rows;
  }

  public function viewDocuments($appID, $appType){
    $con = $this->con();
    switch($appType){
      case "1":
        $sql = "SELECT * FROM `alumni` WHERE `appID`= '$appID'";
        break;
      case "2":
        $sql = "SELECT * FROM `sibling` WHERE `appID`= '$appID'";
        break;
      case "3":
        $sql = "SELECT * FROM `ceis` WHERE `appID`= '$appID'";
        break;
      default: break;
    }
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetch(PDO::FETCH_ASSOC);

    echo"<td class='d-none d-sm-table-cell' >";
    if($appType == "1"){
      if($result['alumniYB'] != "")
        echo "<a href='?document=$result[alumniYB]#viewDoc'>View Year Book</a><br>";
      if($result['alumniDiploma'] != "")
        echo "<a href='?document=$result[alumniDiploma]#viewDoc'>View Diploma</a><br>";
      if($result['alumniTOR'] != "")
        echo "<a href='?document=$result[alumniTOR]#viewDoc'>View TOR</a><br>";
    }
    else if($appType == "2"){
      if($result['applicantCOM'] != "")
        echo "<a href='?document=$result[applicantCOM]#viewDoc'>View Applicant COM</a><br>";
      if($result['siblingCOM'] != "")
        echo "<a href='?document=$result[siblingCOM]#viewDoc'>View Sibling COM</a><br>";
    }
    else if($appType == "3"){
      if($result['studentDiploma'] != "")
        echo "<a href='?document=$result[studentDiploma]#viewDoc'>View Student Diploma</a><br>";
    }
    echo "</td>";
  }


  public function viewRequests($appType){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `isApproved`= 0 AND `appType` = '$appType'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    switch($appType){
      case "1":
        echo "<h3 class='text-center'> Entrance Grant Application (Alumni) </h3>";
        break;
      case "2":
        echo "<h3 class='text-center'> Entrance Grant Application (Sibling) </h3>";
        break;
      case "3":
        echo "<h3 class='text-center'> Entrance Grant Application (CEIS) </h3>";
        break;
        break;
      default: break;
    }
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
    $this->viewDocuments($data['appID'], $data['appType']);
    echo "<td>
          <form method='POST' action=''>
            <input class='btn btn-success btn-sm col-12 mt-1' type='submit' name='approve $data[transID]' id='approve' value='Approve Application' />
            <input class='btn btn-warning btn-sm col-12 mt-1' type='submit' name='hold $data[transID]' id='hold' value='On-Hold' />
            <input class='btn btn-danger btn-sm col-12 mt-1' type='submit' name='reject $data[transID]' id='reject' value='Reject Application' />
          </form>
          </td>";
    echo "</tr>";
    }
    echo "</table>";    
  }
  // <button class='btn btn-success btn-sm col-12 mt-1' onclick='approve' ><i class='fa fa-edit'></i>Approve Application</button>
  // <button class='btn btn-warning btn-sm col-12 mt-1' onclick='hold' ><i class='fa fa-edit'></i>On-Hold</button>
  // <button class='btn btn-danger btn-sm col-lg-12 mt-1' onclick='reject' ><i class='fa fa-trash'></i>Reject Application</button>
  // <a href='' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Approve Application</a>
  // <a href='' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>On-Hold</a>
  // <a href='' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Reject Application</a>



  public function viewRequestsAccounting($appType){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `isDiscounted`= 0 AND `isApproved` = 1 AND `appType` = '$appType'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    switch($appType){
      case "1":
        echo "<h3 class='text-center'> Entrance Grant Application (Alumni) </h3>";
        break;
      case "2":
        echo "<h3 class='text-center'> Entrance Grant Application (Sibling) </h3>";
        break;
      case "3":
        echo "<h3 class='text-center'> Entrance Grant Application (CEIS) </h3>";
        break;
        break;
      default: break;
    }
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
    $this->viewDocuments($data['appID'], $data['appType']);
    echo "<td>
              <a href='#' class='btn btn-success btn-sm col-12 mt-1'><i class='fa fa-edit'></i>Finish Application</a>
              <a href='#' class='btn btn-warning btn-sm col-12 mt-1'><i class='fa fa-edit'></i>On-Hold</a>
              <a href='#' class='btn btn-danger btn-sm col-lg-12 mt-1'><i class='fa fa-trash'></i>Reject Application</a>
          </td>";
    echo "</tr>";
    }
    echo "</table>";

  }

}
