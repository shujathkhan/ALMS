<?php
session_start();
$department=$_POST['department'];
$status= '0';
$str='';
$message='';
require_once('dbconfig.php');
$db_selected = mysqli_select_db($conn,$department);
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
	  
      $query1 = sprintf("SELECT coursename FROM course WHERE courseid='$line[0]' ");
      $result =mysqli_query($conn,$query1);
      $numrows=mysqli_num_rows($result);
      if ($numrows > 0)
        echo "Course Already in Exists,try again";
	  else{
 $coursetype='';			
 if(strcmp($department,$line[3])==0)
	$coursetype=0;
else
	$coursetype=1;

$cmd=sprintf("INSERT INTO course (courseid,coursename,coursetype,department,rationale,outcome,syllabusupload) 
VALUES('".$line[0]."','".$line[1]."','".$coursetype."','".$line[3]."','".$line[4]."','".$line[5]."','".$line[6]."') ");
$result=mysqli_query($conn,$cmd);
//echo $cmd;
$tablename='master_course_'.$line[0];
$query=sprintf("CREATE TABLE $tablename (staffid varchar(20),session_rationale varchar(100),sid varchar(20),learningplan varchar(300),learningoutcome varchar(300),learningplanstatus int(5),learningverification int(5),status int(5), quizstatus int(5),PRIMARY KEY(sid) ) ");
$res=mysqli_query($conn,$query);
//echo $query;
$tablename='quiz_table_'.$line[0];
$query1=sprintf("CREATE TABLE $tablename (quizrefid varchar(25),questionrefid varchar(20),quiztype varchar(20),`question` varchar(200), `option` varchar(200),`answer` varchar(30),`code` varchar(100),PRIMARY KEY(questionrefid) ) ");
$res1 = mysqli_query($conn,$query1);
//echo $query1;
if($result && $res && $res1)
$message.= "course registered successfully";
else
$str.= "course data $line[1] not registered try again!";

if(!empty($str)) 
	 echo "<script>alert('$str')</script>";
echo "<script>alert('1'); location.href='AddCourse.php';</script>";
}
if(!empty($str)) 
	 echo "<script>alert('$str')</script>";
echo "<script>alert('2'); location.href='AddCourse.php';</script>";

if(!empty($str)) 
	 echo "<script>alert('$str')</script>";
echo "<script>alert('3'); location.href='AddCourse.php';</script>";

   } fclose($csvFile);
     $qstring = '?status=succ';	
   }else
	{
     $qstring = '?status=invalid_file';
    }
  }
  echo 'nw';
?>