<?php
session_start();
//if(isset($_POST['submit'])) {                                //faculty storing quiz to sid
//require_once 'dbconfig.php';
$count=0;
//$sid=$_POST['sid'];    // or $_SESSION['sid']         need to check this alone
//$questionrefid = $_POST['questionrefid'];
$checkanswer='hello how are you';//$_POST['answer'];
//$courserefid=substr($sid,0,3);
//$courseid=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT courseid FROM course WHERE courserefid='$courserefid'")));
$keywords='hello,howdy,how,hey';
$answer='lolo';
//$tablename='quiz_table_'.$courseid;
//$result=mysqli_query($conn,sprintf("SELECT * FROM $tablename WHERE questionrefid='$questionrefid' "));
/*if($result){
while($row=mysqli_fetch_row($result)) {
$keywords=$row[4];       // some random row value
$answer=$row[5];        // some random row value
}
*/
$keyword=explode(",",$keywords); //array of the keywords
//evaluation of checkanswer and answer
for($i=0;$i<sizeof($keyword);$i++){
if (strpos($checkanswer, $keywords[$i]) != false) {
    $count++;
}
}
if($count>=(sizeof($keyword)/2))
	echo "pass";
else
	echo "fail";
//}else 
	//echo "quizrefid not found";
//}
?>