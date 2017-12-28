<?php
if (isset($_POST['submit']))
{
$department = $_POST['select'];
$username = $_POST['uname'];
$userid = $_POST['sID'];
$role = $_POST['role'];        //$_SESSION['role']; ( for other roles)
$currentpassword = $_POST['pwd'];
$newpassword= $_POST['Npwd'];
$retype= $_POST['Rpwd'];

// connect to db	
define("DB_HOST","localhost");
define("DB_NAME","$department");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());

if($role=='Students' || $role=='student' ||$role=='students' ||$role=='Student')
{
	$table='overallstudent';
	$id='studentid';
}else{
	$table='overallfaculty';
	$id='staffid';
}
//check if current password is correct
$query = sprintf("SELECT password FROM $table WHERE password = '$currentpassword' AND $id= '$userid' " );
$res=mysqli_query($conn,$query);
if($res){
if($newpassword==$retype)
	{	 
		 $sql = sprintf("SELECT firstname FROM $table WHERE $id= '$userid' " );
		 $result = mysqli_query($conn,$sql);
         $numrows=mysqli_num_rows($result);
		 if ($numrows>=1)
                  {
					  $enter = sprintf("UPDATE $table SET password = '$newpassword' WHERE $id='$userid' ");
					  $result1=mysqli_query($conn,$enter);
                          if ($result1) 
						  {
						   $message = "Record updated successfully";
						   echo "<script>alert('$message'); location.href='ChangePwd.php';</script>";
                          }
                         else 
                        {
						 $message = "Error password not updated try again";
						 echo "<script>alert('$message'); location.href='ChangePwd.php';</script>";
                        }   
                  }
         else{
	          $message = "user doesnt exist register first";
              echo "<script>alert('$message'); location.href='ChangePwd.php';</script>";
	         }
}
else{
$message = "the entered passwords dont match try again";
echo "<script>alert('$message'); location.href='ChangePwd.php';</script>";
}
}
}
?>