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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
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

	
	<div class="container">
		<center>
			<img src="../dist/img/logo.png" /><br>
			<br>
			<p>Education is all about creating an environment of academic freedom, where bright minds meet, discover and learn. One would experience top of the world living and learning experience at SRM.</p>
			</center>
			<div class="row">
  <div class="card small red lighten-4 col m4 s12">

    <div class="card-content ">
      <span class="card-title activator grey-text text-darken-4">Faculties<i class="material-icons right">more_vert</i></span>
      <br><h5>  <?php 
			$fac = sprintf("SELECT COUNT(DISTINCT staffid) FROM overallfaculty");
			// Perform Query
			$result =mysqli_query($conn,$fac);
			$rows = mysqli_fetch_array($result);
			echo "Total Count ".$rows[0];
			 ?></h5>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
      <p><?php
			  $stu= sprintf("SELECT  staffid,firstname FROM overallfaculty");
// Perform Query
//echo $fac;
$res =mysqli_query($conn,$stu);

echo "<table class='highlight responsive-table'><thead><tr><th>Staff ID</th><th>Faculty Name</th></tr></thead><tbody>";
while($row = mysqli_fetch_array($res)){
echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
}
echo "</tbody></table>";

?></p>
    </div>
  </div>
  
  <div class="card small yellow lighten-4 col m4 s12 ">

    <div class="card-content ">
      <span class="card-title activator grey-text text-darken-4">Courses<i class="material-icons right">more_vert</i></span>
                 <br><h5><?php
			  $course= sprintf("SELECT COUNT(DISTINCT courseid) FROM course");
// Perform Query
//echo $fac;
$r =mysqli_query($conn,$course);
$q = mysqli_fetch_array($r);
echo "Total Count ".$q[0];

?>
</h5>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
      <p><?php
			  $stu= sprintf("SELECT  courseid,coursename FROM course");
// Perform Query
//echo $fac;
$res =mysqli_query($conn,$stu);

echo "<table class='highlight responsive-table'><thead><tr><th>Student ID</th><th>Student Name</th></tr></thead><tbody>";
while($row = mysqli_fetch_array($res)){
echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
}
echo "</tbody></table>";

?></p>
    </div>
  </div>
  <div class="card small green lighten-4 col m4 s12 ">

    <div class="card-content ">
      <span class="card-title activator grey-text text-darken-4">Students<i class="material-icons right">more_vert</i></span>
                   <br><h5><?php
			  $stu= sprintf("SELECT COUNT(DISTINCT studentid) FROM overallstudent");
// Perform Query
//echo $fac;
$res =mysqli_query($conn,$stu);
$row = mysqli_fetch_array($res);
echo "Total Count ".$row[0];

?></h5>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Students<i class="material-icons right">close</i></span>
      <p><?php
			  $stu= sprintf("SELECT  studentid,firstname FROM overallstudent");
// Perform Query
//echo $fac;
$res =mysqli_query($conn,$stu);

echo "<table class='highlight responsive-table'><thead><tr><th>Student ID</th><th>Student Name</th></tr></thead><tbody>";
while($row = mysqli_fetch_array($res)){
echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";}
echo "</tbody></table>";

?></p>
    </div>
  </div>
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