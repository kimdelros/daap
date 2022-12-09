<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/daap/resource/php/class/core/init.php';
require_once 'config.php';

class viewtable extends config{

  public function viewPendingSummaryCard($appType){
    $con = $this->con();
    switch($appType){
      case "1": case "2": case "3":
        $sql = "SELECT COUNT(*) FROM `applications` WHERE `isApproved`= 0 AND `isHold`= 0 AND `isRejected`= 0 AND `appType` = '$appType'";
        break;
      case "4":
        $sql = "SELECT COUNT(*) FROM `applications` WHERE `isApproved`= 0 AND `isHold`= 0 AND `isRejected`= 0";
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

    echo"<td>";
    if($appType == "1"){
      if($result['alumniSID'] != "")
        echo "<a href='?document=$result[alumniSID]#viewDoc'>View Alumni ID</a><br>";
      if($result['alumniDiploma'] != "")
        echo "<a href='?document=$result[alumniDiploma]#viewDoc'>View Diploma</a><br>";
      if($result['alumniTOR'] != "")
        echo "<a href='?document=$result[alumniTOR]#viewDoc'>View TOR</a><br>";
    }
    else if($appType == "2"){
      if($result['applicantBC'] != "")
        echo "<a href='?document=$result[applicantBC]#viewDoc'>View Applicant Birth Certificate</a><br>";
      if($result['siblingBC'] != "")
        echo "<a href='?document=$result[siblingBC]#viewDoc'>View Sibling Birth Certificate</a><br>";
    }
    else if($appType == "3"){
      if($result['studentDiploma'] != "")
        echo "<a href='?document=$result[studentDiploma]#viewDoc'>View Student Diploma</a><br>";
    }
    echo "</td>";
  }

  private function viewCampus($campusID){
    $con = $this->con();
    $sql = "SELECT * FROM `campus` WHERE `campusID` = '$campusID'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $data) {
      if($data['campusName'] === ""){
        echo "<td>asd</td>";
      }else{
        echo "<td>$data[campusName]</td>";
      }
      
    }
  }

  public function viewPendingApplications($appType){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `isApproved`= 0 AND `isHold`= 0 AND `isRejected`= 0 AND `appType` = '$appType'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    switch($appType){
      case "1":
        echo "<h3 class='text-center'> Entrance Grant Pending Application (Alumni) </h3>";
        break;
      case "2":
        echo "<h3 class='text-center'> Entrance Grant Pending Application (Sibling) </h3>";
        break;
      case "3":
        echo "<h3 class='text-center'> Entrance Grant Pending Application (CEIS) </h3>";
        break;
      default: break;
    }
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction ID</th>";
    echo "<th>Campus</th>";
    echo "<th>Student Number</th>";
    echo "<th>Student Name</th>";
    echo "<th>Student Email</th>";
    echo "<th>View Document</th>";
    echo "<th>Actions</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td>$data[transID]<br>
          <a href='?transID=$data[transID]#viewSum'>View Summary</a></td>";
    $this->viewCampus($data['campusID']);
    echo "<td>$data[studentID]</td>";
    echo "<td>$data[studentName]</td>";
    echo "<td>$data[studentEmail]</td>";
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

  public function viewApprovedApplications($appType){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `isApproved`= 1 AND `appType` = '$appType'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    switch($appType){
      case "1":
        echo "<h3 class='text-center'> Entrance Grant Approved Application (Alumni) </h3>";
        break;
      case "2":
        echo "<h3 class='text-center'> Entrance Grant Approved Application (Sibling) </h3>";
        break;
      case "3":
        echo "<h3 class='text-center'> Entrance Grant Approved Application (CEIS) </h3>";
        break;
      default: break;
    }
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction ID</th>";
    echo "<th>Campus</th>";
    echo "<th>Student Number</th>";
    echo "<th>Student Name</th>";
    echo "<th>Student Email</th>";
    echo "<th>View Document</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td>$data[transID]</td>";
    $this->viewCampus($data['campusID']);
    echo "<td>$data[studentID]</td>";
    echo "<td>$data[studentName]</td>";
    echo "<td>$data[studentEmail]</td>";
    $this->viewDocuments($data['appID'], $data['appType']);
    echo "</tr>";
    }
    echo "</table>";
  }

