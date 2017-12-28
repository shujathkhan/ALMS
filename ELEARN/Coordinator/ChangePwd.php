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
	<?php include('menucood.php'); ?>
	<br>
	<br>
	
	<div class="container">
		
  <form method="POST" action="changepasswordform.php">
  <div class="container">

  <center>
	  <div>
	  <div class="row">
	  
		    <div class="input-field inline">
		    
				<select id="select" class="col s6" name="select" readonly>
				
				<option selected value="<?php $_SESSION['department'] ?>"><?php if($_SESSION['department'] == 'it'){echo "Information Technology";} ?></option>

				</select>
					<select id="select1" class="col s6" name="role"  required="" aria-required="true">				
					<option disabled selected>Select Role</option>
					<option value="faculty">Faculty</option>
					<option value="student">Student</option>
				</select> 
			</div>
			
			</div>
	
		<div class="row">
	
			   <div class="input-field inline">
					  
					  <input id="icon_prefix1" name="sID" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix1">Staff ID</label>
	
			</div>
			</div>
	
		<div class="row">
			   <div class="input-field inline">
					
					  <input id="icon_prefix2" name="uname" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix2">Username</label>
				</div>
		</div>
		<div class="row">
			   <div class="input-field inline">
					
					  <input id="icon_prefix3" name="pwd" type="password" class="validate">
					  <label for="icon_prefix3">Current Password</label>
				</div>
		</div>
			<div class="row">
			   <div class="input-field inline">
					
					  <input id="icon_prefix4" name="Npwd" type="password" class="validate">
					  <label for="icon_prefix4">New Password</label>
				</div>
		</div>
			<div class="row">
			   <div class="input-field inline">
					
					  <input id="icon_prefix5" name="Rpwd" type="password" class="validate">
					  <label for="icon_prefix5">Retype Password</label>
				</div>
		</div>
		
		<center>		
			<button class="waves-effect waves-light btn green" onclick="Materialize.toast('I am a toast!', 3000, 'rounded') ;" type="submit" name="submit">Submit</button>
		</center>
		
		</div>
	</center>
	</div>
	</form>

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
		  			<script text="javascript">
		function validateForm() {
			var x = document.forms["ChangePwd"]["select"].value;
			if (x == "Select Role") {
				alert("Please Select your Department ");
				return false;
			}
			var y = document.forms["ChangePwd"]["Npwd"].value;
			var z = document.forms["ChangePwd"]["Rpwd"].value;
			if (y != z) { 
				alert("Your password and confirmation password do not match.");
				Rpwd.focus();
				return false; 
			}
			var w = document.forms["ChangePwd"]["pwd"].value;
			if (w == y) { 
				alert("Your password and confirmation password do not match.");
				Rpwd.focus();
				return false; 
			}
			
			
			
		}
		</script>
	
	</body>
  </html>