<?php
session_start();
require_once 'dbconfig.php';
$dept=$_SESSION['department'];
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,$dept) or die(mysqli_connect_error());
$id=$_SESSION['id'];
$table='';
$sql=sprintf("SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$dept' AND 
	table_name LIKE 'coordinator___".$id."'" ,mysqli_real_escape_string($conn,$id) );   //only coordinator_0_id exist in table nothing of other type!
	$result= mysqli_query($conn,$sql);
	if($result){
	while($row=mysqli_fetch_row($result)){
	 $table=$row[0];
	}
}

$query = $db->query("SELECT staffid FROM $table WHERE status='1' ");
while ($row = $query->fetch_assoc()) {
    $data[] = $row[0];
}
//return json data
echo json_encode($data);
?>