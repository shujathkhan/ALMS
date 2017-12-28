<?php
session_start();
require_once 'dbconfig.php';
if (isset($_POST['submit'])) {
$quesid = $_POST['quesid'];
$questions=$_POST['questions'];
$keywords = $_POST['keyword'];
$answers=$_POST['answers'];
$role = $_SESSION['role'];
$table = $_SESSION['quiztable'];
$n=sizeof($questions); 
//$quiztype = 'mcq';
for($i=0;$i<$n;$i++){
$query=sprintf("UPDATE $table SET questions='%s',options='%s',answers='%s' WHERE questionrefid = '%s'",mysqli_real_escape_string($conn,$questions[$i]),mysqli_real_escape_string($conn,$keywords[$i]),mysqli_real_escape_string($conn,$answers[$i]),mysqli_real_escape_string($conn,$quesid[$i]));
$result=mysqli_query($conn,$query);	
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