  public function viewOnHoldApplications($appType){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `isHold`= 1 AND `appType` = '$appType'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    switch($appType){
      case "1":
        echo "<h3 class='text-center'> Entrance Grant On-Hold Application (Alumni) </h3>";
        break;
      case "2":
        echo "<h3 class='text-center'> Entrance Grant On-Hold Application (Sibling) </h3>";
        break;
      case "3":
        echo "<h3 class='text-center'> Entrance Grant On-Hold Application (CEIS) </h3>";
        break;
      default: break;
    }
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction ID</th>";
    echo "<th>Campus</th>";
    echo "<th>Student Number</th>";
    echo "<th>Student Name</th>";
    echo "<th>Student Email</th>";
    echo "<th>View Document</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td>$data[transID]</td>";
    $this->viewCampus($data['campusID']);
    echo "<td>$data[studentID]</td>";
    echo "<td>$data[studentName]</td>";
    echo "<td>$data[studentEmail]</td>";
    $this->viewDocuments($data['appID'], $data['appType']);
    echo "</tr>";
    }
    echo "</table>";
  }

  public function viewRejectedApplications($appType){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `isRejected`= 1 AND `appType` = '$appType'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    switch($appType){
      case "1":
        echo "<h3 class='text-center'> Entrance Grant Rejected Application (Alumni) </h3>";
        break;
      case "2":
        echo "<h3 class='text-center'> Entrance Grant Rejected Application (Sibling) </h3>";
        break;
      case "3":
        echo "<h3 class='text-center'> Entrance Grant Rejected Application (CEIS) </h3>";
        break;
      default: break;
    }
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction ID</th>";
    echo "<th>Campus</th>";
    echo "<th>Student Number</th>";
    echo "<th>Student Name</th>";
    echo "<th>Student Email</th>";
    echo "<th>View Document</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td>$data[transID]</td>";
    $this->viewCampus($data['campusID']);
    echo "<td>$data[studentID]</td>";
    echo "<td>$data[studentName]</td>";
    echo "<td>$data[studentEmail]</td>";
    $this->viewDocuments($data['appID'], $data['appType']);
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
    echo "<th>Application ID</th>";
    echo "<th>Student Number</th>";
    echo "<th>Student Name</th>";
    echo "<th>Student Email</th>";
    echo "<th>View Document</th>";
    echo "<th>Actions</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td>$data[appID]</td>";
    echo "<td>$data[studentID]</td>";
    echo "<td>$data[studentName]</td>";
    echo "<td>$data[studentEmail]</td>";
    $this->viewDocuments($data['appID'], $data['appType']);
    echo "<td>
            <form method='POST' action=''>
              <input class='btn btn-success btn-sm col-12 mt-1' type='submit' name='finish $data[transID]' id='finish' value='Finish Application' />
            </form>
          </td>";
    echo "</tr>";
    }
    echo "</table>";

  }

  public function viewTotalApplicants(){
    $con = $this->con();
    $sql = "SELECT COUNT(appID) FROM `applications`";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchColumn();
    return $result;
  }

  public function viewTotalPending(){
    $con = $this->con();
    $sql = "SELECT COUNT(appID) FROM `applications` WHERE `isApproved` = 0";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchColumn();
    return $result;
  }

  public function viewTotalApproved(){
    $con = $this->con();
    $sql = "SELECT COUNT(appID) FROM `applications` WHERE `isApproved` = 1";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchColumn();
    return $result;
  }

  public function viewTotalRejected(){
    $con = $this->con();
    $sql = "SELECT COUNT(appID) FROM `applications` WHERE `isRejected` = 1";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchColumn();
    return $result;
  }

  public function viewTotalDiscounted(){
    $con = $this->con();
    $sql = "SELECT COUNT(appID) FROM `applications` WHERE `isDiscounted` = 1";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchColumn();
    return $result;
  }

  public function viewTotalPerCampus(){
    $con = $this->con();
    $sql = "SELECT `campusID`, COUNT(campusID) AS quantity FROM `applications` WHERE `campusID` != 0 GROUP BY campusID";
    $data= $con->prepare($sql);
    $data->execute();
    $total[] = array();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
      $total[] = $row['quantity'];
    }
    unset($total[0]);
    return $total;
  }

  public function viewTotalPerCampusName(){
    $con = $this->con();
    $sql = "SELECT `campusName`, COUNT(campusName) AS quantity FROM `campus` WHERE `campusID` != 0 GROUP BY campusID";
    $data= $con->prepare($sql);
    $data->execute();
    $campuses[] = array();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
      $campuses[] = $row['campusName'];
    }
    unset($campuses[0]);
    return $campuses;
  }

  public function viewTotalDiscountType(){
    $con = $this->con();
    $sql = "SELECT `appType`, COUNT(appType) AS quantity FROM `applications` WHERE `appType` != 0 GROUP BY appType";
    $data= $con->prepare($sql);
    $data->execute();
    $discounts[] = array();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
      $discounts[] = $row['quantity'];
    }
    unset($discounts[0]);
    return($discounts);
  }

  public function viewTotalDiscountTypeNames(){
    $con = $this->con();
    $sql = "SELECT `appType`, COUNT(appType) AS quantity FROM `applications` WHERE `appType` != 0 GROUP BY appType";
    $data= $con->prepare($sql);
    $data->execute();
    $discounts[] = array();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $row){
      $discounts[] = $row['quantity'];
    }
    unset($discounts[0]);
    return($discounts);
  }

  public function viewAllApplications($appType){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `appType` = '$appType'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    switch($appType){
      case "1":
        echo "<h3 class='text-center font-weight-bold'> Entrance Grant Applications (Alumni) </h3>";
        break;
      case "2":
        echo "<h3 class='text-center font-weight-bold'> Entrance Grant Applications (Sibling) </h3>";
        break;
      case "3":
        echo "<h3 class='text-center font-weight-bold'> Entrance Grant Application (CEIS) </h3>";
        break;
      default: break;
    }
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction ID</th>";
    echo "<th>Student ID</th>";
    echo "<th>Student Name</th>";
    echo "<th>Student Email</th>";
    echo "<th>Student Year Level</th>";
    echo "<th>Campus</th>";
    echo "<th>Status</th>";
    echo "</thead>";
    foreach ($result as $data) {
    echo "<tr>";
    echo "<td>$data[transID]</td>";
    echo "<td>$data[studentID]</td>";
    echo "<td>$data[studentName]</td>";
    echo "<td>$data[studentEmail]</td>";
    echo "<td>$data[studentYearLevel]</td>";
    if($data['campusID'] === '1'){
      echo "<td>Malolos</td>";
    }
    else if($data['campusID'] === '2'){
      echo "<td>Manila</td>";
    }
    else if($data['campusID'] === '3'){
      echo "<td>Makati</td>";
    }

    if($data['isApproved'] === '0' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
      echo "<td style='color: orange; text-align: left;'> Pending </td>";
    }
    else if($data['isApproved'] === '1' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
      echo "<td style='color: green; text-align: left;'> Approved by Registrar </td>";
    }
    else if($data['isApproved'] === '0' && $data['isHold'] === '1' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
      echo "<td style='color: brown; text-align: left;'> On-Hold due to <p style='font-weight: bold;'>$data[reasonHold]</p></td>";
    }
    else if($data['isApproved'] === '0' && $data['isHold'] === '0' && $data['isRejected'] === '1' && $data['isDiscounted'] === '0'){
      echo "<td style='color: red; text-align: left;'> Rejected due to <p style='font-weight: bold;'>$data[reasonReject]</p> </td>";
    }
    else if($data['isApproved'] === '1' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '1'){
      echo "<td style='color: blue; text-align: left;'> Discounted by Accounting </td>";
    }
    echo "</tr>";
    }
    echo "</table>";
  }

  public function viewAllApplicationsFiltered($appType, $semester, $schoolYear){
    $con = $this->con();
    $sql = "SELECT * FROM `applications` WHERE `appType` = '$appType' AND `semester` = '$semester' AND `schoolYear` = '$schoolYear'";
    $data= $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);
    switch($appType){
      case "1":
        echo "<h3 class='text-center font-weight-bold'> Entrance Grant Applications (Alumni) $semester $schoolYear </h3>";
        break;
      case "2":
        echo "<h3 class='text-center font-weight-bold'> Entrance Grant Applications (Sibling) $semester $schoolYear </h3>";
        break;
      case "3":
        echo "<h3 class='text-center font-weight-bold'> Entrance Grant Application (CEIS) $semester $schoolYear </h3>";
        break;
      default: break;
    }
    echo "<div class='table-responsive'>";
    echo "<table id='scholartable' class='table table-bordered table-sm table-bordered table-hover shadow display' width='100%'>";
    echo "<thead class='thead-dark'>";
    echo "<th>Transaction ID</th>";
    echo "<th>Student ID</th>";
    echo "<th>Student Name</th>";
    echo "<th>Student Email</th>";
    echo "<th>Student Year Level</th>";
    echo "<th>Campus</th>";
    echo "<th>Status</th>";
    echo "</thead>";
    foreach ($result as $data) {
      echo "<tr>";
      echo "<td>$data[transID]</td>";
      echo "<td>$data[studentID]</td>";
      echo "<td>$data[studentName]</td>";
      echo "<td>$data[studentEmail]</td>";
      echo "<td>$data[studentYearLevel]</td>";
      if($data['campusID'] === '1'){
        echo "<td>Malolos</td>";
      }
      else if($data['campusID'] === '2'){
        echo "<td>Manila</td>";
      }
      else if($data['campusID'] === '3'){
        echo "<td>Makati</td>";
      }
      if($data['isApproved'] === '0' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
        echo "<td style='color: orange; text-align: left;'> Pending </td>";
      }
      else if($data['isApproved'] === '1' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
        echo "<td style='color: green; text-align: left;'> Approved by Registrar </td>";
      }
      else if($data['isApproved'] === '0' && $data['isHold'] === '1' && $data['isRejected'] === '0' && $data['isDiscounted'] === '0'){
        echo "<td style='color: brown; text-align: left;'> On-Hold due to <p style='font-weight: bold;'>$data[reasonHold]</p></td>";
      }
      else if($data['isApproved'] === '0' && $data['isHold'] === '0' && $data['isRejected'] === '1' && $data['isDiscounted'] === '0'){
        echo "<td style='color: red; text-align: left;'> Rejected due to <p style='font-weight: bold;'>$data[reasonReject]</p> </td>";
      }
      else if($data['isApproved'] === '1' && $data['isHold'] === '0' && $data['isRejected'] === '0' && $data['isDiscounted'] === '1'){
        echo "<td style='color: blue; text-align: left;'> Discounted by Accounting </td>";
      }
      echo "</tr>";
    }
    echo "</table>";
  }
}
