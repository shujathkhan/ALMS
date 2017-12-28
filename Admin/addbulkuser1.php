	<?php
session_start();
$department=$_SESSION['department'];	
$userrole=$_POST['role'];
//echo $userrole;
$gname=$_POST['groupname'];
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
	  if($line[0]!=NULL && $line[1]!=NULL && $line[2]!=NULL && $line[3]!=NULL && $line[4]!=NULL && $line[5]!=NULL )
	  {
            if($userrole=='Students' || $userrole=='Student'|| $userrole=='student')
			{
             $table='overallstudent';
             $id='studentid';
            }else
			{
             $table='overallfaculty';
             $id='staffid';
            }
//$prevQuery = sprintf("SELECT username FROM $table WHERE $id = '".$line[2]."'");
//echo $prevQuery; 
$prevResult = mysqli_query($conn,$prevQuery);
$rows=mysqli_num_rows($prevResult);
$result1='';
$res='';
/*if($rows > 0)
{//echo 'hello';
}
else{*/
// insert member data into database
$query=sprintf("INSERT INTO $table (firstname,lastname,$id,emailid,username,password,role,groupname) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[4]."','".$line[5]."','$userrole','$gname')");
//echo $query;
$res=mysqli_query($conn,$query);
if($res){
if($table =='overallstudent')
{
$tablename='student_'.$line[2];
$query=sprintf("CREATE TABLE $tablename (staffid varchar(15),courseid varchar(15),coursename varchar(50),u1 varchar(15),u2 varchar(15),u3 varchar(15),u4 varchar(15),u5 varchar(15),roleid varchar(10),status varchar(20),PRIMARY KEY(courseid) )");
}
else
{ 
$tablename='faculty_'.$line[2];
$query=sprintf("CREATE TABLE $tablename (studentid varchar(15),studentname varchar(30),courseid varchar(15),coursename varchar(50),u1 varchar(15),u2 varchar(15),u3 varchar(15),u4 varchar(15),u5 varchar(15),status varchar(20),PRIMARY KEY(courseid) ) ");

}
$result1=mysqli_query($conn,$query);
if($result1)
$message.= "user registered successfully";
else
{
$message.= "user not registered try again";
$str.=" $line[2] -> user not registered try again ";
}
}
//}

if(!empty($str)) 
	echo "<script>alert('$str')</script>";
echo "<script>alert('$message');// location.href='AddUser.php';</script>";
//close opened csv file
}
if(!empty($str)) 
    echo "<script>alert('$str')</script>";
echo "<script>alert('$message'); //location.href='AddUser.php';</script>";
} fclose($csvFile);
 $message= 'success';	
 echo "<script>alert('$message'); //location.href='AddUser.php';</script>";
 }else
{
$message = 'invalid file';
echo "<script>alert('$message'); //location.href='AddUser.php';</script>";
}
}
?>