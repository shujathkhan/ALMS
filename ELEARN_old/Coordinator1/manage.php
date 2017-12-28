
<?php
session_start();
$q = $_POST['users'];
$dept = $_SESSION['department'];
//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","$dept");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("DB not found!!");
echo '<table id="dataTable" class="highlight responsive-table">
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
		<th><button type="submit" name="save" class="waves-effect waves-light btn green" >Save</button></th>
		<th><button type="submit" name="delete" class="waves-effect waves-light btn red" >Delete</button></th>
      </thead><tbody>';
	
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
$select.='<td><input type="checkbox" onclick="selectRow(this)"  name="checkbox[]" id="checkbox[]" value='.$row[2].' ></td>';
$select.='<td id="name_row1" class="input-field"><input type="text" name="dept[]" value="'.$dept.'" readonly></td>
<td id="country_row1" class="input-field"><input type="text" name="fname[]" value="'.$row[0].'"></td>
<td id="age_row1" class="input-field"><input type="text" name="lname[]" value="'.$row[1].'"></td>
<td id="sage_row1" class="input-field"><input type="text" name="role[]" value="'.$row[7].'" readonly></td>
<td id="sname_row1" class="input-field"><input type="text" name="id[]" value="'.$row[2].'" readonly></td>
<td id="ename_row1" class="input-field"><input type="text" name="mail[]" value="'.$row[3].'"></td>
<td id="cname_row1" class="input-field"><input type="text" name="num[]" value="'.$row[4].'"></td>
<td id="uname_row1" class="input-field"><input type="text" name="uname[]" value="'.$row[5].'"></td>
<td id="pname_row1" class="input-field"><input type="password" name="pass[]" value="'.$row[6].'"></td>
</tr>
';

}

echo $select;
echo '</tbody></table>';

}else{
echo 'try again';
}
?>
