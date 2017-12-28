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
	<?php include('menustud.php'); ?>
	<br>
	<br>
	
	<div class="container">
	<div class="container">
		<form method="POST" action="unitform.php">
			
			<div class="col s4" style="font-size:20px">Unit:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_GET['u'];?></div>
			
			
			
			<div class="row" style="font-size:15px">  
		Unit Name: &nbsp;&nbsp;&nbsp;&nbsp;            <?php
	   $unitno=$_GET['u'];
	   $courserefid=$_GET['sub'];
	   $courseid=$_SESSION['courseid'];
	   $unitid=$courserefid.'U'.$unitno;
	   $unitname=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT unitname FROM unit WHERE unitid='$unitid' AND courseid='$courseid' ")));
	   echo $unitname[0];
	   ?>
				</div>
			</div>
		  <div class="row">
			<div class="col s4" style="font-size:20px">Description:&nbsp;&nbsp;&nbsp;&nbsp;
			  
			  
			  	<?php
	$unitdecp=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT description FROM unit WHERE unitid='$unitid' AND courseid='$courseid' ")));
	echo $unitdecp[0];
	?>
			</div>
		  </div>
		  <div class="row">
		<div class="col s4" style="font-size:20px">
			 References:&nbsp;&nbsp;&nbsp;&nbsp;<?php
 $unitref=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT reference FROM unit WHERE unitid='$unitid' AND courseid='$courseid' ")));
	echo $unitref[0];
 ?>
			</div>
		  </div>
		  
		<center>		
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Submit</button>
		</center>
		  
		</form>
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