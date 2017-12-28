<?php
    if(!isset($_REQUEST['id'])) {
        echo "ID Required";
        exit;
    }

    //Change Following Data Here
    define('DB_NAME','it');
    define('DB_HOST', 'localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');

    $TABLE_NAME = "FLAGS";

    $link = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD);
    if(!$link)
          die("Cound Not Connected to MySQL: ".mysqli_error($link));
    $data_base = mysqli_select_db($link,DB_NAME);
    if(!$data_base) 
          die("Cound Not Connect to Data Base: ".mysqli_error($link));

    $subject_id = $_REQUEST['id'];

    $sql = "REPLACE INTO $TABLE_NAME (`ID`, `STATUS`) VALUES ('$subject_id',1)";

    $db0 = mysqli_query($link,$sql);
    if(!$db0) 
            die("Failed to Insert: ".mysqli_error($link));

    echo "Success"
?>