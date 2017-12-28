<?php
session_start();
$role1 = $_POST['role'];
$idArr = $_POST['checkbox'];
$dbName= $_SESSION['department'];
$role=$role1[0];

$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if(!$conn)
{
    die("Database connection failed: " . mysqli_connect_error());
}

 $table='';
 if($role=='student' || $role=='Student' || $role=='students'){
	 $table='overallstudent';
	 $id='studentid';
 }else{
	 $table='overallfaculty';
	 $id='staffid';
 }
 foreach($idArr as $delid){ 
     $delid=str_replace('/','',$delid);
     $query = sprintf("DELETE FROM $table WHERE $id='".$delid."'");
	 $res = mysqli_query($conn,$query);
	 $sql="SELECT CONCAT( GROUP_CONCAT(table_name) , ',' ) AS statement FROM information_schema.tables 
	       WHERE table_schema = '$dbName' AND table_name LIKE '%".$delid."%' ";
	 $run=mysqli_query($conn,$sql);
	 if($run){
		while($row=mysqli_fetch_row($run))
		{
		$delstr= substr($row[0], 0, -1);
		$result = mysqli_query($conn,sprintf("DROP TABLE ".$delstr));
		if($result)
		{
			$message="users deleted";
			echo $message;
		}else{
			$message="User deletion failed";
			echo $message;
			}
		}
		}else{
			$message="User tables dont exist deletion completed";
			echo $message;
			}
 }	

		
?>