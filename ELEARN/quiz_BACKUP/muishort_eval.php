<?php
session_start();
require_once 'dbconfig.php';
$table = 'quiz_table_'.$_SESSION['courseid'];
$query = sprintf("SELECT answers FROM $table where quiztype='short' ");
$result=mysqli_query($conn,$query);
$count=0;
$score=0;

while($row=mysqli_fetch_array($result)){
	$answer=$_POST['ans'];
	if($answer[$count]==$row[0]){
		++$score;
		}	
$count++;
		}
		$tablename='student_'.$_SESSION['courseid'].'_'.$_SESSION['id'];
 $_SESSION['score'] = $score;
 $sid=$_SESSION['sid'];
 $query1 = sprintf("SELECT quizstatus FROM $tablename where sid='$sid' ");
 $result1=mysqli_query($conn,$query1);
 $row=mysqli_fetch_row($result1);
 echo $score;
 $score = $row[0]+$score;
 $query = sprintf("UPDATE $tablename SET quizstatus=$score WHERE sid='$sid'");
$result=mysqli_query($conn,$query);
		
?>