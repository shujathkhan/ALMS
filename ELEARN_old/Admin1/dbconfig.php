<?php
$dept= $_SESSION['department'];
//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","$dept");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
if($_SESSION['role'] != 'admin' ){
$message='you are not admin ! ERROR';
echo "<script>alert('$message'); location.href='logout.php';</script>";
}
?>