<?php
session_start();
//if(isset($_POST['submit'])) {                     //  coordinator enroll faculty
 
$str='';
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName ='it';// $_SESSION['department'];
$flag=1;
$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}
$coursename='';
$role='';
$department='it';// $_SESSION['department'];
$staffid= 'nexus-100999';//$_POST['staffid'];
//get id from staffid

$x=strpos($staffid,"-");
$x+=1;
$demo='';
for(;$x<strlen($staffid);$x++){
$demo.=$staffid[$x];
}
$staffid=$demo;

$id='4554';// $_SESSION['id']; //coordinator id after he logs in
$table='';
//**********************
$sql=sprintf("SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$department' AND 
	table_name LIKE 'coordinator___".$id."'" ,mysqli_real_escape_string($conn,$id) );
	
	$demo='';
	$result= mysqli_query($conn,$sql);
	if($result){
	while($row=mysqli_fetch_row($result)){
	 $table=$row[0];
}
}
//**********************
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

}else{
$flag=0;
}


$tablename='coordinator_'.$role.'_'.$id;   //entering faculty under coordinator

if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==1)   // if table exist then insert else create and insert course details
{
//insert faculty name in coordinator list 
$sql4= sprintf("UPDATE $tablename SET status='1' WHERE staffid='$staffid' "); 
//Perform Query
$res9=mysqli_query($conn,$sql4);
if($res9)
{echo "</br> faculty status updated in $tablename " ;
}else{
echo "faculty status not updated in $tablename " ;
}
// table for student details stored under that faculty 
$tablename='faculty_'.$role.'_'.$staffid; 
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==0)   //
{
$sql3=sprintf("CREATE TABLE $tablename (studentid varchar(20),studentname varchar(30),courseid varchar(10),coursename varchar(50),s_unit_1 int(3) ,s_unit_2 int(3),s_unit_3 int(3),s_unit_4 int(3),s_unit_5 int(3),PRIMARY KEY(studentid) ) "); // getting coursetype from course 
$res2 =mysqli_query($conn,$sql3);
if($res2){
echo "</br> $tablename created" ;
}else{
echo "$tablename not created" ;
}
}else{
echo " $tablename exist" ;
}

$table='faculty_'.$courseid.'_'.$staffid;

if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$table."'"))==0)   // if table exist then insert else create and insert course details
{
$res3='';
$res4='';
$res5='';
$sql3=sprintf("CREATE TABLE $table (staffid varchar(10) ,courseid varchar(10),coursename varchar(50),sid varchar(10),status int(5) ,PRIMARY KEY(staffid) ) " );
$res3 =mysqli_query($conn,$sql3);
if($res3){
echo "$table created </br>" ;
}else{
echo " $table not created " ;
}
//insert course sid into faculty course table
$coursetable='master_course_'.$courseid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$coursetable."'"))==1)     // check master course table exist or not
{
$insert=sprintf("INSERT INTO $table SELECT '$staffid','$courseid','$coursename',sid,'0' FROM $coursetable ");
$res4 =mysqli_query($conn,$insert);
if($res4){
echo "</br> master course sid inserted into $table " ;
}else{
echo "master course sid not inserted into $table";
}
}else{
$message = "master course table $coursetable not found";
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}
//store courseid in faculty_id table
$res5='';
$table='faculty_'.$staffid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$table."'"))==1)   // if table exist then insert else create and insert course details
{
$insert1=sprintf("INSERT INTO $table SELECT '$courseid','faculty','$role','$staffid',sid,'0','0' FROM $coursetable ");
$res5 =mysqli_query($conn,$insert1);
if($res5){
echo "</br> course inserted into $table ";
}else{
echo "course not inserted into $table";
}
}

}else
{
$coursetable='master_course_'.$courseid;
$insert=sprintf("INSERT INTO $table SELECT '$staffid','$courseid','$coursename',sid,'0' FROM $coursetable ");
$res4 =mysqli_query($conn,$insert);

$table='faculty_'.$staffid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$table."'"))==1)   // if table exist then insert else create and insert course details
{
$insert1=sprintf("INSERT INTO $table SELECT '$courseid','faculty','$role','$staffid',sid,'0','0' FROM $coursetable ");
$res5 =mysqli_query($conn,$insert1);
echo " course details inserted";
}else{
$create=sprintf("CREATE TABLE $table(courseid varchar(30),role varchar(30),coursetype int(2),staffid varchar(15),coursestid	varchar(10),custatus int(10),refid varchar(10),PRIMARY KEY(courseid) )");
$res100 =mysqli_query($conn,$create);
if($res100){
$insert1=sprintf("INSERT INTO $table SELECT '$courseid','faculty','$role','$staffid',sid,'0','0' FROM $coursetable ");
$res5 =mysqli_query($conn,$insert1);
if($res5){
echo " $table created and course details inserted";
}
}
}

if($res4 && $res5){
$message=' NO creation only Insert done';
$flag=1;
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}else{
$message = 'FAIL';
$flag=0;
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}
}
}
else{
$message = "Coordinator for course doesnt exist,No new faculty created..";
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}
//}
?>