<?php
session_start();
require_once 'dbconfig.php';
$table=$_SESSION['quiztable'];
$qtype=$_SESSION['qtype'];
if (isset($_POST['submit'])) {
$query = sprintf("SELECT answers FROM $table where quiztype='$qtype'");
$result=mysqli_query($conn,$query);
$i=1;
$score=0;
while($row=mysqli_fetch_array($result)){
if(isset($_POST['op'.$i]))
{	$op=$_POST['op'.$i];
	if($row[0]==$op){
		++$score;
		}
}
$i++;
}
//$sql=sprintf("insert");
$message = 'Your score is '.$score;
		echo "<script>alert('$message'); 
		location.href='quiz_stud.php';</script>";
}
?>
