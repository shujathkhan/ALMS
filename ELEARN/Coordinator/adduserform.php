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
}else{
	$table='overallfaculty';
	$id='staffid';
}
 
/*$query = sprintf("SELECT COUNT(username) FROM $table WHERE $id='%s'",mysqli_real_escape_string($conn,$checkid));
$result =mysqli_query($conn,$query);
$a=mysqli_fetch_row($result);
if ($a[0] > 0)
{
$message = "User Already in Exists,try again";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}else
{*/
$query='';
$cmd='';
	
$cmd=sprintf("INSERT INTO $table (firstname,lastname,$id,emailid,username,password,role,groupname,status) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%d')",mysqli_real_escape_string($conn,$firstname),mysqli_real_escape_string($conn,$lastname),mysqli_real_escape_string($conn,$checkid),mysqli_real_escape_string($conn,$email),mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$password),mysqli_real_escape_string($conn,$role),mysqli_real_escape_string($conn,$groupname),mysqli_real_escape_string($conn,$status));
$result1=mysqli_query($conn,$cmd);

if($table=='overallstudent')
{
$tablename='student_'.$checkid;
$query=sprintf("CREATE TABLE $tablename (staffid varchar(15),courseid varchar(15),coursename varchar(50),u1 varchar(15),u2 varchar(15),u3 varchar(15),u4 varchar(15),u5 varchar(15),roleid varchar(10),status varchar(20),PRIMARY KEY(courseid,staffid) )");
$result=mysqli_query($conn,$query);

if($result)
{
	$message='student registered';
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
}
else
{
$courseid='';
$coursename='';
$role='';	
$tablename='faculty_'.$checkid;
$query=sprintf("CREATE TABLE $tablename (studentid varchar(15),studentname varchar(30),courseid varchar(15),coursename varchar(50),u1 varchar(15),u2 varchar(15),u3 varchar(15),u4 varchar(15),u5 varchar(15),status varchar(20),PRIMARY KEY(studentid,courseid) ) ");
$reslt=mysqli_query($conn,$query);

//entering faculty details in coordinator table
$id= $_SESSION['id']; //coordinator id after he logs in
$table='';
$sql=sprintf("SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$department' AND 
	table_name LIKE 'coordinator___".$id."'" ,mysqli_real_escape_string($conn,$id) );
	$result= mysqli_query($conn,$sql);
	if($result){
	while($row=mysqli_fetch_row($result))
	 $table=$row[0];
}

$sql=sprintf("SELECT courseid,coursename FROM $table ");
$res=mysqli_query($conn,$sql);
if($res){
while($row=mysqli_fetch_row($res))
{
$courseid=$row[0];
$coursename=$row[1];
}
}else{
$message='no course under coordinator';
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
$query=sprintf("SELECT coursetype FROM course WHERE courseid='$courseid' ");
$result =mysqli_query($conn,$query);
if($result){
while($row=mysqli_fetch_row($result)){	
if($row[0]=='0')
	$role=0;
else
	$role=1;
}
}
$tablename='coordinator_'.$role.'_'.$id;   //entering faculty under coordinator
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==1)
{
$sql= sprintf("INSERT INTO $tablename(staffid,courseid,coursename,status) VALUES('$checkid','$courseid','$coursename','0') "); 
$res=mysqli_query($conn,$sql);
}

if($res)
{
$message = "user registered successfully";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
else{
$message = "user not registered , try again";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
}
//}
?>