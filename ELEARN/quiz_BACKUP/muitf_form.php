<?php
session_start();
require_once 'dbconfig.php';
if (isset($_POST['submit'])) {
$quesid=$_POST['quesid'];
$questions=$_POST['questions'];
$answers=$_POST['answers'];
$table = $_SESSION['quiztable'];
$role = $_SESSION['role'];
$n=sizeof($questions);
for($i=0;$i<$n;$i++){
	$query=sprintf("UPDATE $table SET questions='%s',answers='%s' WHERE questionrefid = '%s'",mysqli_real_escape_string($conn,$questions[$i]),mysqli_real_escape_string($conn,$answers[$i]),mysqli_real_escape_string($conn,$quesid[$i]));
	$result=mysqli_query($conn,$query);
	echo $query;	
if(!$result){
$message = "Questions not added. Please Try Again.";
echo "<script>alert('$message');location.href='../$role/Session-Form.php';</script>";
}
else{
$message = "Question Added Successfully";
echo "<script>alert('$message');location.href='../$role/Session-Form.php';</script>";
}
}
}
?>