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
$image1 = "img/image1.jpg";
$image2 = "img/images.png";

$pdf->SetTitle("RKDEMY");

$pdf->Cell(167,5,'',0,0);

$pdf->Cell(23.78,13, $pdf->Image($image2, $pdf->GetX(), $pdf->GetY(), 23.78,13), 0, 1, 'L', false );



                                          
$pdf->Cell(12.78,8, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 12.78), 0, 0, 'L', false );
//$pdf->Cell(20,5,'KAVYA KNOWLEGE MANAGEMENT PRIVATE LTD.',0,0);
//$pdf->Ln(9);

 //$pdf->Line(10,30,200,30);
 //$pdf->Ln(10);
 //$pdf->MultiCell(24,20,"KAVYA KNOWLEGE MANAGEMENT PRIVATE LTD. GSTN.\n Gstin:2733",0,0);
 $pdf->SetFont('arial','',10);

  //$pdf->MultiCell(120,8,"KAVYA KNOWLEGE MANAGEMENT PRIVATE LTD.\n GSTN:GDF87666DJ \n CIN:USSGV9876");
  $pdf->MultiCell(90,4," \n KAVYA KNOWLEGE MANAGEMENT PRIVATE LTD.",0,0);
  $con = mysqli_connect("localhost","root","","rkeduaug");
 // $sql="select * from va_order_master where vao_student_id='{$_POST['student_no']}' order by vao_id limit 1";
  //$result=mysqli_query($con,$sql);
 $sql="select va_order_master.vao_subtotal as amounts,concat(va_student_master.vas_firstname,' ',va_student_master.vas_middlename,' ',va_student_master.vas_lastname) as name ,va_order_master.vao_transaction_date as tdate ,va_student_master.vas_email as email ,va_student_master.vas_mobile as mob from   va_order_master inner join va_student_master on va_order_master.vao_student_id=va_student_master.vas_id where va_order_master.vao_id='{$_POST['student_no']}' order by vao_id limit 1";
  $result=mysqli_query($con,$sql);
  while($rows=mysqli_fetch_array($result))  {

  $pdf->Cell(17,5,'',0,0);
  $pdf->SetTextColor(51,0,51);
  $pdf->SetFont('arial','',7);
$pdf->Cell(7,5,'GSTN',0,0);
$pdf->Cell(25,5,':GDF87666DJ',0,1);

//$pdf->Cell(23.78,13, $pdf->Image($image2, $pdf->GetX(), $pdf->GetY(), 23.78,13), 0, 0, 'L', false );

$pdf->Cell(17,5,'',0,0);
$pdf->Cell(7,5,'CIN',0,0);
$pdf->Cell(25,5,':GDF87666DJ',0,0);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arial','',11);
$pdf->Cell(120,5,'',0,1);

//$pdf->Cell(23.78,13, $pdf->Image($image2, $pdf->GetX(), $pdf->GetY(), 23.78,13), 0, 0, 'L', false );

//$pdf->Cell(52,5,':2018-12-24 11:24:10 AM',1,1);                                             


//$pdf->Cell(105,5,'KAVYA KNOWLEGE MANAGEMENT PRIVATE LTD.',0,1);


$pdf->Ln(3);

 $pdf->Line(10,42,200,42);
 //$pdf->Ln(10);
 $pdf->Ln(5);

 $pdf->SetFont('arial','',16);
 $pdf->cell(44,5,'Payment Receipt',0,0);
 $pdf->SetFont('arial','',9);
 $pdf->Cell(33,5,'Transaction Reference',0,0);
 $pdf->Cell(58,5,':Pay_108Hrkld',0,1);
 $pdf->Ln(3);
 $pdf->Cell(150,5,'This is a payment receipt for your transaction on RKDEMY',0,1);
 

 $pdf->Ln(10);

 $pdf->Cell(23,5,'AMOUNT PAID',0,0);

 $pdf->SetFont('arial','',11);
 $pdf->SetTextColor(112,41,99);
 $pdf->Cell(55,5,$rows['amounts'].' INR',0,1);
 $pdf->Ln(10);
 $pdf->SetTextColor(170, 152, 169);

 $pdf->Cell(90,5,'ISSUE To',0,0);
$pdf->Cell(58,5,'PAID ON',0,1);
$pdf->Ln(2);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(90,5,$rows['email'],0,0);  
$pdf->Cell(58,5,$rows['tdate'],0,1);  
$pdf->Cell(90,5,$rows['mob'],0,1);                                          

$pdf->Ln(8);

$pdf->setFillColor(220,220,220); 
$pdf->SetTextColor(128,128,128);                              

$pdf->Cell(55,5,'Description',0,0,'C',true);
$pdf->Cell(58,5,'Unit Price',0,0,'C',true);
$pdf->Cell(25,5,'qty',0,0,'C',true);
$pdf->Cell(52,5,'Amount',0,1,'C',true);      
$pdf->Ln(1);                                       

$pdf->SetTextColor(0,0,0);    
$pdf->Cell(55,5,'Amount',0,0,'C');
$pdf->Cell(58,5,$rows['amounts'],0,0,'C');
$pdf->Cell(25,5,'1',0,0,'C');
$pdf->Cell(52,5,$rows['amounts'],0,1,'C');

$pdf->Ln(12);

//$pdf->Cell(58,5,':Complete',1,1);

//$pdf->Line(30,60,200,60);
/* 
$pdf->Ln(10);

 $pdf->Line(10,30,200,30);
 $pdf->Ln(10); */


/* $pdf->Ln(10);

$pdf->Line(10,60,200,60);

$pdf->Ln(10); */

$pdf->Cell(20,5,'Paid by',0,0);
$pdf->Cell(58,5,':'.$rows['name'],0,1);

/* $pdf->Line(155,75,195,75); */
$pdf->Ln(16);

$pdf->Cell(140,5,'',0,0);
$pdf->Cell(50,5,'Signature',0,1,'C');

  }
$pdf->Output();
//$pdf->Output('./report/example111.pdf', 'F');
// echo ($pdf->success_msg());

?>