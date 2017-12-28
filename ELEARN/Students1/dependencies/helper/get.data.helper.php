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
	$TABLE_NAME = 'student_'.$courseid.'_'.$id;
	//$TABLE_NAME = "master_course_it1001";

    $link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
    if(!$link)
          die("Cound Not Connected to MySQL: ".mysqli_error($link));
    $data_base = mysqli_select_db($link,DB_NAME);
    if(!$data_base) 
          die("Cound Not Connect to Data Base: ".mysqli_error($link));

    $course_id = $_REQUEST['id'];

    $sql = "SELECT * FROM $TABLE_NAME WHERE `sid` LIKE '$course_id'";

    $db = mysqli_query($link,$sql);
    if(!$db) 
            die("Failed to Insert: ".mysqli_error($link));

    $final_result = [];

    $row = null;
    if(mysqli_num_rows($db) > 0 ){
        while ($row = mysqli_fetch_assoc($db)) {
            $id = $row['sid'];
            $status = $row['status'];
            $final_result["$id"] = $status;
        }
     }

    echo json_encode($final_result);
?>