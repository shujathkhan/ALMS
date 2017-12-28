
<?php
$dept = $_POST['department'];
	
//connect to db		
define("DB_HOST","localhost");
define("DB_NAME","$dept");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die("DB not found!!");
echo '
<table class="highlight responsive-table">
	<thead>	    
        <th>Course ID</th>
        <th>Course Refrence ID</th>
        <th>Coursename</th>
		<th>Coursetype</th>
		<th>Department</th>
		<th>Rational</th>
		<th>Outcome</th>
		</thead>';
	
$check="SELECT table_name FROM information_schema.tables WHERE table_schema='public'";
$select="";
$result =mysqli_query($conn,$check);
$query1 = sprintf("SELECT * FROM course");
$result1 =mysqli_query($conn,$query1); 
if($result){

$count=0;
while($row=mysqli_fetch_array($result1)){
$count+=1;
$select.='<tbody><tr id="row'.$count.'" display="none">';
$select.='
<td>'.$row[0].'</td>
<td>'.$row[1].'</td>
<td>'.$row[2].'</td>
<td>'.$row[3].'</td>
<td>'.$row[4].'</td>
<td>'.$row[5].'</td>
<td>'.$row[6].'</td>
</tr>';

}

echo $select;
echo '</tbody></table>';

}else{
echo 'try again';
}
?>
