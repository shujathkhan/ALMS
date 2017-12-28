<?php

session_start();
$dept= $_POST['dept'];
$course= $_POST['course'];
$role=$_POST['role'];
$_SESSION['rep_role']=$role;
$_SESSION['rep_dept']=$dept;
$_SESSION['rep_course']=$course;
//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","$dept");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
if($role=="coordinator"){
	$variable="";
	$table='master_course_'.$course;
	$sql=sprintf("SELECT staffid FROM $table LIMIT 1");
	$res=mysqli_query($conn,$sql);
	$select='<select class="col s6 browser-default"  name="search">';
	if(mysqli_num_rows($res)>0)
	{
	$row=mysqli_fetch_row($res);
	$coordinatorid=$row[0];
	$check=sprintf("SELECT firstname,lastname FROM overallfaculty WHERE staffid='$coordinatorid' ");
	$wer=mysqli_query($conn,$check);
	$ro=mysqli_fetch_row($wer);
	$name=$ro[0].' '. $ro[1];
	$variable=$name.'-'.$coordinatorid;
	$select.='<option value="'.$coordinatorid.'">'.$variable.'</option>';
	}else{
		$coordinatorid="Course doesnt have a Coordinator";
        $variable.="";		
	}
$select.='</select>
<center>
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Submit</button>
			</center>';
echo $select;	
}
if($role=="faculty"){
$table="master_course_".$course;
	$sql=sprintf("SELECT staffid FROM $table LIMIT 1");
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)>0)
	{
	$row=mysqli_fetch_row($res);
	$coordinatorid=$row[0];
	}else{
		$coordinatorid="Course doesnt have a Coordinator";
	}
$cotable='';
$variable="";
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
$result123=mysqli_query($conn,$stafflist);
if(mysqli_num_rows($result123)>0){
$select='<select  id="select" class="col s6 browser-default"  name="search">';
while($row=mysqli_fetch_row($result123)){
	$id=$row[0];
	$check=sprintf("SELECT firstname,lastname FROM overallfaculty WHERE staffid='$id' ");
	$wer=mysqli_query($conn,$check);
	$ro=mysqli_fetch_row($wer);
	$name=$ro[0].' '.$ro[1];
	$variable=$name.'-'.$id;
	$select.='<option value="'.$id.'">'.$variable.'</option>';
}
}
$select.='</select>
<center>
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Submit</button>
			</center>';
echo $select;	




}
if($role=="student"){
$query1 ="SELECT CONCAT( GROUP_CONCAT(table_name) , ',' ) FROM information_schema.tables WHERE table_schema = '$dept' AND table_name LIKE 'student_".$course."_%' ";
$res1 = mysqli_query($conn,$query1);
$rq=mysqli_fetch_row($res1);

$rqa='';
$rqa=substr($rq[0],0,-1);
$stutablelist=explode(",",$rqa);
$studentlist=array();
$select='<select  id="select" class="col s6 browser-default"  name="search">';
for($i=0;$i<sizeof($stutablelist);$i++)
{
$a=str_replace("student_".$course."_",NULL,$stutablelist[$i]);
$check=sprintf("SELECT firstname,lastname FROM overallstudent WHERE studentid='$a' ");
$wss=mysqli_query($conn,$check);
$r=mysqli_fetch_row($wss);
$s=$r[0].' '.$r[1].'-'.$a;
$select.='<option value="'.$a.'">'.$s.'</option>';
}
$select.='</select>
<center>
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Submit</button>
			</center>';
echo $select;
}
/*$select='<select  id="select" class="col s6" required="" aria-required="true" name="search">';
if ($role=='student')
	$query="select studentid,firstname,lastname from overallstudent";
else
	$query="select staffid,firstname,lastname from overallfaculty where role='$role'";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_row($result)){
$select.='<option value="'.$row[0].'">'.$row[0].'-'.$row[1].' '.$row[2].'</option>';
}
$select.='</select>';
echo $select;*/
?>