<?php
session_start();
require_once 'dbconfig.php';

?>

<!DOCTYPE html>
<html>
    <head>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {
        $('#idForm').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'facreport.php',
            data: $('#idForm').serialize(),
            success: function (data) {
              document.getElementById("txtHint").innerHTML = data;
            }
          });

        });
      });
    </script>	
	
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css'>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
  
	  <script>
         $(document).ready(function() {
         $('select').material_select();
      });
      </script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	  </head>
 
    <body>
	<?php include('menustud.php');	?>
	<br>
	<br>
	
	<div class="container">

  <div class="container">
 <script>
  $('#selectee').attr('disabled',false);
</script>
	   <table class="highlight responsive-table">
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Course name</th>
        <th>Unit-1</th>
        <th>Unit-2</th>
        <th>Unit-3</th>
        <th>Unit-4</th>
        <th>Unit-5</th>
        <th>Quiz</th>
      </tr>
    </thead>
    <tbody>
<?php
$dept=$_SESSION["department"];
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,$dept) or die(mysqli_connect_error());
$id=$_SESSION["id"];
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
  //echo $query;
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
$query=sprintf("UPDATE $studenttable SET u1='$value[1]',u2='$value[2]',u3='$value[3]',u4='$value[4]',u5='$value[5]' WHERE courseid='$course'");
$result=mysqli_query($conn,$query);
}
}
//displaying now
$courselist=sprintf("select courseid,coursename,u1,u2,u3,u4,u5 from $studenttable");
$result=mysqli_query($conn,$courselist);
if($result)
{
while($row=mysqli_fetch_row($result)){
echo '<tr>
		<td>'.$row[0].'</td>
		<td>'.$row[1].'</td>
		<td>'.$row[2].'%</td>
		<td>'.$row[3].'%</td>
		<td>'.$row[4].'%</td>
		<td>'.$row[5].'%</td>
		<td>'.$row[6].'%</td>
		<td>'.$row[6].'%</td>
		</tr>';	
}
}
?>
    </tbody>
  </table>
	
	</div>

	</div>
		  
      <!--Import jQuery before materialize.js-->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js'></script>
        
		  <script>   
				$('.button-collapse').sideNav({
					  menuWidth: 240, // Default is 240
					  edge: 'left', // Choose the horizontal origin
					  closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
						 draggable: true
					}
				  );
				// Show sideNav
				//$('.button-collapse').sideNav('show');
		  $(document).ready(function() {
    $('select').material_select();

    // for HTML5 "required" attribute
    $("select[required]").css({
      display: "inline",
      height: 0,
      padding: 0,
      width: 0
    });
  });
		  </script> 

	</body>
  </html>