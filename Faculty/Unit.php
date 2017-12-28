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
	<?php include('menufac.php'); ?>
	<br>
	<br>
	
	<div class="container">
	<div class="container">
		<form method="POST" action="unitform.php">
			
			<div class="col s4" style="font-size:20px">Unit:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_GET['u'];?></div>
			
			
			
			<div class="row" style="font-size:15px">  
		Unit Name: &nbsp;&nbsp;&nbsp;&nbsp;      <?php
	   echo $cid.$u;
	    $query=sprintf('select unitname,description,reference from unit where unitid="'.$cid.'U'.$u.'"');
  $result =mysqli_query($conn,$query);
$row=mysqli_fetch_row($result);
echo $row[0];
	   ?>
				</div>
			</div>
		  <div class="row">
			<div class="input-field col s12">
			  <textarea id="textarea2" name="Crationale" class="materialize-textarea"></textarea>
			  <label for="textarea2">Description</label>
			</div>
		  </div>
		  <div class="row">
			<div class="input-field col s12">
			  <textarea id="textarea2" name="refer" class="materialize-textarea"></textarea>
			  <label for="textarea2">References</label>
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