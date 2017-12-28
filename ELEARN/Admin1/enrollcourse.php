<?php
if(isset($_POST['enroll']))                      //  dept admin enroll coordinator
{ 
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'it';
$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}
$courseid= $_POST['courseid'];
$staffid= $_POST['staffid'];

$x=strpos($staffid,"-");
$x+=1;
$demo='';
for(;$x<strlen($staffid);$x++){
$demo.=$staffid[$x];
}
$staffid=$demo;

//update in overallfaculty table
$sql1=sprintf("UPDATE overallfaculty SET role='coordinator' WHERE staffid='$staffid' "); //  change faculty to coordinator
$res1 =mysqli_query($conn,$sql1);

//coordinator table creation
$query=sprintf("SELECT coursetype ,coursename FROM course WHERE courseid='$courseid' ");
$result =mysqli_query($conn,$query);
$role=1;
if($result){
while($row=mysqli_fetch_row($result)){	
if($row[0]=='0')
    $role=0; //$_POST['role']; 	
else
	$role=1;
}
$coursename=$row[1];
}
$table='master_course_'.$courseid;
$sql=sprintf("UPDATE $table SET staffid='$staffid' ");    //enter coordinator id into master course

$tablename='coordinator_'.$role.'_'.$staffid;

if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==0)   // if table doesnt exist create and insert coordinator details
{
$sql3=sprintf("CREATE TABLE $tablename (staffid varchar(10),courseid varchar(10),coursename varchar(50),u1 int(3) ,u2 int(3),u3 int(3),u4 int(3),u5 int(3),roleid varchar(20),status int(2), PRIMARY KEY(staffid)) "); // getting coursetype from course 
$res3 =mysqli_query($conn,$sql3);

//insert coordinator as a faculty 
$sql4= sprintf("INSERT INTO $tablename (staffid,courseid,coursename,roleid,status) VALUES ('$staffid','$courseid','$coursename','$role','1')"); 
//Perform Query
$res4=mysqli_query($conn,$sql4);
echo $sql4;
if($res4){
$message = "selected faculty list enrolled successfully";
echo "<script>alert('$message'); </script>";
//header("Location: manageuser.html");    // CHANGE NAME ACCORDInglY
//exit;
}
//coordinator will also be a faculty for that course create table for that
$tablename='faculty_'.$role.'_'.$staffid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==0)   // if table exist then insert else create and insert course details
{
$sql3=sprintf("CREATE TABLE $tablename (studentid varchar(20),studentname varchar(30),courseid varchar(10),coursename varchar(50),s_unit_1 int(3) ,s_unit_2 int(3),s_unit_3 int(3),s_unit_4 int(3),s_unit_5 int(3),PRIMARY KEY(studentid) ) "); // getting coursetype from course 
$res2 =mysqli_query($conn,$sql3);
if($res2){
//$message = 'res2 working';
//echo "<script>alert('$message'); </script>";
}
}

$table='faculty_'.$courseid.'_'.$staffid;

if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$table."'"))==0)   // if table exist then insert else create and insert course details
{ echo 'inside loop';
$sql3=sprintf("CREATE TABLE $table (staffid varchar(10) ,courseid varchar(10),coursename varchar(50),sid varchar(10),status int(5) ,PRIMARY KEY(staffid) ) " );
$res3 =mysqli_query($conn,$sql3);
if($res3){
//$message = "faculty course table created";
//echo "<script>alert('$message'); location.href='AddCourse.php';</script>";
}
}

}
else{
$message = "Coordinator for course exist,No new coordinator created..";
echo "<script>alert('$message'); location.href='AddCourse.php';</script>";
}
}
?>