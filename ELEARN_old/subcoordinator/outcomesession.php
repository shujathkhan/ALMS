<?php
session_start();
require_once 'dbconfig.php';
if (isset($_POST['submit'])) {
//learning outcome arrays
$level= $_POST['level'];//array("1","z","s","r");
$verb=$_POST['verb'];//array("1","z","s","r");
$outcome=$_POST['outcome'];//array("1","z","f","r");

$x=sizeof($level);

$courseid= $_SESSION['courseid'];
$tablename='master_course_'.$courseid;
$sid= $_SESSION['SID'];           //coordinator will be clicking on the session fetch sid then //sprintf("SELECT sid FROM $tablename");

//learning outcome arrays
$id1='';
for($i=0;$i<$x;$i++){
$id1.= $level[$i].'|'.$verb[$i].'|'.$outcome[$i].'~`';
}
//echo $id1.'</br>';

$sql=sprintf("UPDATE $tablename SET learningoutcome='$id1' WHERE sid='$sid' ");
$result=mysqli_query($conn,$sql);
if(!$result)
{
$message = "Questions not added. Please Try Again.";
echo "<script>alert('$message'); location.href='Session-Form.php';</script>";
}
$message = "Question Added Successfully";
echo "<script>alert('$message'); location.href='Session-Form.php';</script>";
}
?>