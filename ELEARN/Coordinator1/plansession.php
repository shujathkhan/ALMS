<?php
session_start();
require_once 'dbconfig.php';
if (isset($_POST['submit'])) {

//learning plan arrays
$time=$_POST['time']; //array("a","b","c","d");
$activity=$_POST['activity']; //array("a","b","c","d");
$topic=$_POST['topic']; //array("a","b","c","d");
$planlevel=$_POST['planlevel']; //array("a","b","c","d");

$y=sizeof($time);

$courseid= $_SESSION['courseid'];
$tablename='master_course_'.$courseid;
$sid= $_SESSION['sid'];           //coordinator will be clicking on the session fetch sid then //sprintf("SELECT sid FROM $tablename");

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
echo "<script>alert('$message'); location.href='Session-Form.php';</script>";
}
$message = "Learning Plan Added Successfully";
echo "<script>alert('$message'); location.href='Session-Form.php';</script>";
}
?>