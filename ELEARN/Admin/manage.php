
<?php

$q = $_POST['users'];
$dept = $_POST['department'];
	
//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","$dept");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("DB not found!!");
echo '
<table cellspacing=2 cellpadding=5  id="dataTable" class="table table-hover">
	<thead>
<th></th>	    
        <th>Department</th>
        <th>First name</th>
        <th>Last name</th>
		<th>Role</th>
		<th>Staff ID</th>
		<th>Email ID</th>
		<th>Contact No</th>
		<th>Username</th>
		<th>Password</th>
		<th><input type="submit" id="savndel" name="save"  value="Save"  class="btn btn-success" ></th>
		<th><input type="submit" id="savndel" name="delete" value="Delete"  class="btn btn-danger" ></th>
      </thead>';
	
$role=$q;// $_POST['role'];
if($role=='Students'||$role=='student'||$role=='Student'){
$table='overallstudent';

$id='studentid';
}else{
$table='overallfaculty';
$id='staffid';
}
$check="SELECT table_name FROM information_schema.tables WHERE table_schema='public'";
$select="";
$result =mysqli_query($conn,$check);
$query1 = sprintf("SELECT firstname, staffid FROM overallfaculty");
$result1 =mysqli_query($conn,$query1); 
$query=sprintf("SELECT * FROM $table WHERE role = '".$q."'");
$result = mysqli_query($conn,$query);
if($result){

$count=0;
while($row=mysqli_fetch_array($result)){
$count+=1;
$select.='<tr id="row'.$count.'" display="none">';
$select.='<td><input type="checkbox" onclick="selectRow(this)"  name="checkbox[]" id="checkbox[]" value='.$row[2].' ><label for="checkbox"></label></td>';
$select.='<td id="name_row1"><input type="text" class="form-control" name="dept[]" value="'.$dept.'" readonly></td>
<td id="country_row1"><input type="text" class="form-control" name="fname[]" value="'.$row[0].'"></td>
<td id="age_row1"><input type="text" class="form-control" name="lname[]" value="'.$row[1].'"></td>
<td id="sage_row1"><input type="text" class="form-control" name="role[]" value="'.$row[7].'" readonly></td>
<td id="sname_row1"><input type="text" class="form-control" name="id[]" value="'.$row[2].'" readonly></td>
<td id="ename_row1"><input type="text" class="form-control" name="mail[]" value="'.$row[3].'"></td>
<td id="cname_row1"><input type="text" class="form-control" name="num[]" value="'.$row[4].'"></td>
<td id="uname_row1"><input type="text" class="form-control" name="uname[]" value="'.$row[5].'"></td>
<td id="pname_row1"><input type="password" class="form-control" name="pass[]" value="'.$row[6].'"></td>
</tr>
';

}

echo $select;
echo '</table>';

}else{
echo 'try again';
}
?>
