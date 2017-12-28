<?php
session_start();
require_once 'dbconfig.php';
if (isset($_POST['submit'])) {
$quesid = $_POST['quesid'];
$code=$_POST['code'];
$questions=$_POST['questions'];
$op1=$_POST['op1'];
$op2=$_POST['op2'];
$op3=$_POST['op3'];
$op4=$_POST['op4'];
$answers=$_POST['answers'];
$role = $_SESSION['role'];
$table = $_SESSION['quiztable'];
$n=sizeof($code); 
for($i=0;$i<$n;$i++){
$x = $i + 1;
$option[$i]=array($op1[$i],$op2[$i],$op3[$i],$op4[$i]);
$options[$i]=implode("~`",$option[$i]);
$query=sprintf("UPDATE $table SET code = '%s',questions='%s',options='%s',answers='%s' WHERE questionrefid = '%s'",mysqli_real_escape_string($conn,$code[$i]),mysqli_real_escape_string($conn,$questions[$i]),mysqli_real_escape_string($conn,$options[$i]),mysqli_real_escape_string($conn,$answers[$i]),mysqli_real_escape_string($conn,$quesid[$i]));
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