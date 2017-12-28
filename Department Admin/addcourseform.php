<?php                                                //WORKING
session_start();
//**********************************
function strip_tags_content($text, $tags = '', $invert = FALSE) {

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags); 
  $tags = array_unique($tags[1]); 
    
  if(is_array($tags) AND count($tags) > 0) { 
    if($invert == FALSE) { 
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $text); 
    } 
    else { 
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $text); 
    } 
  } 
  elseif($invert == FALSE) { 
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text); 
  } 
  return $text; 
} 
//**********************************

$coursename=$_POST['coursename'];
$courseid=$_POST['courseid'];
$department=$_SESSION['department'];
$radio_value=$_POST['optradio'];
//connect to db

define("DB_HOST","localhost");
define("DB_NAME",$department);
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
	
//sanitize inputs
$coursename= preg_replace("/[^A-Za-z0-9]/", "", $coursename);
$coursename= mysqli_real_escape_string($conn,$coursename);
$coursename= filter_var($coursename, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
$coursename=stripslashes($coursename);
$coursename=strip_tags_content($coursename);

$courseid= preg_replace("/[^A-Za-z0-9]/", "", $courseid);
$courseid= mysqli_real_escape_string($conn,$courseid);
$courseid= filter_var($courseid, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
$courseid=stripslashes($courseid);
$courseid=strip_tags_content($courseid);


$query1 = sprintf("SELECT coursename FROM course WHERE courseid='$courseid' ");

$result =mysqli_query($conn,$query1);
$numrows=mysqli_num_rows($result);
if ($numrows>0)
{
$message = "Course Already in Exists,try again";
echo "<script>alert('$message'); location.href='AddCourse.php';</script>";
}
else
{	
$cmd=sprintf("INSERT INTO course(coursename,courseid,coursetype,department) VALUES('$coursename','$courseid','$radio_value','$department') ");
$result=mysqli_query($conn,$cmd);

$tablename='master_course_'.$courseid;
$query=sprintf(" CREATE TABLE $tablename (staffid varchar(20),session_rationale varchar(100),sid varchar(20),learningplan varchar(300),learningoutcome varchar(300),learningplanstatus int(5),learningverification int(5),status int(5), quizstatus int(5),PRIMARY KEY(sid) )");
$res=mysqli_query($conn,$query);
//individual quiz table

$tablename='quiz_table_'.$courseid;
$query1=sprintf(" CREATE TABLE $tablename (quizrefid varchar(25),questionrefid varchar(20),quiztype varchar(20),`questions` varchar(200), `options` varchar(200),`answers` varchar(30),`code` varchar(100),PRIMARY KEY(questionrefid) )");
$res1=mysqli_query($conn,$query1);

if($result && $res && $res1)
{
$message = "course registered successfully";
echo "<script>alert('$message');location.href='AddCourse.php';</script>";
}
else{
$message ="course data $coursename not registered try again!";
echo "<script>alert('$message');location.href='AddCourse.php';</script>";
}
}
?>