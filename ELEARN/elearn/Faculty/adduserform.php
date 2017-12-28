<?php
session_start();
$firstname= $_POST['fname'];
$lastname= $_POST['lname'];
$checkid=$_POST['sID'];
$email= $_POST['email'];
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
$table='';
$id='';
if ( ($role =='Student') || ($role=='student') || ($role=='students'))
{
	$table='overallstudent';
	$id='studentid';
}
$query = sprintf("SELECT COUNT(username) FROM $table WHERE $id='%s'",mysqli_real_escape_string($conn,$checkid));
$result =mysqli_query($conn,$query);
$a=mysqli_fetch_row($result);
if ($a[0] > 0)
{
$message = "User Already in Exists,try again";
}else
{
$query='';
$cmd='';
$firstname=mysqli_real_escape_string($conn,$firstname);
$lastname=mysqli_real_escape_string($conn,$lastname);	
$checkid=mysqli_real_escape_string($conn,$checkid);
$email=mysqli_real_escape_string($conn,$email);
$username=mysqli_real_escape_string($conn,$username);
$password=mysqli_real_escape_string($conn,$password);
$role=mysqli_real_escape_string($conn,$role);
$groupname=mysqli_real_escape_string($conn,$groupname);
$status=mysqli_real_escape_string($conn,$status);
$cmd=sprintf("INSERT INTO $table (firstname,lastname,$id,emailid,username,password,role,groupname,status) VALUES('$firstname','$lastname','$checkid','$email','$username','$password','$role','$groupname','$status')");
$result1=mysqli_query($conn,$cmd);

if($table=='overallstudent')
{
$tablename='student_'.$checkid;
$query=sprintf("CREATE TABLE $tablename (staffid varchar(15),courseid varchar(15),coursename varchar(50),u1 varchar(15),u2 varchar(15),u3 varchar(15),u4 varchar(15),u5 varchar(15),roleid varchar(10),status varchar(20),PRIMARY KEY(courseid,staffid) )");
$result=mysqli_query($conn,$query);
//echo $query;
if($result)
{
	$message='student registered';
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
}
}
?>