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
	<div class="container col s4">

		<div class="card col s4">
			<div class="card-image waves-effect waves-block waves-light col s4">
			  <img class="activator" src="../dist/img/courses.jpeg">
			</div>
			<div class="card-content col s4">
			  <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
			  <p><a href="#">This is a link</a></p>
			</div>
			<div class="card-reveal">
			  <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
			  <p>Here is some more information about this product that is only revealed once clicked on.</p>
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