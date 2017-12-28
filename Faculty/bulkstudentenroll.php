<?php
session_start();
require_once 'dbconfig.php';

$courseid= $_POST['courseid'];
$staffid= $_SESSION['id'];

//-----------------------------------------------------------------------------------------
//validate whether uploaded file is a csv file
    $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes))
{
  if(is_uploaded_file($_FILES['file']['tmp_name']))
   {
    //open uploaded csv file with read only mode
    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
    //skip first line
    fgetcsv($csvFile);        
    //parse data from csv file line by line
    while(($line = fgetcsv($csvFile)) !== FALSE)
	 {  
      //getting student id and studentname  in the csv file
	  if($line[0]!=NULL && $line[1]!=NULL )
	  {
		$studentid= $line[0];
		$studentname=$line[1];
		//course details
		$query=sprintf("SELECT coursetype ,coursename FROM course WHERE courseid='$courseid' ");
$result =mysqli_query($conn,$query);
$role='';
$coursename='';
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

//insert student id into faculty table 
$tablename='faculty_'.$staffid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==0){
	$message = 'faculty table doesnt exit ERROR...' ;
	echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}
else{
$sql3='';
$row = mysqli_num_rows(mysqli_query($conn,"SELECT studentid FROM $tablename WHERE studentid = '$studentid' ") );
if($row<1)
$sql3=sprintf("INSERT INTO $tablename (studentid,studentname,courseid,coursename,u1,u2,u3,u4,u5,status) VALUES('$studentid','$studentname','$courseid','$coursename','0','0','0','0','0','0') ");
else
$sql3=sprintf("UPDATE $tablename SET studentname='$studentname',courseid='$courseid',coursename='$coursename' WHERE studentid='$studentid'");

$res2 =mysqli_query($conn,$sql3);

}
//creating <student course> table and adding master course values into it
$table='student_'.$courseid.'_'.$studentid;  
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$table."'"))>=1){
}else
{
$sql=sprintf("CREATE TABLE $table (staffid varchar(30),
                        session_rationale varchar(100),
                        sid varchar(15),
                        learningplan varchar(500),
                        learningoutcome varchar(500),
                        learningplanstatus varchar(5),
                        status int(5),
                        learningverification varchar(100),
                        quizstatus int(5),
                        PRIMARY KEY(sid) ) ");	
$res=mysqli_query($conn,$sql);
if($res)
{
$status=0;
$quizstatus=0;
$learningplanstatus=0;
$coursetable='master_course_'.$courseid;
$query= sprintf("INSERT INTO $table(staffid,session_rationale,sid,learningplan,learningoutcome,learningplanstatus,status,learningverification,quizstatus) SELECT $staffid, session_rationale, sid, learningplan,learningoutcome,$learningplanstatus,$status,learningverification,$quizstatus FROM $coursetable");
//echo $query;
$res1=mysqli_query($conn,$query);
if(!$res1){
$message="error inserting sid into student table";
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}
}
else{
    $message='error creating student master course';
	echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}
}

$table ='student_'.$studentid;

//entering faculty name under student table 
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==0){
$message= 'error student table doesnt exist'; 
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}else
{
$row = mysqli_num_rows(mysqli_query($conn,"SELECT staffid FROM $table WHERE courseid= '$courseid' ") );
if($row<1)
$sql=sprintf("INSERT INTO $table VALUES('$staffid','$courseid','$coursename','0','0','0','0','0','0','0') ");
else
$sql=sprintf("UPDATE $table SET staffid='$staffid',coursename='$coursename' WHERE courseid='$courseid' ");	

	$res=mysqli_query($conn,$sql);
	if($res){
	 $message= ' course entered in student table ';
	 echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
	}
	else{
     $message= 'course not entered ERROR';
	echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
	}
}
		
	  }
} fclose($csvFile);
 $qstring = '?status=succ';	
 }else
{
$qstring = '?status=invalid_file';
}
}
?>