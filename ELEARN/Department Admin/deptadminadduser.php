<?php
session_start();
//require_once('dbconfig.php');

$firstname= $_POST['fname'];
$lastname= $_POST['lname'];
$checkid=$_POST['sID'];
$email= $_POST['email'];
//$contactnumber= $_POST['contact'];
$username= $_POST['uname'];
$password= $_POST['pwd'];
$department= $_SESSION['department'];
$role= $_POST['select1'];
$groupname= 'default'; 
$status= '0';
//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","$department");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
//db exist adding roles

if($role=='dept admin'|| $role=='Dept admin'|| $role=='Department admin'|| $role=='Departmentadmin'|| $role=='Department Admin')
{
$message= "dept admin exist.. no modifications made";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
else{
if ( ($role =='Student') || ($role=='student') || ($role=='students'))
{
	$table='overallstudent';
	$id='studentid';
}else{
	$table='overallfaculty';
	$id='staffid';
}	
		 
$query = sprintf("SELECT COUNT(username) FROM $table WHERE $id='%s'",mysqli_real_escape_string($conn,$checkid));
$result =mysqli_query($conn,$query);
//echo $query.'<br>';
$a=mysqli_fetch_row($result);
//echo $a[0];
if ($a[0] > 0)
{
$message = "User Already in Exists,try again";
//echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}else
{
$query='';
$cmd='';
	
$cmd=sprintf("INSERT INTO $table(firstname,lastname,$id,emailid,username,password,role,groupname,status) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%d')",mysqli_real_escape_string($conn,$firstname),mysqli_real_escape_string($conn,$lastname),mysqli_real_escape_string($conn,$checkid),mysqli_real_escape_string($conn,$email),mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$password),mysqli_real_escape_string($conn,$role),mysqli_real_escape_string($conn,$groupname),mysqli_real_escape_string($conn,$status));
if($table=='overallstudent')
{
$tablename='student_'.$checkid;
$query=sprintf("CREATE TABLE $tablename (staffid varchar(15),courseid varchar(15),coursename varchar(50),u1 varchar(15),u2 varchar(15),u3 varchar(15),u4 varchar(15),u5 varchar(15),roleid varchar(10),status varchar(20),PRIMARY KEY(courseid,staffid) )");
}
else
{
$tablename='faculty_'.$checkid;
$query=sprintf("CREATE TABLE $tablename (studentid varchar(15),studentname varchar(30),courseid varchar(15),coursename varchar(50),u1 varchar(15),u2 varchar(15),u3 varchar(15),u4 varchar(15),u5 varchar(15),status varchar(20),PRIMARY KEY(studentid,courseid) ) ");
}
//echo $query;
//echo $cmd;
$res=mysqli_query($conn,$query);
$result1=mysqli_query($conn,$cmd);
if($result1 && $res)
{
$message = "user registered successfully";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
else
$message = "user not registered , try again";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
}
?>