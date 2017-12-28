<?php
session_start();
require_once 'dbconfig.php';
$dept=$_SESSION["department"];
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,$dept) or die(mysqli_connect_error());
$id=$_POST['search']; //studentid
$facid=$_SESSION['id'];
$factable='faculty_'.$facid;
$studenttable="student_".$id;
$courselist=sprintf("select courseid from $studenttable");
//echo $courselist;
$result123=mysqli_query($conn,$courselist);
if($result123){
while($row=mysqli_fetch_row($result123)){
$table="student_".$row[0]."_".$id;
//echo $table;
$course=$row[0];
$value=[];
$result1=[];
$result2=[];
for($i=1;$i<=5;$i++){
  $query="SELECT COUNT(*) FROM $table WHERE sid LIKE '%U$i%' AND status='1' ";
//  echo $query;
  $res=mysqli_query($conn,$query);
  if($res){
  $result1=mysqli_fetch_row($res);
  //print_r($result1);
  }
  else
  {$result1[0]=0;}  

   $querytot="SELECT u$i FROM course WHERE courseid = '$course' ";
$res2=mysqli_query($conn,$querytot);
  if($res2)
  {$result2=mysqli_fetch_row($res2);
  // print_r($result2);
  }
  else
  {$result2[0]=0;}	  
  if($result2[0]!=0)
  {$value[$i]=($result1[0]/$result2[0])*100;}
  else
  {$value[$i]=0;} 
}
//update student table
$query=sprintf("UPDATE $studenttable SET u1='$value[1]',u2='$value[2]',u3='$value[3]',u4='$value[4]',u5='$value[5]' WHERE courseid='$course'");
$result=mysqli_query($conn,$query);
//update faculty table
$facquery=sprintf("UPDATE $factable SET u1='$value[1]',u2='$value[2]',u3='$value[3]',u4='$value[4]',u5='$value[5]' WHERE courseid='$course' AND studentid='$id' ");
$result21=mysqli_query($conn,$facquery);
}
}
//displaying now
$studentlist=sprintf("select courseid,coursename,u1,u2,u3,u4,u5 from $factable WHERE studentid='$id'");
$result=mysqli_query($conn,$studentlist);
if($result)
{
	echo '<table class="highlight responsive-table">
	<thead>
<th>Course ID</th>
<th>Course Name</th>
<th>U1</th>
<th>U2</th>
<th>U3</th>
<th>U4</th>
<th>U5</th>
</thead><tbody>';
while($row=mysqli_fetch_row($result)){
echo '
<tr>
		<td>'.$row[0].'</td>
		<td>'.$row[1].'</td>
		<td>'.$row[2].'%</td>
		<td>'.$row[3].'%</td>
		<td>'.$row[4].'%</td>
		<td>'.$row[5].'%</td>
		<td>'.$row[6].'%</td>
		</tr>';	
}
echo '</tbody></table>';
}
?>