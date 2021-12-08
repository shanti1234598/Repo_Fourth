<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
/* $pdf->SetFont('arial','',16);
$pdf->setFillColor(230,230,230); 
$pdf->SetTextColor(51,0,51);
$pdf->Cell(55,35,"hello from fpdf",1,'',"center",true,'');

$pdf->setFillColor(153,153,255); 
$pdf->SetTextColor(0,0,51);
$pdf->Cell(55,35,"hello from fpdf 1",1,'',"center",true,'');
$pdf->Output();
 */

$pdf->SetFont('arial','',12);
$pdf->SetTitle("RKDEMY");
$pdf->Cell(55,5,'reference code',0,0);
$pdf->Cell(58,5,':026ETY',0,0);
$pdf->Cell(25,5,'Date',0,0);
$pdf->Cell(52,5,':2018-12-24 11:24:10 AM',0,1);

$pdf->Cell(55,5,'Amount',0,0);
$pdf->Cell(58,5,':2674',0,0);
$pdf->Cell(25,5,'Channel',0,0);
$pdf->Cell(52,5,':WEB',0,1);

$pdf->Cell(55,5,'Status',0,0);

$pdf->Cell(58,5,':Complete',0,1);

//$pdf->Line(10,60,200,60);

$pdf->Ln(10);

 $pdf->Line(10,30,200,30);
 $pdf->Ln(10);

$pdf->cell(55,5,'Product Id',0,0);
$pdf->cell(58,5,':64351-84504',0,1);

$pdf->cell(55,5,'Tax Amount',0,0);
$pdf->cell(58,5,':0',0,1);

$pdf->Cell(55,5,'Product Delivary Charge',0,0);
$pdf->Cell(58,5,':0',0,1);

$pdf->Ln(10);

$pdf->Line(10,60,200,60);

$pdf->Ln(10);

$pdf->Cell(55,5,'Paid by',0,0);
$pdf->Cell(58,5,': Nawab Shah',0,1);

$pdf->Line(155,75,195,75);
$pdf->Ln(5);

$pdf->Cell(140,5,'',0,0);
$pdf->Cell(50,5,': Signature',0,1,'C');


$pdf->Output();
//$pdf->Output('./report/example11.pdf', 'F');
 //echo ($pdf->success_msg());

?>