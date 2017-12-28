<?php
session_start(); 
require_once('dbconfig.php');
$department=$_SESSION['department'];
$id=$_SESSION['id'];
$staffid=$_POST['staffid'];
//**********************
$table='';
$courseid='';
$sql=sprintf("SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$department' AND 
	table_name LIKE 'coordinator___".$id."'" ,mysqli_real_escape_string($conn,$id) );   //only coordinator_0_id exist in table nothing of other type!
	$result= mysqli_query($conn,$sql);
	if($result){
	while($row=mysqli_fetch_row($result)){
	 $table=$row[0];
	}
}
$sql=sprintf("SELECT DISTINCT courseid FROM $table LIMIT 1 ");
$res=mysqli_query($conn,$sql);
if($res && mysqli_affected_rows($conn)){
while($row=mysqli_fetch_row($res))
{
$courseid=$row[0];
}
}else{
$message='no course under coordinator';
echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}
$courserefid='';
$sql=sprintf("SELECT courserefid FROM course WHERE courseid='$courseid' ");
$res=mysqli_query($conn,$sql);
if($res && mysqli_affected_rows($conn) ){
while($row=mysqli_fetch_row($res))
{
$courserefid=$row[0];
}
}
//**********************
$sql=sprintf("SELECT DISTINCT staffid FROM $table ");
$res=mysqli_query($conn,$query);
if($res && mysqli_affected_rows($conn)){
	while($row=mysqli_fetch_row($res)){
		$factable='faculty_'.$row[0];

		//update student details in faculty and student table
		$query=sprintf("SELECT studentid FROM $factable WHERE courseid='$courseid' ");
		$result=mysqli_query($conn,$query);
		if($result && mysqli_affected_rows($conn)){
			while($r=mysqli_fetch_row($result)){
				$studentid=$r[0];
				$stable='student_'.$courseid.'_'.$r[0];
				$studenttable='student_'.$r[0];
				if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$stable."'"))==1){
					$sidu1=$courserefid.'U1';
					$sidcountu1=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT AVG(status) FROM $stable WHERE status='1' OR status='0' AND sid LIKE '$sidu1%' ")));
					$sidu2=$courserefid.'U2';
					$sidcountu2=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT AVG(status) FROM $stable WHERE status='1' OR status='0' AND sid LIKE '$sidu2%' ")));
					$sidu3=$courserefid.'U3';
					$sidcountu3=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT AVG(status) FROM $stable WHERE status='1' OR status='0' AND sid LIKE '$sidu3%' ")));
					$sidu4=$courserefid.'U4';
					$sidcountu4=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT AVG(status) FROM $stable WHERE status='1' OR status='0' AND sid LIKE '$sidu4%' ")));
					$sidu5=$courserefid.'U5';
					$sidcountu5=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT AVG(status) FROM $stable WHERE status='1' OR status='0' AND sid LIKE '$sidu5%' ")));
					$do1=mysqli_query($conn,sprintf("UPDATE $studenttable SET u1='$sidcountu1[0]',u2='$sidcountu2[0]',u3='$sidcountu3[0]',u4='$sidcountu4[0]',u5='$sidcountu5[0]' WHERE courseid='$courseid' "));
					$do2=mysqli_query($conn,sprintf("UPDATE $factable SET u1='$sidcountu1[0]',u2='$sidcountu2[0]',u3='$sidcountu3[0]',u4='$sidcountu4[0]',u5='$sidcountu5[0]' WHERE courseid='$courseid' AND studentid= '$studentid' "));
				}
			}
		}
		//update fac circle in coordinator table
		$faccoursetable='faculty_'.$courseid.'_'.$row[0];
		if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$faccoursetable."'"))==1){
					$sidu1=$courserefid.'U1';
					$sidcountu1=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT COUNT(status) FROM $faccoursetable WHERE status='1' AND sid LIKE '$sidu1%' ")));
					$sidu2=$courserefid.'U2';
					$sidcountu2=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT COUNT(status) FROM $faccoursetable WHERE status='1' AND sid LIKE '$sidu2%' ")));
					$sidu3=$courserefid.'U3';
					$sidcountu3=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT COUNT(status) FROM $faccoursetable WHERE status='1' AND sid LIKE '$sidu3%' ")));
					$sidu4=$courserefid.'U4';
					$sidcountu4=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT COUNT(status) FROM $faccoursetable WHERE status='1' AND sid LIKE '$sidu4%' ")));
					$sidu5=$courserefid.'U5';
					$sidcountu5=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT COUNT(status) FROM $faccoursetable WHERE status='1' AND sid LIKE '$sidu5%' ")));
					$do1=mysqli_query($conn,sprintf("UPDATE $table SET u1='$sidcountu1[0]',u2='$sidcountu2[0]',u3='$sidcountu3[0]',u4='$sidcountu4[0]',u5='$sidcountu5[0]' WHERE staffid='$row[0]' "));	
				}
	}
}
	
}
?>