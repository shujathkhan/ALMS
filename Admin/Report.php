<?php
session_start();
require_once 'dbconfig.php';

?>

<!DOCTYPE html>
<html>
    <head>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

	<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css'>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
  
	  <script>
         $(document).ready(function() {
         $('select').material_select();
      });
      </script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	  </head>
 
    <body>
	<?php include('menudept.php');	?>
	<br>
	<br>
	
	<div class="container">
		
  <form id="report">
  <div class="container">
 <div class="row">
		    <div class="input-field inline ">
				<select id="select" class="col s6"  name="dept" readonly>
				
				<option value="it">Information Technology</option>
				<option value="cse">Computer Science Engineering</option>
				<option value="software">Software Engineering</option>
				</select>
				
				<select  id="select" class="col s6" required="" aria-required="true" name="course">
				<option>Select Course</option>
				<?php $sql=sprintf('SELECT courseid,coursename FROM course');
				$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_row($result)){
				echo '<option value="'.$row[0].'">'.$row[0].'-'.$row[1].'</option>';
				}
				?>
			</select></div></div>
			 <div class="row">
		    <div class="input-field inline">
				<select id="select1" class="col s6" name="role"  required="" aria-required="true">				
					<option disabled selected>Select Role</option>
					<option value="coordinator">Coordinator</option>
					<option value="faculty">Faculty</option>
					<option value="student">Student</option>
				</select> 
					
			
				
	<script>
	
	function faculty(){
		document.getElementbyId("search").innerHTML='<div class="col s1 inpput-field"><input type="search" name="search" placeholder="Search" /></div>';
    }
		
			
	
	function student(){
    
    	document.getElementbyId("facultified")='<div class="input-field col s1"><select  id="select" name="selectfaculty"><option></option></select></div>';
    }
	
	</script>
				
  </div>
		<center>		
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Submit</button>
		</center>
		
	
	
	</div>

	</form>
<form id="result">
<div  id="people">
</div>
</form>
<form id="pdf">
<div id="rep">

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
		  
<script>
      $(function () {
        $('#report').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'role_gen.php',
            data: $('#report').serialize(),
            success: function (data) {
              
			  document.getElementById("people").innerHTML = data;
            }
          });

        });
      });
    </script>	
	<script>
      $(function () {
        $('#result').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'reportform.php',
            data: $('#result').serialize(),
            success: function (data) {
       	  document.getElementById("rep").innerHTML = data;
            }
          });

        });
      });
    </script>	
	<script>
      $(function () {
        $('#pdf').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'pdf_gen.php',
          success: function (data) {
       	  window.open('report.pdf','_blank');
            }
          });

        });
      });
    </script>	
	
	<script>
		  $(document).ready(function() {
    // Select - Single
    $('select:not([multiple])').material_select();
});
	</script>
	</body>
  </html>