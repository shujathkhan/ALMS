<?php
session_start();

if (isset($_POST['submit'])) {
	$courseid= $_SESSION["courseid"]; 
    require_once('dbconfig.php');
    //connect to db
	$select=$_SESSION['u'];
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


$cmd=sprintf("INSERT INTO unit (courseid,unitid,unitname,description,reference) VALUES ('$courseid','$unitid','$unitname','$description','$refer') ON DUPLICATE KEY UPDATE courseid='$courseid',unitid='$unitid',unitname='$unitname',description='$description',reference='$refer' " );
$res=mysqli_query($conn,$cmd);
if(!$res){

$message="error in updating unit table";
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}
$message=" Updated unit table";

echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}	
?>