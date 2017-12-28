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
	<?php include('menucood.php'); ?>
	<br>
	<br>
	
	<div class="container">
	<div class="container">
		
	<form method="POST" action="coursecurriculum.php">
	<h3>Course Curriculum</h3>
			<div class="row">
			    <div class="input-field col s6">	  
					  <input id="icon_prefix1" name="sourseid" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix1">Course ID</label>
				</div>
			</div>
	      <div class="row">
			<div class="input-field col s12">
			  <textarea id="textarea1" name="Crationale" class="materialize-textarea"></textarea>
			  <label for="textarea1">Course Rationale</label>
			</div>
		  </div>
		  <div class="row">
			<div class="input-field col s12">
			  <textarea id="textarea2" name="cID2" class="materialize-textarea"></textarea>
			  <label for="textarea2">Course Outcome</label>
			</div>
		  </div>
		  
		<center>		
			<button type="submit" name="submit" class="waves-effect waves-light btn green" >Submit</button>
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
	