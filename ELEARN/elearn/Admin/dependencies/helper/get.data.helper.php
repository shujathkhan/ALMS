<?php
    if(!isset($_REQUEST['id'])) {
        echo "ID Required";
        exit;
    }

    //Change Following Data Here
    define('DB_NAME','it');
    define('DB_HOST', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','PASSWORD');

    $TABLE_NAME = "FLAGS";

    $link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
    if(!$link)
          die("Cound Not Connected to MySQL: ".mysqli_error($link));
    $data_base = mysqli_select_db($link,DB_NAME);
    if(!$data_base) 
          die("Cound Not Connect to Data Base: ".mysqli_error($link));

    $course_id = $_REQUEST['id'];

    $sql = "SELECT * FROM $TABLE_NAME WHERE `ID` LIKE '$course_id'";

    $db = mysqli_query($link,$sql);
    if(!$db) 
            die("Failed to Insert: ".mysqli_error($link));

    $final_result = [];

    $row = null;
    if(mysqli_num_rows($db) > 0 ){
        while ($row = mysqli_fetch_assoc($db)) {
            $id = $row['ID'];
            $status = $row['STATUS'];
            $final_result["$id"] = $status;
        }
     }

    echo json_encode($final_result);
?>