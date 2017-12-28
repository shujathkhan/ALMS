<?php
session_start();
$courseid= $_POST["courseid"];  
$department= $_POST["department"];

define("DB_HOST","localhost");
define("DB_NAME",$department);
define("DB_USERNAME","root");
define("DB_PASSWORD","PASSWORD");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
//connect to db

if (isset($_POST['submit'])) {
	$select=$_POST['select'];
    $unitname=$_POST['unitname'];
	$description=$_POST['Crationale'];
	$refer=$_POST['refer'];

$sql = sprintf("SELECT courserefid FROM course WHERE courseid='$courseid' ");
$result = mysqli_query($conn,$sql);
if($result){
while($row=mysqli_fetch_row($result)){
$courserefid = $row[0];
}
}
$unitid=$courserefid.'U'.$select;

//check if unitid exist
$query = sprintf("SELECT unitid FROM unit WHERE unitid='$unitid' AND courseid='$courseid' ");
$result =mysqli_query($conn,$query);
$numrows=mysqli_num_rows($result);
if($numrows>1){
$message="unitid exist for course";
echo "<script>alert('$message'); location.href='Unit.php';</script>";
}else 
{
$cmd=sprintf("INSERT INTO unit (courseid,unitid,unitname,description,reference) VALUES ('$courseid','$unitid','$unitname','$description','$refer')" );
$res=mysqli_query($conn,$cmd);
if(!$res){
$message="error in updating unit table";
echo "<script>alert('$message'); location.href='Unit.php';</script>";
}
}
$message=" Updated unit table";
echo "<script>alert('$message'); location.href='Unit.php';</script>";
}	
?>