<?php
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

require_once ('pdfprototype/fpdi/src/autoload.php');
require_once ('pdfprototype/fpdf.php');


$filename="DAAP_Template-Cert.pdf";

$pdf = new FPDI();
$pdf->AddPage();
$pdf->setSourceFile($filename);
$template = $pdf->importPage(1);
$pdf->useTemplate($template);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Helvetica');
$pdf->SetFontSize(11);

$pdf->SetXY(90, 133);
$pdf->Write(0, "Jemiah Kim Del Rosario");
$pdf->SetXY(91, 143);
$pdf->Write(0, "Sibling Discount");
$pdf->SetXY(39, 153);
$pdf->Write(0, "10/21/2022");
$pdf->SetXY(28, 163);
$pdf->Write(0, "10/21/2022");

$pdf->Image('pdfprototype/signature/signature.png', "77","194", "60","20");
$pdf->SetXY(94, 238);
$pdf->Write(0, "10/21/2022");


$pdf->Output('I', "Sample.pdf");
header('Location: transferCheck.php');

?>
