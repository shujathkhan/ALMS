<?php
session_start();
require_once 'dbconfig.php';
$dept=$_POST['department'];
$id= $_SESSION['id'];
$role=$_SESSION['role'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];

$sql=sprintf("UPDATE overallfaculty SET firstname='$firstname',lastname='lastname',emailid='$emailid',contactno='$contactno' WHERE staffid='$id' ");
$res=mysqli_query($conn,$sql);
?>