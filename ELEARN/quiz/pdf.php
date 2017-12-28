<?php
session_start();
require_once 'dbconfig.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$table = 'quiz_table_'.$_SESSION['courseid'];
   $type='mcq';
				$query = sprintf("SELECT questions,options,answers,questionrefid FROM $table where quiztype='$type'");
                $result = mysqli_query($conn,$query);
				$count='0';

				while($row=mysqli_fetch_array($result)){
$ques=$row[0];
$ans=$row[2];
$qid=$row[3];
$pdf->Write(10,"Question ID : $qid \n");
$pdf->Write(10,"Question: $ques \n");
$pdf->Write(10,"Answer : $ans \n");
$pdf->Write(10,"\n");
				}
				$pdf->Output();
?>