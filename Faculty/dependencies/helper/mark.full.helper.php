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

    $crefid = $_REQUEST['id'];
	
	$_SESSION['sid'] = $crefid;

    $sql = "UPDATE $TABLE_NAME SET `STATUS`= '1' WHERE `SID` = '$crefid'";

    $db0 = mysqli_query($link,$sql);
    if(!$db0) 
            die("Failed to Insert: ".mysqli_error($link));

    echo "Success"
?>