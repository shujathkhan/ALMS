
<?php
session_start();
$dept = $_POST['department'];
$_SESSION['courseactiondepartment']=$dept;	
//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","$dept");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("DB not found!!");
echo '
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><div class="container">
<script type="text/javascript">
$("#checkAll").on("change", function() {
    $("div input").prop("checked", this.checked);
});
</script>
 <table id="dataTable" class="highlight responsive-table">
   <thead>
	<tr>
<th><input type="checkbox" name="checkbox[]"  id="checkAll"><label for="checkAll"></label></th>	    
        <th>Department</th>
		<th>Course ID</th>
        <th>Course name</th>
        <th>Course Type</th>
		<th><input type="submit" name="delete" onclick="deleteRow("dataTable")" value="Delete"  class="waves-effect waves-light btn red" ></th>
		<th><input type="submit" onclick="enrollRow("dataTable")" value="Enroll" name="enroll"  class="waves-effect waves-light btn lime green accent-4" ></th>
      </tr></thead>';
	
$select='';
//$check="SELECT courseid from overallfaculty where role='coordinator'";
$check="SELECT table_name FROM information_schema.tables WHERE table_schema='public'";

$result =mysqli_query($conn,$check);

$query = sprintf("SELECT courseid,coursename,coursetype,department FROM course WHERE courseid NOT IN ($check)");
$result =mysqli_query($conn,$query); 
if($result){
//$select.='<table  class="table table-hover">';
while($row=mysqli_fetch_array($result)){
$select.='<form><tbody><tr id="row1">';
$select.='<td><input type="checkbox" class="checkItem" onclick="selectRow(this)"  name="checkbox[]" value="'.$row[0].'" id="'.$row[0].'"><label for="'.$row[0].'"></label></td>';
$select.='<td id="name_row1" class="input-field"><input type="hidden" value="'.$row[3].'" name="dept[]">'.$row[3].'</td><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td>';
$select.='<td class="input-field"><select class="browser-default" name="id[]">';
$query = sprintf("SELECT firstname,lastname,staffid FROM overallfaculty where role='faculty'");
$result1 =mysqli_query($conn,$query); 

while($rows=mysqli_fetch_array($result1)){
$select.='<option value="'.$rows[2].'">'.$rows[2].'-'.$rows[0].' '.$rows[1].'</option>';
}
$select.='</select></td>';

$select.='</tr>';
}
$select.='</tbody></form></table></div>';

echo $select;

}else{
echo 'try again';

}
?>
