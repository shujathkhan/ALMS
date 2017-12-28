<?php
session_start();
if(!empty($_POST['checkbox'])){
$dbName1 = $_POST['dept'];
$role1 = $_POST['role'];

$dbName = $dbName1[0];
$role=$role1[0];

if($role=='student' || $role=='Student' || $role=='students'){
	 $table='overallstudent';
	 $id='studentid';
 }else{
	 $table='overallfaculty';
	 $id='staffid';
 }

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if(!$conn)
{
    die("Database connection failed: " . mysqli_connect_error());
}

$dept = $_POST['dept'];
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$checkid = $_POST['id'];
$emailid = $_POST['mail'];
$contactno = $_POST['num'];
$username = $_POST['uname'];
$password = $_POST['pass'];
$x=sizeof($password);
$flag=0;
for($i=0;$i<$x;$i++)
{
	$query = sprintf("UPDATE $table SET firstname='$firstname[$i]',lastname='$lastname[$i]',emailid='$emailid[$i]',contactno='$contactno[$i]',username='$username[$i]',password='$password[$i]' WHERE $id='$checkid[$i]' ");
	$res = mysqli_query($conn,$query);
	if($res && mysqli_affected_rows($conn)>=0)
		$flag+=1;
}
if($flag==$x)
	echo "users updated";
else
	echo ($x-$flag).' users not updated';
}
else{
	echo 'Select a row to update';
}
?>