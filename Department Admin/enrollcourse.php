<?php
//dept admin enroll coordinator 
session_start();
//connect to db
$dept = $_SESSION['department'];
define("DB_HOST","localhost");
define("DB_NAME","$dept");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("DB not found!!");
$staff=$_POST['id'];
if(isset($_POST['checkbox'])){
$idArr = $_POST['checkbox']; //courseids
for($i=0;$i<sizeof($idArr);$i++){
$staffid= $staff[$i];
//echo $staffid;	
$courseid= $idArr[$i];

$coursename='';
//get role **************
$query=sprintf("SELECT coursetype ,coursename FROM course WHERE courseid='$courseid' ");
$result =mysqli_query($conn,$query);
$role='';
if($result){
while($row=mysqli_fetch_row($result)){	
if($row[0]=='0')
    $role=0;	
else
	$role=1;
$coursename=$row[1];
}
}
$mastercourse='master_course_'.$courseid;
//***********************************************************************************************************
$excoordinator='';
$ex_coordinatortable='';
$new_coordinatortable='';
//check if cordinator already already exist
$x=mysqli_query($conn,sprintf("SELECT COLUMN_DEFAULT FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='$dept' AND TABLE_NAME = '$mastercourse' AND COLUMN_NAME = 'staffid'"));
$xvalue=mysqli_fetch_row($x);
if(is_null($xvalue[0]) )
{
$sql=mysqli_query($conn,sprintf("UPDATE $mastercourse SET staffid='".$staffid."'"));    //enter coordinator id into master course if sid are existing
$alter=mysqli_query($conn,sprintf("ALTER TABLE $mastercourse ALTER staffid SET DEFAULT '".$staffid."';"));  // for future sids to be added staffid will be by default
}
else{   //staffid has default value  
$excoordinator=$xvalue[0];
$ex_coordinatortable='coordinator_'.$role.'_'.$excoordinator;
$new_coordinatortable='coordinator_'.$role.'_'.$staffid;
//echo "excoordinator = ".$excoordinator."||";
//echo "ex_coordinatortable=".$ex_coordinatortable."||";
//echo "new_coordinatortable=".$new_coordinatortable."||";
//if coordinator already exist remove him
$sql=mysqli_query($conn,sprintf("UPDATE $mastercourse SET staffid='$staffid' "));    //enter coordinator id into master course if sid are existing
$alter=mysqli_query($conn,sprintf("ALTER TABLE $mastercourse ALTER staffid SET DEFAULT '$staffid';"));  // for future sids to be added staffid will be by default
$changetablename=mysqli_query($conn,sprintf("RENAME TABLE ".$ex_coordinatortable." TO ".$new_coordinatortable." "));
//if($changetablename)//echo "<<table renamed>>"; 
$changeexrole=mysqli_query($conn,sprintf("UPDATE overallfaculty SET role='faculty' WHERE staffid='$excoordinator'"));
}

//update new coordinator in overallfaculty table
$sql1=sprintf("UPDATE overallfaculty SET role='coordinator' WHERE staffid='$staffid' "); //  change faculty to coordinator
$res1 =mysqli_query($conn,$sql1);

$tablename='coordinator_'.$role.'_'.$staffid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==0)   // if table doesnt exist create and insert coordinator details
{
$sql1=sprintf("CREATE TABLE $tablename (staffid varchar(10),courseid varchar(10),coursename varchar(50),u1 int(3) ,u2 int(3),u3 int(3),u4 int(3),u5 int(3),roleid varchar(20),status int(2), PRIMARY KEY(staffid)) "); // getting coursetype from course 
$res1 =mysqli_query($conn,$sql1);
//echo "<<<<<now only the new table is created >>>>>";
}

$sql2= sprintf("INSERT INTO $tablename (staffid,courseid,coursename,roleid,status) VALUES ('$staffid','$courseid','$coursename','$role','1')"); 
$res2=mysqli_query($conn,$sql2);

//coordinator will also be a faculty for that course create table for that
$tablename='faculty_'.$staffid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==0)   // if table exist then insert else create and insert course details
{
$sql3=sprintf("CREATE TABLE $tablename (studentid varchar(20),studentname varchar(30),courseid varchar(10),coursename varchar(50),u1 int(3) ,u2 int(3),u3 int(3),u4 int(3),u5 int(3),PRIMARY KEY(studentid,courseid) ) "); // getting coursetype from course 
$res3 =mysqli_query($conn,$sql3);
}

$table='faculty_'.$courseid.'_'.$staffid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$table."'"))==0)   // if table exist then insert else create and insert course details
{
$sql4=sprintf("CREATE TABLE $table (staffid varchar(10) ,courseid varchar(10),coursename varchar(50),sid varchar(10),status int(5) ,PRIMARY KEY(staffid) ) " );
$res4 =mysqli_query($conn,$sql4);
}
//if(!$new_coordinatortable)
//	die("");
}
echo "coordinator enrolled";
}else
	echo "select a row to enroll";
?>