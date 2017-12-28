<?php
session_start();

define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","PASSWORD");
$dept= $_POST("selectdept");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,$dept) or die(mysqli_connect_error());
$courseid = $_POST['courseid'];
$rationale=$_POST['Crationale'];
$outcome=$_POST['cID2'];
//syllabus will be logicalDoc
if(isset($_POST['courseid'])){
$sql=sprintf("SELECT courseid FROM course WHERE courseid='$courseid' ");
$res=mysqli_query($conn,$sql);	
if($res){
$query=sprintf("UPDATE course SET rationale='$rationale' ,outcome='$outcome' WHERE courseid='$courseid' ");	
$result=mysqli_query($conn,$query);
if(!$result){
	$message="error updating rationale and outcome";
	echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
}else{
	$message=" course doesnt exist, Add course";
	echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
	
}
?>