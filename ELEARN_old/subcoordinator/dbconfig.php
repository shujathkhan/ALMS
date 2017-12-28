<?php

//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","it");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
?>