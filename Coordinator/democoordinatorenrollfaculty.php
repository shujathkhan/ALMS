<?php
session_start();
//  coordinator enroll faculty 
$str='';
require_once 'dbconfig.php';
$coursename='';
$role='';
$department= $_SESSION['department'];
$staffid=$_POST['staffid'];
$res3='';
$res4='';
$res5='';

//get id from staffid

$id= $_SESSION['id']; //coordinator id after he logs in
$table='';
//**********************
$sql=sprintf("SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$department' AND 
	table_name LIKE 'coordinator___".$id."'" );
	$demo='';
	$result= mysqli_query($conn,$sql);
	if($result){
	while($row=mysqli_fetch_row($result)){
	 $table=$row[0];
}
}
if(is_null($table) || empty($table)){
$message="coordinator table doesnt exist try again";
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}//**********************
$sql=sprintf("SELECT courseid FROM $table ");

$res=mysqli_query($conn,$sql);
if($res){
while($row=mysqli_fetch_row($res))
{
$courseid=$row[0];
}
}else{
$message='no course under coordinator';
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}

//coordinator table creation
$query=sprintf("SELECT coursetype ,coursename FROM course WHERE courseid='$courseid' ");
$result =mysqli_query($conn,$query);
if($result){
while($row=mysqli_fetch_row($result)){	
if($row[0]=='0')
{
	$role=0;	
    $coursename=$row[1];
}else{
	$role=1;
    $coursename=$row[1];
}
}
}

$tablename='coordinator_'.$role.'_'.$id;   //entering faculty under coordinator 
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==1)   // if table exist then insert else create and insert course details
{
//insert faculty name in coordinator list 
$sql4= sprintf("UPDATE $tablename SET status='1' WHERE staffid='$staffid' "); 
$res9=mysqli_query($conn,$sql4);
if(!$res9)
die("faculty status not updated in $tablename ");
}
// table for student details stored under that faculty 
$tablename='faculty_'.$staffid; 
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==0)   //
{
$sql3=sprintf("CREATE TABLE $tablename (studentid varchar(20),studentname varchar(30),courseid varchar(10),coursename varchar(50),u1 int(3) ,u2 int(3),u3 int(3),u4 int(3),u5 int(3),PRIMARY KEY(studentid,courseid) ) "); 
$res2 =mysqli_query($conn,$sql3);
}

$table='faculty_'.$courseid.'_'.$staffid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$table."'"))==0)   // if table exist then insert else create and insert course details
{
$sql3=sprintf("CREATE TABLE $table (staffid varchar(10) ,courseid varchar(10),coursename varchar(50),sid varchar(10),status int(5) ,PRIMARY KEY(sid) ) " );
$res3 =mysqli_query($conn,$sql3);
if(!$res3){
die(" $table not created ") ;
}
}
$coursetable='master_course_'.$courseid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$coursetable."'"))==1)     // check master course table exist or not
{
$insert=sprintf("INSERT INTO $table(staffid,courseid,coursename,sid,status) SELECT '$staffid','$courseid','$coursename',sid,'NULL' FROM $coursetable ");
$res4 =mysqli_query($conn,$insert);
if(!$res4){
die("master course sid not inserted into $table");
}
}else{
$message = "master course table $coursetable not found";
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}

$message="faculty enrolled";
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";

?>