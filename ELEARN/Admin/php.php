<?php

$time="";
$date="";
if(isset($_POST['time'])){
	$time=$_POST['time'];
	}
if(isset($_POST['date'])){
	$date=$_POST['date'];
}

echo $time,$date;
?>