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

  $pdf = new FPDI();
  $pdf->AddPage();
  $pdf->setSourceFile($filename);
  $template = $pdf->importPage(1);
  $pdf->useTemplate($template);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->SetFont('Helvetica');
  $pdf->SetFontSize(11);

  $pdf->SetXY(90, 133);
  $pdf->Write(0, $data['studentName']);
  $pdf->SetXY(91, 143);
  $pdf->Write(0, $appType);
  $pdf->SetXY(39, 153);
  $pdf->Write(0, date('Y-m-d',strtotime($data['dateApplied'])));
  $pdf->SetXY(28, 163);
  $pdf->Write(0, date('Y-m-d',strtotime($data['dateApproved'])));

  $pdf->Image('pdfprototype/signature/signature.png', "77","200", "60","20");

  $pdf->Output('D', "Certification - $data[studentName].pdf");
}

?>
