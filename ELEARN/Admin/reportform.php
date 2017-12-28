<?php
session_start();
$dept=$_SESSION['rep_dept']; //need 1 
$course=$_SESSION['rep_course']; //need 2
$role=$_SESSION['rep_role']; //need 3
$search=$_POST['search']; //need 4
echo "<script>console.log($role)</script>";
define("DB_HOST","localhost");
define("DB_NAME","$dept");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
$coursetable="master_course_".$course;
$sql=sprintf("SELECT DISTINCT staffid FROM $coursetable LIMIT 1");
$res=mysqli_query($conn,$sql);
$coordinatorid="";
$row=mysqli_fetch_row($res);
$coordinatorid.=$row[0];

$cotable='';
$courseid=$course;
$sql=sprintf("SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$dept' AND 
	table_name LIKE 'coordinator___".$coordinatorid."'" ,mysqli_real_escape_string($conn,$coordinatorid) );   //only coordinator_0_id exist in table nothing of other type!
	$result= mysqli_query($conn,$sql);
	if($result){
	while($row=mysqli_fetch_row($result)){
	 $cotable=$row[0];
	}
}
$stafflist=sprintf("select staffid from $cotable WHERE status='1' ");
//echo $courselist;
$result123=mysqli_query($conn,$stafflist);
if($result123){
while($row=mysqli_fetch_row($result123)){
$facid=$row[0];
//echo $facid."\n";
$table="faculty_".$courseid."_".$row[0];
//echo $table;
$value=[];
$result1=[];
$result2=[];
for($i=1;$i<=5;$i++){
  $query="SELECT COUNT(*) FROM $table WHERE sid LIKE '%U$i%' AND status='1' ";
  //echo $query;
  $res=mysqli_query($conn,$query);
  if($res){
  $result1=mysqli_fetch_row($res);
  //print_r($result1);
  }
  else
  {$result1[0]=0;}  
  $querytot="SELECT COUNT(*) FROM $table WHERE sid LIKE '%U$i%' ";
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
//update coordinator table
$query=sprintf("UPDATE $cotable SET u1='$value[1]',u2='$value[2]',u3='$value[3]',u4='$value[4]',u5='$value[5]' WHERE staffid='$facid' ");
//echo $query;
$result=mysqli_query($conn,$query);

}
}
//coordinator table updated
//----------
//update individual faculty and student table
$faclist=mysqli_query($conn,$stafflist);
while($rows=mysqli_fetch_row($faclist)){
	$individualfac=$rows[0];
	$factable='faculty_'.$individualfac;
	$sql2=sprintf("SELECT studentid FROM $factable");
	$resstu=mysqli_query($conn,$sql2);
	if($resstu){
		while($row=mysqli_fetch_row($resstu)){
			$studentid=$row[0];
			$studenttable="student_".$studentid;
			$table="student_".$course."_".$studentid;
			$value=[];
			$result1=[];
			$result2=[];
			for($i=1;$i<=5;$i++){
			$query="SELECT COUNT(*) FROM $table WHERE sid LIKE '%U$i%' AND status='2' ";
			//echo $query;
			$res=mysqli_query($conn,$query);
			if($res){
			$result1=mysqli_fetch_row($res);
			//print_r($result1);
			}
			else
			{$result1[0]=0;}  
			$querytot="SELECT COUNT(*) FROM $table WHERE sid LIKE '%U$i%' ";
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
$facquery=sprintf("UPDATE $factable SET u1='$value[1]',u2='$value[2]',u3='$value[3]',u4='$value[4]',u5='$value[5]' WHERE courseid='$course' AND studentid='$studentid' ");
$result21=mysqli_query($conn,$facquery);

		}
	}
}
//updating all student and faculty tables under the course OVER
//-------[updating all tables of the course DONE]-------

//displaying if role==coordinator
if($role=="coordinator"){
// display the updated coordinator table
echo '<table class="table table-hover table-responsive">
<th>Staff ID</th>
<th>Course ID</th>
<th>Course Name</th>
<th>U1</th>
<th>U2</th>
<th>U3</th>
<th>U4</th>
<th>U5</th>';
$onefac=sprintf("select staffid,courseid,coursename,u1,u2,u3,u4,u5 from $cotable ");
$result=mysqli_query($conn,$onefac);
if($result)
{
while($row=mysqli_fetch_row($result)){
echo '
<tr>
		<td>'.$row[0].'</td>
		<td>'.$row[1].'</td>
		<td>'.$row[2].'</td>
		<td>'.$row[3].'%</td>
		<td>'.$row[4].'%</td>
		<td>'.$row[5].'%</td>
		<td>'.$row[6].'%</td>
		<td>'.$row[7].'%</td>
		</tr>';	
}
}
echo '</table>';
}
//----
//displaying if role==faculty
if($role=="faculty"){
	    $search=$_POST['search'];
		$factable="faculty_".$search;
		$studentlist=sprintf("select studentid,studentname,courseid,coursename,u1,u2,u3,u4,u5 from $factable");	
		$result=mysqli_query($conn,$studentlist);
		if($result)
{
	echo '<table class="table table-hover table-responsive">
<th>Student ID</th>
<th>Student Name</th>
<th>Course ID</th>
<th>Course Name</th>
<th>U1</th>
<th>U2</th>
<th>U3</th>
<th>U4</th>
<th>U5</th>';
while($row=mysqli_fetch_row($result)){
echo '
<tr>
		<td>'.$row[0].'</td>
		<td>'.$row[1].'</td>
		<td>'.$row[2].'</td>
		<td>'.$row[3].'</td>
		<td>'.$row[4].'%</td>
		<td>'.$row[5].'%</td>
		<td>'.$row[6].'%</td>
		<td>'.$row[7].'%</td>
		<td>'.$row[8].'%</td>
		</tr>';	
}
echo '</table>';
}
}
//-----
//displaying if role==student
if($role=="student"){
	$search=$_POST['search'];
	$studenttable="student_".$search;
	$coursedetails=sprintf("select studentid,courseid,coursename,u1,u2,u3,u4,u5 from $factable");
	$result=mysqli_query($conn,$coursedetails);
	
	if($result)
{
	echo '<table class="table table-hover table-responsive">
<th>Student ID</th>
<th>Course ID</th>
<th>Course Name</th>
<th>U1</th>
<th>U2</th>
<th>U3</th>
<th>U4</th>
<th>U5</th>';
while($row=mysqli_fetch_row($result)){
echo '
<tr>
		<td>'.$row[0].'</td>
		<td>'.$row[1].'</td>
		<td>'.$row[2].'</td>
		<td>'.$row[3].'%</td>
		<td>'.$row[4].'%</td>
		<td>'.$row[5].'%</td>
		<td>'.$row[6].'%</td>
		<td>'.$row[7].'%</td>
		</tr>';	
}
echo '</table>';
}
}
?>