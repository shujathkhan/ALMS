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
		
  <form method="POST" action="courseuploadform.php">
  <div class="container">

  <center>
	  <div>
	  <div class="row">
	  
		    <div class="input-field inline">
		    
				<select id="select" class="col s6" name="select" readonly>
				
				<option selected value="<?php $_SESSION['department'] ?>"><?php if($_SESSION['department'] == 'it'){echo "Information Technology";} ?></option>

				</select>
				  <?php
						$department =$_SESSION['department'];
						$table='';
						$id= $_SESSION['id'];
						
						//**********************
				$sql=sprintf("SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$department' AND 
					table_name LIKE 'coordinator___".$id."'" ,mysqli_real_escape_string($conn,$id) );
					
					$demo='';
					$result= mysqli_query($conn,$sql);
					if($result){
					while($row=mysqli_fetch_row($result)){
					 $table=$row[0];
					 }
				}

				//**********************
				$sql=sprintf("SELECT courseid FROM $table ");

				$res=mysqli_query($conn,$sql);
				if($res){
				$row=mysqli_fetch_row($res);

					  ?>
					<select id="select1" class="col s6" name="coureid"  required="" aria-required="true">				
					<option disabled selected>Select Course ID</option>
					<option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
				</select> 
					<?php

}else{
$message='no course under faculty';
echo "<script>alert('$message'); location.href='courseupload.php';</script>";
exit;
};
	?>
			</div>
			
			</div>
	
		<div class="row">
	
			   <div class="input-field col s4 inline">
		   
					<select id="select1" disabled required="" aria-required="true">				
					<option disabled selected>Select Unit</option>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option selected>5</option>
				</select> 
			
			</div>
			
	
		
			   <div class="input-field col s4 inline">
					
					  <input id="unit_1" name="u1" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix2">Unit 1</label>
				</div>
	 <div class="input-field col s4 inline">
					
					  <input id="unit_2" name="u2" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix2">Unit 2</label>
				</div>
				</div>
		<div class="row">		
			   <div class="input-field col s4 inline">
					
					  <input id="unit_3" name="u3" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix2">Unit 3</label>
				</div>
		
			   <div class="input-field col s4 inline">
					
					  <input id="unit_4" name="u4" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix2">Unit 4</label>
				</div>
		
			   <div class="input-field col s4 inline">
					
					  <input id="unit_5" name="u5" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix2">Unit 5</label>
				</div>
		</div>
		
		
		<center>		
			<button class="waves-effect waves-light btn green" onclick="Materialize.toast('Submitted!', 3000, 'rounded') ;" type="submit" name="submit">Submit</button>
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

	
	</body>
  </html>