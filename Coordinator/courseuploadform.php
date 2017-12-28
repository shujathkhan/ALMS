<?php
session_start();
require_once 'dbconfig.php';
if(isset($_POST['submit'])){
$courseid=$_POST['courseID'];
$_SESSION['courseid'] = $courseid;
$u1=$_POST['u1'];
$u2=$_POST['u2'];
$u3=$_POST['u3'];
$u4=$_POST['u4'];
$u5=$_POST['u5'];
$sql = sprintf("update course set u1=$u1,u2=$u2,u3=$u3,u4=$u4,u5=$u5 WHERE courseid='$courseid'");
$res1=mysqli_query($conn,$sql);
if($res1){
	$message = "Corona Created";
echo "<script>alert('$message'); location.href='courseupload.php';Materialize.toast('Submitted!', 3000, 'rounded') ;</script>";
}
else{
	$message = "Failed";
echo "<script>alert('$message'); location.href='courseupload.php';</script>";
}
}
else{
	$message = "Try again!!";
echo "<script>alert('$message'); location.href='courseupload.php';</script>";
}
?>