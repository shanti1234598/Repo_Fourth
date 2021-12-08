<?php
require('fpdf.php');

$data1 = $_POST['data1'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$data1);
$pdf->Output('example.pdf', 'D');
?>