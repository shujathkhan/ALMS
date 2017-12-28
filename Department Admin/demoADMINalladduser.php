<?php
session_start();
if (isset($_POST['submit'])) {
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$conn = mysqli_connect($dbHost,$dbUser,$dbPass);
// Create connection
if(!$conn)
{ die("Server connection failed: " . mysqli_connect_error()); }
// admin details 

$firstname= $_POST['fname'];
$lastname= $_POST['lname'];
$checkid=$_POST['sID'];
//$email= $_POST['email'];
//$contactnumber= $_POST['contact'];
$username= $_POST['uname'];
$password= $_POST['pwd'];
$department= $_POST['select'];
$role= $_POST['select1'];
$groupname= 'default'; 
$status= '0';
//check if db exist
$db_selected = mysqli_select_db($conn,$department);
if(!$db_selected){
if($role=='Department Admin')
{
// db doesnt exist and admin creates dept admin
$sql = "CREATE DATABASE $department";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    $message= "Error creating database: ";
	echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
$conn= mysqli_connect($dbHost,$dbUser,$dbPass,$department);
$sql1=sprintf("CREATE TABLE overallfaculty (firstname varchar(15),lastname varchar(15),staffid varchar(15),emailid varchar(30) ,contactno bigint(10) ,username varchar(30) , password varchar(30) ,role	varchar(30),groupname varchar(10) ,dob varchar(20),status int(1),PRIMARY KEY(username) ) ;");
$sql2=sprintf("INSERT INTO overallfaculty (firstname,lastname,staffid,username,password,role,groupname,status) VALUES ('$firstname','$lastname','$checkid','$username','$password','$role','$groupname','$status') ;");
$sql3=sprintf("CREATE TABLE overallstudent (firstname	varchar(15)	,lastname varchar(15),studentid varchar(30),emailid varchar(30) ,contactno bigint(10) ,username varchar(30) , password varchar(30) ,role	varchar(30),groupname varchar(10) ,dob varchar(20),status int(1),PRIMARY KEY(studentid) ) ;");
$sql4=sprintf("CREATE TABLE course (courseid varchar(30) , coursename varchar(50),coursetype	int(2), department varchar(50) ,rationale varchar(200),outcome varchar(200) ,syllabusupload	varchar(200),u1 int(2),u2 int(2),u3 int(2),u4 int(2),u5 int(2) ) ;");
$sql7=sprintf("ALTER TABLE course ADD courserefid INT UNSIGNED NOT NULL AUTO_INCREMENT,
    ADD PRIMARY KEY(courserefid);" );
$sql6=sprintf("ALTER TABLE course AUTO_INCREMENT = 100 ");
$sql5=sprintf("CREATE TABLE unit (courseid varchar(30),unitid varchar (20),unitname varchar(20),description varchar(100),reference varchar(100), PRIMARY KEY(unitid)  )");
$x= mysqli_query($conn,$sql1);
$y= mysqli_query($conn,$sql2);
$z= mysqli_query($conn,$sql3);
$a= mysqli_query($conn,$sql4);
$qw=mysqli_query($conn,$sql5);
$as=mysqli_query($conn,$sql6);
$ss=mysqli_query($conn,$sql7);
if($x &&$y &&$z &&$a && $qw && $as && $ss){
$message="department admin enrolled successfully";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}else
{
$message= "department admin not created... FAIL " ;
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
}else
{
$message= "database for dept doesnt exist,cannot enroll other roles ";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
}
else{ 
//db exist adding roles
define("DB_HOST","localhost");
define("DB_NAME","$department");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
if($role=='dept admin')
{
$message= 'dept admin exist.. no modifications made';
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
		 
$query = sprintf("SELECT username FROM $table WHERE $id='%s'",mysqli_real_escape_string($conn,$checkid));
// Perform Query
$result =mysqli_query($conn,$query);
//check no of rows
$numrows=mysqli_num_rows($result);
if ($numrows>=1)
{
$message = "User Already in Exists,try again";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}else
{     
$cmd=sprintf("INSERT INTO $table(firstname,lastname,$id,username,password,role,groupname,status) VALUES('%s','%s','%s','%s','%s','%s','%s','%d')",mysqli_real_escape_string($conn,$firstname),mysqli_real_escape_string($conn,$lastname),mysqli_real_escape_string($conn,$checkid),mysqli_real_escape_string($conn,$username),mysqli_real_escape_string($conn,$password),mysqli_real_escape_string($conn,$role),mysqli_real_escape_string($conn,$groupname),mysqli_real_escape_string($conn,$status));

if($table=='overallstudent')
{
$tablename='student_'.$checkid;
$query=sprintf("CREATE TABLE $tablename(staffid varchar(15),courseid varchar(15),coursename varchar(50),u1 varchar(15),u2 varchar(15),u3 varchar(15),u4 varchar(15),u5 varchar(15),roleid varchar(10),status varchar(20),PRIMARY KEY(courseid) )");
}
else
{
$tablename='faculty_'.$checkid;

$query=sprintf("CREATE TABLE $tablename(studentid varchar(15),studentname varchar(30),courseid varchar(15),coursename varchar(50),u1 varchar(15),u2 varchar(15),u3 varchar(15),u4 varchar(15),u5 varchar(15),status varchar(20),PRIMARY KEY(courseid) ) ");
}
//echo '<script>alert("'.$query.'");</script>';
$res=mysqli_query($conn,$query);
$result1=mysqli_query($conn,$cmd);
if(!$result1 || !$res)
{
$message = "user not registered try again";
echo "<script>alert('$message'); location.href='AddUser.php';</script>";
}
else
$message = "user registered successfully";
echo "<script>alert('$message');location.href='AddUser.php';</script>";
}
}
}
}
?>