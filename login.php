<?php
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
session_start();

define("DB_HOST","localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$user =$_POST['user'];
$pass =$_POST['pass'];
$dept_select=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_connect_error());

$demo= mysqli_query($dept_select, "SELECT CONCAT(  GROUP_CONCAT(DISTINCT TABLE_SCHEMA) , '' ) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA NOT IN (\"del\",\"elab_db\",\"information_schema\",\"mysql\",\"performance_schema\",\"phpmyadmin\",\"project\" ) ");

$dept=array();
$result = mysqli_fetch_array($demo);
$dept=explode(",",$result[0]);


$conn=''; //starting value
$loc='';
$flag=0;
$department='';
foreach ($dept as $value) {
	$loc=array_search($value,$dept);
	$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,$value) or die(mysqli_connect_error());

//sanitize user
/*$user= preg_replace("/[^A-Za-z0-9]/", "", $user);
$user= mysqli_real_escape_string($conn,$user);
$user= filter_var($user, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
$user=stripslashes($user);
$user=strip_tags_content($user);*/
/*
$user= bin2hex($user);
pack("H*",bin2hex($user))    //this part is not working
*/
//sanitize pass
/*$pass = preg_replace("/[^A-Za-z0-9]/", "", $pass);
$pass = mysqli_real_escape_string($conn,$pass);
$pass = filter_var($pass, FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
$pass = stripslashes($pass);
$pass = strip_tags_content($pass);*/
/*
$pass = bin2hex($pass);    //this part is not working
pack("H*",bin2hex($pass))
*/
//checking
//faculty
$sql = sprintf("SELECT staffid,role FROM overallfaculty WHERE username='".$user."' AND password='".$pass."'");
//student
$query = sprintf("SELECT studentid,role FROM overallstudent WHERE username='".$user."' AND password = '".$pass."'");
// Perform Query

$res=mysqli_query($conn,$sql);     //faculty 
$result =mysqli_query($conn,$query);  //student

$role='';
$id;
if($res){                       //faculty
$count =mysqli_num_rows($res);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count>=1) {
while($row=mysqli_fetch_array($res)){
$id=$row[0];
$role=$row[1];
}
$department=$value;
//session the credentials
$_SESSION['department']= $department;
$_SESSION['logged']= "TRUE";
$_SESSION['valid'] = true;
$_SESSION['timeout'] = time();
$_SESSION['username'] = $user;
$_SESSION['password'] = $pass;
$_SESSION['id'] = $id;
$_SESSION['role'] = $role;

$flag=1;
if($role=='faculty' || $role=='Faculty' || $role=='FACULTY')
$role='Faculty';
if($role=='coordinator' || $role=='Coordinator' || $role=='COORDINATOR')
$role='Coordinator';
if($role=='Admin' || $role=='admin' || $role=='ADMIN')
$role='Admin';
if($role=='dept admin' || $role=='department admin' || $role=='Department admin' || $role=='Department Admin')
$role='Department Admin';
if($role=='subcoordinator' || $role=='Subcoordinator' || $role=='SubCoordinator' || $role=='Sub Coordinator'|| $role=='Sub-Coordinator')
$role='subcoordinator';

if($role=='Faculty'||$role=='Coordinator'||$role=='Admin'||$role=='Department Admin'||$role=='subcoordinator'){
//header("Location: $role/index.php");    // CHANGE NAME ACCORDInglY
$message = "Successfully logged-in!";
echo "<script type='text/javascript'>alert('$message');location.href='$role/index.php';</script>";
}
}
}

if($result){                          //student
$count =mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count>=1 ) {
while($row=mysqli_fetch_array($result)){
$id=$row[0];
$role=$row[1];
}
$department=$value;
//session the credentials
$_SESSION['department']= $department;
$_SESSION['logged']= "TRUE";
$_SESSION['valid'] = true;
$_SESSION['timeout'] = time();
$_SESSION['username'] = $user;
$_SESSION['password'] = $pass;
$_SESSION['id'] = $id;
$_SESSION['role'] = $role;
$message = "Successfully logged-in!";
echo "<script type='text/javascript'>alert('$message');location.href='Students/index.php';</script>";
$flag=1;
//header("Location: Students/index.php");    // CHANGE NAME ACCORDInglY

exit;
}
}

if(!$res && !$result){
  if($loc==sizeof($dept))
{ //no login
  $message = "the user doesnt exist login failed ,try again";
   echo "<script>alert('$message'); location.href='log.html';</script>";
   exit;  
}
}
$conn=''; // setting conn to null again..
}  
// if no res or result after searching all dbs
if($flag!=1)
{
if( ($res && $result) || $loc==sizeof($dept)){
   $message = "the user doesnt exist login failed ,try again";
   echo "<script>alert('$message'); location.href='log.html';</script>";
   exit;
   }
}
?>