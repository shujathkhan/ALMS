<?php
session_start();
require_once 'dbconfig.php';

?>

<!DOCTYPE html>
<html>
    <head>
	
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css'>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script> 
	  <script>
         $(document).ready(function() {
         $('select').material_select();
      });
      </script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	  </head>
 
    <body>
	<?php include('menudept.php'); ?>
	<br>
	<br>
	
	<div class="container">
		
  	<?php
$dept = $_SESSION['department'];
	
echo '
<table id="dataTable" class="highlight responsive-table">
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


		
  <div class="container">


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