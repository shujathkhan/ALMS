<?php                                                         //courseupload to work on newest
session_start();
if (isset($_POST['SubmitButton'])) {
$department= $_POST['department'];  // $_SESSION['department'];
$coursename= $_POST['cname'];
$courseid= $_POST['courseID'];
static $o=99;
function getstaticvalue($o) {
$o++;
return $o;
}
function laststaticvalue($o) {
$o--;
return $o;
}
$subject = getstaticvalue($o);

$u1= $_POST['unit_1'];
$u2= $_POST['unit_2'];
$u3= $_POST['unit_3'];
$u4= $_POST['unit_4'];
$u5= $_POST['unit_5'];
//$id= '' ;// $_SESSION['id'];     //coordinator id after login

$u = array($u1,$u2,$u3,$u4,$u5);
define("DB_HOST","localhost");
define("DB_NAME","$department");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
$tablename='master_course_'.$courseid;
if(mysqli_num_rows(mysqli_query($conn,"SHOW TABLES LIKE '".$tablename."'"))==1)
{
for($j=0;$j<=4;$j++){
for($i=1;$i<=$u[$j];$i++)
{
$v=$j+1;
$cus = $subject.'_u'.$v.'_s'.$i;
$sql = sprintf("INSERT INTO $tablename (sid ) VALUES ('$cus')");  // sid in mastercourse
$res = mysqli_query($conn,$sql);
if(!$res)
{
$message="error updating sessions to master course..";
echo "<script>alert('$message'); location.href='courseupload.php';</script>";
}
}
}
}else{
$message="course master course doesnt exist..";
echo "<script>alert('$message'); location.href='courseupload.php';</script>";
}
$message="SESSION UPDATED INTO MASTER COURSE TABLE  ";
echo "<script>alert('$message'); location.href='courseupload.php';</script>";
}
?>
