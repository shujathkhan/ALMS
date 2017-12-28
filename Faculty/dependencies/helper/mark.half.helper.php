<?php
session_start();
    if(!isset($_REQUEST['id'])) {
        echo "ID Required";
        exit;
    }
$department=$_SESSION['department'];
    //Change Following Data Here
    define('DB_NAME',"$department");
    define('DB_HOST', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
	
	$courseid=$_SESSION['courseid'];
	$id=$_SESSION['id'];
	
	$TABLE_NAME = 'faculty_'.$courseid.'_'.$id;

    $link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
    if(!$link)
          die("Cound Not Connected to MySQL: ".mysqli_error($link));
    $data_base = mysqli_select_db($link,DB_NAME);
    if(!$data_base) 
          die("Cound Not Connect to Data Base: ".mysqli_error($link));

    $sid = $_REQUEST['id'];
	
	$_SESSION['sid'] = $sid;
	$sql0="INSERT INTO $TABLE_NAME (sid) VALUES ('$sid') ON DUPLICATE KEY UPDATE sid='$sid'";
	$db0=mysqli_query($link,$sql0);
    $sql = "UPDATE $TABLE_NAME SET `STATUS`= '0' WHERE `SID` = '$sid'";

    $db = mysqli_query($link,$sql);
    if(!$db) 
            die("Failed to Insert: ".mysqli_error($link));

    echo "Success"
?>