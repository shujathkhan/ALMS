<?php
session_start();
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$department = $_SESSION['courseactiondepartment'];
$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$department);
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}
    $idArr = $_POST['checkbox'];
	
    foreach($idArr as $id){
		$query = sprintf("DELETE FROM course WHERE courseid='$id'");
		$res = mysqli_query($conn,$query);
		//drop master course
		$table='master_course_'.$id;
		$sql=sprintf("DROP TABLE $table");
		$res1 = mysqli_query($conn,$sql);
		//drop quiz table
		$table='quiz_table_'.$id;
		$sql1=sprintf("DROP TABLE $table");
		$res2 = mysqli_query($conn,$sql1);
		
		//to delete all tables related to the course
		
		$sql="SELECT CONCAT( GROUP_CONCAT(table_name) , ',' ) AS statement FROM information_schema.tables 
		    WHERE table_schema = '$department' AND table_name LIKE '%".$id."%' ";
		$run=mysqli_fetch_row(mysqli_query($conn,$sql));
		$carray=explode(',',$run[0]);
		for($i=0;$i<sizeof($carray);$i++){
			$del=mysqli_query($conn,sprintf("DELETE TABLE".$carray[$i]));
		}
		}
	echo 'course deletion successful';
  
	
?>