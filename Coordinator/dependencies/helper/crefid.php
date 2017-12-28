<?php
session_start();
$dept= $_SESSION['department'];
//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","it");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
$courseid=$_SESSION['courseid'];
$query=sprintf("select courserefid from course where courseid='$courseid'");
$res=mysqli_query($conn,$query);
$row=mysqli_fetch_row($res);
echo $row[0];
?>