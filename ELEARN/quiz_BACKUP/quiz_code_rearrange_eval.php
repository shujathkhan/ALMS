<?php
session_start();
require_once 'dbconfig.php';

    $query = sprintf("SELECT answers FROM quiz_table_it1001 where quiztype='cmcq'");
    $result = mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
	if($_REQUEST["age"] ){
	$arr=$_REQUEST['age'];
	print_r($arr);
	echo $row[0];
	$arr=implode(",",$arr);
	$score=0;
	if($arr==$row[0]){
		$score++;
		echo "score=".$score;
		}
	else
		echo "score=0";
		

}
}

?>