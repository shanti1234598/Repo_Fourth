<?php
require('fpdf.php');


//$servername = "localhost";
//$username = "root";
//$password = "";

// Create connection
//$conn = new mysqli($servername, $username, $password);

// Check connection
//if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$con = mysqli_connect("localhost","root","","rkeduaug");
$sql="select * from va_order_master where vao_student_id='{$_POST['student_no']}' order by vao_id limit 5";
$result=mysqli_query($con,$sql);
while($rows=mysqli_fetch_array($result)){
    $pdf->Cell(40,10,$rows['vao_charge']);
}

$pdf->Output();
//$pdf->Output('example.pdf', 'D');
?>