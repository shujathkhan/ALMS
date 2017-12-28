<?php
session_start();
require_once 'dbconfig.php';
$dept=$_SESSION['department'];
$id= $_SESSION['id'];
$role=$_SESSION['role'];
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$emailid=$_POST['email'];
$contactno=$_POST['contactno'];

$sql=sprintf("UPDATE overallfaculty SET firstname='$firstname',lastname='lastname',emailid='$emailid',contactno='$contactno' WHERE staffid='$id' ");
$res=mysqli_query($conn,$sql);
if($res){
	$message='updated successfully';
echo "<script>alert('$message'); location.href='profile.php';</script>";
}
else	{
	$message='updation failed';
echo "<script>alert('$message'); location.href='profile.php';</script>"; 	
}
?>