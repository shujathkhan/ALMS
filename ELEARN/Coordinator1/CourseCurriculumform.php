<?php
session_start();
define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$dept= $_SESSION["department"];
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,$dept) or die(mysqli_connect_error());
if (isset($_POST['submit'])) {
$courseid = $_SESSION['courseid'];
$rationale=$_POST['courserationale'];
$outcome=$_POST['courseoutcome'];
$sql=sprintf("SELECT courseid FROM course WHERE courseid='$courseid' ");
$res=mysqli_query($conn,$sql);	
if($res){
$query=sprintf("UPDATE course SET rationale='$rationale' ,outcome='$outcome' WHERE courseid='$courseid' ");	
$result=mysqli_query($conn,$query);
//echo "<script>alert('$query'); ";
if(!$result){
	$message="error updating rationale and outcome";
	echo "<script>alert('$message'); location.href='CourseCurriculum.php';</script>";
}
}else{
	$message=" course doesnt exist, Add course";
	echo "<script>alert('$message'); location.href='CourseCurriculum.php';</script>";
}
$message=" course curriculum added";
echo "<script>alert('$message'); location.href='CourseCurriculum.php';</script>";
}
?>