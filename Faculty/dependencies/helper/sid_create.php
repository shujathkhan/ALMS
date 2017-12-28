<?php
session_start();
$unit=$_POST['u'];
$session=$_POST['s'];
$crefid=$_POST['crefid'];
$_SESSION['sid']=$crefid.'U'.$unit.'S'.$session;
echo $_SESSION['sid'];
?>