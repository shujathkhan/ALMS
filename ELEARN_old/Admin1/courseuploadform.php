<?php
session_start();                                     
if (isset($_POST['submit'])) {

$department= $_POST['select'];
$coursename=$_POST['cname'];
$courseid=$_POST['cID'];
$u1=$_POST['select1'];
$u2=$_POST['select2'];
$u3=$_POST['select3'];
$u4=$_POST['select4'];
$u5=$_POST['select5'];
//connect to db
define("DB_HOST","localhost");
define("DB_NAME","$department");
define("DB_USERNAME","root");
define("DB_PASSWORD","PASSWORD");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
//NEED TO CHECK THE DB FOR WRITING THE QUERY

$query = sprintf("SELECT courseid FROM course WHERE coursename='%s'",mysqli_real_escape_string($conn,$coursename));
//Perform Query
$result =mysqli_query($conn,$query);
//check no of rows
$numrows=mysqli_num_rows($result);

if ($numrows>=1)
{
    $message = "Course Already in Exists";
    echo "<script type='text/javascript'>alert('$message');</script>";
   // header("Location: courseupload.html");    // CHANGE NAME ACCORDInglY
	exit;
}
else
{  
$_SESSION["courseid"]=$courseid;   //need this to access units table
$_SESSION["department"]=$department; //need this to access units table
$cmd=sprintf("INSERT INTO course(department,coursename,courseid,coursetype,u1,u2,u3,u4,u5) VALUES('%s','%s','%s','0','%s','%s','%s','%s','%s')",mysqli_real_escape_string($conn,$department),mysqli_real_escape_string($conn,$coursename),mysqli_real_escape_string($conn,$courseid),mysqli_real_escape_string($conn,$u1),mysqli_real_escape_string($conn,$u2),mysqli_real_escape_string($conn,$u3),mysqli_real_escape_string($conn,$u4),mysqli_real_escape_string($conn,$u5));
$result1=mysqli_query($conn,$cmd);
if(!$result1)
{
	$message = "course not registered try again!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: courseupload.html"); 
}
else
{
$message = "course registered successfully";
echo "<script type='text/javascript'>alert('$message');</script>";
header("Location: courseupload.html");
}
//course db updated successfully
}
}
?>	 
		 