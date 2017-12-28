<?php
session_start();
require_once 'dbconfig.php';
if(isset($_POST['qid'])){
$table=$_SESSION['quiztable'];
$qid = $_POST['qid'];
$rowCount = count($_POST["qid"]);
for($i=0;$i<$rowCount;$i++) {
$sql=sprintf("DELETE from $table where questionrefid='$qid[$i]'");
$result=mysqli_query($conn,$sql);
}
if($result)
echo 'Delete Success!!!';
else
echo 'Delete Unsuccessfull!!!';	
}
?>