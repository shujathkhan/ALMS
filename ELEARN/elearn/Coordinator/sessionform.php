<?php
session_start();
require_once 'dbconfig.php';
if (isset($_POST['submit'])) {
	$sessionrationale=$_POST['rationale'];
$courseid= $_SESSION['courseid'];
$tablename='master_course_'.$courseid;
$sid= $_SESSION['sid'];           //coordinator will be clicking on the session fetch sid then //sprintf("SELECT sid FROM $tablename");

$sql=sprintf("UPDATE $tablename SET session_rationale='$sessionrationale' WHERE sid='$sid' ");
echo 
$result=mysqli_query($conn,$sql);
echo "<script>alert('$sql');</script>";
if(!$result)
{
//$message = "Session Rationale not added. Please Try Again.";
echo "<script>alert('$message');// location.href='Session-Form.php';</script>";
}
else{
$message = "Session Rationale Added Successfully";
echo "<script>alert('$message');// location.href='Session-Form.php';</script>";
}
/* |||||||||||||||||||||||||||||||||LEARNING OUTCOME||||||||||||||||||||||||||||||||||||||||*/
$level= $_POST['lolevel'];//array("1","z","s","r");
$verb=$_POST['verb'];//array("1","z","s","r");
$outcome=$_POST['outcome'];//array("1","z","f","r");

$x=sizeof($level);

//learning outcome arrays
$id1='';
for($i=0;$i<$x;$i++){
$id1.= $level[$i].'|'.$verb[$i].'|'.$outcome[$i].'~`';
}
//echo "<script>alert('$id1');</script>";

$sql=sprintf("UPDATE $tablename SET learningoutcome='$id1' WHERE sid='$sid' ");
$result=mysqli_query($conn,$sql);
if(!$result)
{
$message = "Please Try Again.";
echo "<script>alert('$message');// location.href='Session-Form.php';</script>";
}
$message = "Outcome Added Successfully";
echo "<script>alert('$message');// location.href='Session-Form.php';</script>";
/* |||||||||||||||||||||||||||||||||LEARNING PLAN||||||||||||||||||||||||||||||||||||||||*/
$time=$_POST['time']; //array("a","b","c","d");
$activity=$_POST['activity']; //array("a","b","c","d");
$topic=$_POST['topic']; //array("a","b","c","d");
$planlevel=$_POST['planlevel']; //array("a","b","c","d");

$y=sizeof($time);


//learning outcome arrays
$id2='';

//learning plan arrays
for($i=0;$i<$y;$i++){
$id2.= $time[$i].'|'.$activity[$i].'|'.$topic[$i].'|'.$planlevel[$i].'~`';
}

$sql=sprintf("UPDATE $tablename SET learningplan='$id2' WHERE sid='$sid' ");
$result=mysqli_query($conn,$sql);
if(!$result)
{
$message = "Learning Plan not added. Please Try Again.";
echo "<script>alert('$message');// location.href='Session-Form.php';</script>";
}
$message = "Learning Plan Added Successfully";
echo "<script>alert('$message'); location.href='Session-Form.php';</script>";
}
?>