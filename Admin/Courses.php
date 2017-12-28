<?php
session_start();
require_once 'dbconfig.php';

?>

<!DOCTYPE html>
<html>
    <head>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {
        $('#idForm').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'display_courses.php',
            data: $('#idForm').serialize(),
            success: function (data) {
			  document.getElementById("txtHint").innerHTML = data;
            }
          });

        });
      });
    </script>
	    <script>
      $(function () {
        $('#idForm').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'display_courses.php',
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
		
		<form id="idForm">
  <div class="container">
			  <div class="row">
	  
		 <div class="input-field col s6" style="margin-left:25%;margin-right:25%;">
		    
				<select id="select" name="department" onchange="showUser(this.value)">
				
				<option selected disabled>Select Department</option>
				<option value="it">Information Technology</option>
				<option value="cse">Computer Science Engineering</option>
				<option value="software">Software Engineering</option>
				
				
				</select>
				
	</div>
	</div>
		<center>		
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Submit</button>
		</center>




	</div>
	
</form>
<div id="txtHint">
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