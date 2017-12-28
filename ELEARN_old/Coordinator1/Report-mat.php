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
  <script>
  $(function() {
    $( "#name" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	    <script>
      $(function () {
        $('#idForm').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'coordreport.php',
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
	<?php include('menucood.php'); ?>
	<br>
	<br>
	
	<div class="container">
		
  <form method="POST" id="idForm">
  <div class="container">

  <center>
	  <div>
	  <div class="row">
	  
		    <div class="input-field inline">
		    
				<select id="select" class="col s6" name="select" readonly>
				
				<option selected value="<?php $_SESSION['department'] ?>"><?php if($_SESSION['department'] == 'it'){echo "Information Technology";} ?></option>

				</select>
					<select id="select1" class="col s6" name="role"  required="" aria-required="true">				
					<option disabled selected>Select Course </option>
						<option><?php 
							$department=$_SESSION['department'];
							$id= $_SESSION['id'];
							$table='';
							$courseid='';
							//echo $id;
							$sql=sprintf("SELECT CONCAT( GROUP_CONCAT(table_name) , '' ) FROM information_schema.tables WHERE table_schema = '$department' AND 
								table_name LIKE 'coordinator___".$id."'" ,mysqli_real_escape_string($conn,$id) );   //only coordinator_0_id exist in table nothing of other type!
								$result= mysqli_query($conn,$sql);
								if($result){
								while($row=mysqli_fetch_row($result)){
								 $table=$row[0];
								 //echo $table;
								}
							}
							$sql=sprintf("SELECT DISTINCT courseid FROM $table LIMIT 1 ");
							$res=mysqli_query($conn,$sql);
							if($res){
							while($row=mysqli_fetch_row($res))
							$courseid=$row[0];
							}
							echo $courseid;
							 ?>
								   </option>
				</select> 
			</div>
			
			</div>
	
		<div class="row">
	
			   <div class="input-field inline">
					
		<div class="col s4">
		<select class="form-control" name="search" onchange="historyChanged(this);"  id="faculty">
		<option disabled selected>Select Faculty </option>
			<?php
			$select='';
			$sql=sprintf("SELECT firstname,staffid FROM overallfaculty WHERE staffid IN (SELECT DISTINCT staffid FROM $table)");
			$res=mysqli_query($conn,$sql);
			if($res){
				while($row=mysqli_fetch_row($res)){
				$select.='<option id="selectfaculty" value="'.$row[1].'">'.$row[0].'-'.$row[1].'</option>';	
				}
			}
			else{
				echo '<script>alert("No faculty found")</script>';
			}
			echo $select;
			?>
					</select>
					
			</div>
			</div>
	
	
		<center>		
			<button class="waves-effect waves-light btn green" name="submit">Submit</button>
		</center>
		
		</div>
	</center>
	</div>
	</form>

	 <div id="txtHint">
	 <table class="highlight striped responsive-table">
	 <thead>
<th>Course ID</th>
<th>Course Name</th>
<th>U1</th>
<th>U2</th>
<th>U3</th>
<th>U4</th>
<th>U5</th>
</thead>
</div>
<script>
	 function historyChanged() {
    var historySelectList = $('select#faculty');
    var selectedValue = $('option:selected', historySelectList).val();

    
    if (selectedValue == 'selectfaculty') {
        historySelectList.form.submit();
    }
	else{
	document.getElementById("uploadinsert").innerHTML = '<div class="form-group"><label class="control-label col-sm-4"  for="optradio">Report Type:</label><div class="col-sm-6 radiogroup" onchange="checker()"><label class="radio-inline col-sm-4" ><input type="radio" id="Individualradio" value="0" name="optradio0"  >Individual Student</label><label class="radio-inline col-sm-4"><input type="radio" id="Overallradio" value="1" name="optradio1" >Overall Students</label></div></div>';

	}
	}

</script>

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