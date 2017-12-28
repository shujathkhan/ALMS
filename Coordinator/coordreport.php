<?php
session_start();
require_once 'dbconfig.php';
$dept=$_SESSION['department'];
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,$dept) or die(mysqli_connect_error());
$id=$_POST['search']; //faculty id
$coid=$_SESSION['id'];
//*************************
$cotable='';
$courseid='';
$q=sprintf("select role from overallfaculty where staffid='$id'");
$r=mysqli_query($conn,$q);
$rw=mysqli_fetch_row($r);

$sql=sprintf("SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$dept' AND 
	table_name LIKE 'coordinator___".$coid."'" ,mysqli_real_escape_string($conn,$coid) );   //only coordinator_0_id exist in table nothing of other type!
	$result= mysqli_query($conn,$sql);
	if($result){
	while($row=mysqli_fetch_row($result)){
	 $cotable=$row[0];
	}
}
//echo $cotable;
$sql=sprintf("SELECT DISTINCT courseid FROM $cotable LIMIT 1 ");
$res=mysqli_query($conn,$sql);
if($res){
while($row=mysqli_fetch_row($res))
{
$courseid=$row[0];
}
}else{
$message='no course under coordinator';
//echo "<script>alert('$message'); location.href='MyCourse.php';</script>";
}
$courserefid='';
$sql=sprintf("SELECT courserefid FROM course WHERE courseid='$courseid' ");
$res=mysqli_query($conn,$sql);
if($res && mysqli_affected_rows($conn) ){
while($row=mysqli_fetch_row($res))
{
$courserefid=$row[0];
}
}
//$table,$courseid.$courserefid given now
//*************************

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
if($rw[0]=='coordinator'){
$table1='master_course_'.$courseid;  }
else{
	$table1='faculty_'.$courseid.'_'.$id;
	}

for($i=1;$i<=5;$i++){
  $query="SELECT COUNT(*) FROM $table1 WHERE sid LIKE '%U$i%' AND status='1' ";
  $res=mysqli_query($conn,$query);
  if($res){
  $result1=mysqli_fetch_row($res);
  //print_r($result1);
  }
  else
  {$result1[0]=0;}


  $querytot="SELECT u$i FROM course WHERE courseid = '$courseid' ";
  $res2=mysqli_query($conn,$querytot);
  if($res2)
  {$result2=mysqli_fetch_row($res2);
  // print_r($result2);
}
  else
  {$result2[0]=0;}	  
  if($result2[0]!=0)
  {$value[$i]=($result1[0]/$result2[0])*100;
}
  
  else
  {$value[$i]=0;} 
}
//update coordinator table
$one=$value[1];
$two=$value[2];
$three=$value[3];
$four=$value[4];
$five=$value[5];

}
$query=sprintf("UPDATE $cotable SET u1='$one',u2='$two',u3='$three',u4='$four',u5='$five' WHERE staffid='$id' ");

$result=mysqli_query($conn,$query);

}

//displaying now
$faclist=sprintf("select courseid,coursename,u1,u2,u3,u4,u5 from $cotable WHERE staffid='$id'");
$result=mysqli_query($conn,$faclist);
if($result)
{
	$select='<table class="highlight responsive-table">
	</thead>
<th>Course ID</th>
<th>Course Name</th>
<th>Staff ID</th>
<th>U1</th>
<th>U2</th>
<th>U3</th>
<th>U4</th>
<th>U5</th>
</thead><tbody>';
while($row=mysqli_fetch_row($result)){
$select.= '
<tr>
		<td>'.$row[0].'</td>
		<td>'.$row[1].'</td>
		<td>'.$id.'</td>
		<td>'.$row[2].'%</td>
		<td>'.$row[3].'%</td>
		<td>'.$row[4].'%</td>
		<td>'.$row[5].'%</td>
		<td>'.$row[6].'%</td>
		</tr>';	
}
$select.= '</tbody></table>';
echo $select;
echo'<center>		
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Generate PDF</button>
		</center>';
}
$_SESSION['my_html']=$select;
?>