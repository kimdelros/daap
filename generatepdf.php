<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once ('pdfprototype/fpdi/src/autoload.php');
require_once ('pdfprototype/fpdf.php');

$localhost = "127.0.0.1:3306";
$username = "root";
$password = "";
$dbname = "daap";
$transID = $_GET['transID'];
$con = new mysqli($localhost, $username, $password, $dbname);
if ($con->connect_error){
  die("Connection failed ".$con->connect_error);
}
$sql = "SELECT * from `applications` WHERE `transID` = '$transID'";
$result = $con->query($sql);

while ($data = $result->FETCH_ASSOC()){
  $filename="DAAP_Template-Cert.pdf";

  if ($data['appType'] === '1'){
    $appType = "Alumni Discount";
  }
  else if ($data['appType'] === '2'){
    $appType = "Sibling Discount";
  }
  else if ($data['appType'] === '3'){
    $appType = "CEIS Graduate";
  }

  if ($data['campusID'] === '1'){
    $campus = "Malolos";
  }
  else if ($data['campusID'] === '2'){
    $campus = "Manila";
  }
  else if ($data['campusID'] === '3'){
    $campus = "Makati";
  }

  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile($filename);
  $template = $pdf->importPage(1);
  $pdf->useTemplate($template);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->SetFont('Helvetica');
  $pdf->SetFontSize(11);

  $pdf->SetXY(92, 133);
  $pdf->Write(0, $data['studentName']);
  $pdf->SetXY(170, 133);
  $pdf->Write(0, $campus);
  $pdf->SetXY(150, 143);
  $pdf->Write(0, $appType);
  $pdf->SetXY(98, 153);
  $pdf->Write(0, date('Y-m-d',strtotime($data['dateApplied'])));
  $pdf->SetXY(74, 163);
  $pdf->Write(0, date('Y-m-d',strtotime($data['dateApproved'])));

  if ($data['campusID'] === '1'){
    $pdf->Image('resource/signatures/dummy_sig_1.png', "77","200", "60","20");
  }
  else if ($data['campusID'] === '2'){
    $pdf->Image('resource/signatures/dummy_sig_2.png', "77","200", "60","20");
  }
  else if ($data['campusID'] === '3'){
    $pdf->Image('resource/signatures/dummy_sig_3.png', "77","200", "60","20");
  }

  $pdf->Output('D', "Certification - $data[studentName].pdf");
}

?>
