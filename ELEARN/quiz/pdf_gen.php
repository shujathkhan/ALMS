<?php
require('fpdf.php');
require('dbconfig.php');
session_start();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$table='quiz_'.$_SESSION['id'].'_'.$_SESSION['sid'];
$query=sprintf("select questionrefid,question,answer from $table");
$res=mysqli_query($conn,$query);
	while($row=mysqli_fetch_row($res)){
	$qid=$row[0];
	$q=$row[1];
	$a=$row[2];
	$pdf->Write(10,"$qid \n");
	$pdf->Write(10,"$q \n");
	$pdf->Write(10,"$a \n \n");
}
$pdf->Output();

?>