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
		
  <form method="POST" action="profileform.php">
  <div class="container">

			<div class="row">
	
		<div class="input-field">
			<b>Department :</b>&nbsp;&nbsp;&nbsp;		<?php if($_SESSION['department']=='it')
						echo 'Information Technology';
					else if($_SESSION['department']=='cse')
						echo 'Computer Science Engineering';
					else 
						echo 'Software Engineering';
				?>
		
		</div>
		</div>

		<div class="row">
		  
		  <div class="input-field inline">
				<b>Role	 :</b> &nbsp;&nbsp;&nbsp;<?php echo $_SESSION['role']?>
			</div>
			
			
		</div>
		<?php
		$staffid=$_SESSION['id'];
		$query="select firstname,lastname,username,staffid,contactno,emailid from overallfaculty where staffid='$staffid'";

		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_row($result);
		?>
<div class="row">
		  
		  <div class="input-field">
			<input type="text" value="<?php echo $row[0]?>" id="fname" name="fname">
		  <label class="active" for="fname">First Name</label>	
		  </div>
		</div>
		
		
		<div class="row">
		  
		  <div class="input-field">
			<input type="text" value="<?php echo $row[1]?>" id="lname" name="lname">
		  <label class="active" for="lname">Last Name</label>	
		  </div>
		</div>
		
		<div class="row">
		  
		  <div class="input-field">
			<input type="text" value="<?php echo $row[2]?>" id="uname" name="uname">
		  <label class="active" for="uname">Username</label>	
		  </div>
		</div>
		
		
		<div class="row">
		
		  <div class="input-field">
			<input type="text" value="<?php echo $row[3]?>" id="sID" name="sID">
			<label class="active" for="sID">Staff ID</label>	
	</div>
		
		</div>

		
		<div class="row">
		  
		  <div class="input-field inline">
			<input type="text" class="validate" id="no" name="contactno" value="<?php echo $row[4]?>">
			 <label for="no" data-error="wrong" data-success="right">Contact No</label>
		  </div>
		  
		</div>
  		
		<div class="row">
		  
		  <div class="input-field inline">
			<input type="email" class="validate" id="email" name="email" value="<?php echo $row[5]?>">
			 <label for="email" data-error="wrong" data-success="right">Email</label>
		  </div>
		  
		</div>
  		<center>		
			<button type="submit" name="submit" class="waves-effect waves-light btn green" >Submit</button>
		</center>
		<br>
		<br>
		<br>
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
   $(document).ready(function() {
    Materialize.updateTextFields();
  }); $(document).ready(function() {
    Materialize.updateTextFields();
  });
    $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
		  </script> 

	
	</body>
  </html>