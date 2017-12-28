<?php
session_start();
require_once 'dbconfig.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success fade in';
            $statusMsg = 'User data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger fade in';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger fade in';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
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
            url: 'manage_course.php',
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
        $('#enrollndel').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 
		var tc = $(this).find("input[type=submit]:focus").val();
	
		if(tc == 'Delete'){
          $.ajax({
            type: 'POST',
            url: 'course_action.php',
            data: $('#enrollndel').serialize(),
            success: function (data) {
              alert(data);
            }
		});
		}
		else if(tc == 'Enroll'){
          $.ajax({
            type: 'POST',
            url: 'enrollcourse.php',
            data: $('#enrollndel').serialize(),
            success: function (data) {
              alert(data);
            }
		});
		}

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
		
  <ul id="tabs-swipe-demo" class="tabs">
    <li class="tab col s3"><a class="active" href="#test-swipe-1">ADD Course</a></li>
    <li class="tab col s3"><a  href="#test-swipe-2">BULK Courses</a></li>
    <li class="tab col s3"><a href="#test-swipe-3">MANAGE Courses</a></li>
  </ul>
  <div id="test-swipe-1" class="col s12">
  <form method="POST" action="addcourseform.php">
  <div class="container">
  <center>
	
		<div class="row">
	
			   <div class="input-field inline">
					  
					  <input id="icon_prefix1" name="courseame" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix1">Course Name</label>
	
			</div>
			</div>
	
		<div class="row">
			   <div class="input-field inline">
					 
					  <input id="icon_prefix" name="courseid" type="text" class="validate" required="" aria-required="true">
					  <label for="icon_prefix">Course ID</label>
				</div>
		</div>
		<div class="row">
			   <div class="input-field inline">
				<select id="select" class="col s6" name="department"  readonly>
				
				<option selected disabled>Select Department</option>
				<option value="it">Information Technology</option>
				<option value="cse">Computer Science Engineering</option>
				<option value="software">Software Engineering</option>
				
				
				</select>
				</div>
		</div>
		<div class="row">
		<label>Course Type:&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input class="with-gap" name="optradio" type="radio" id="test3"  />
			<label for="test3">Departmental Course</label>
			<input class="with-gap" name="optradio" type="radio" id="test4"  />
			<label for="test4">Offeriing Course</label>
		</div>
		
		<center>		
			<button class="waves-effect waves-light btn green" type="submit" name="submit">Submit</button>
		</center>
		
		</div>
	</center>
	</div>
	</form>
  </div>
  <div id="test-swipe-2" class="col s12">
	<form method="POST" action="bulkcourseform.php" enctype="multipart/form-data">
		<div class="container">
			  <div class="row">
	  
		 <div class="input-field inline">
		    
				<select id="select" class="col s6" name="department"  readonly>
				
				<option selected disabled>Select Department</option>
				<option value="it">Information Technology</option>
				<option value="cse">Computer Science Engineering</option>
				<option value="software">Software Engineering</option>
				
				
				</select>
		
				
				
				<input class="col s6" type="text" id="gname" name="groupname" placeholder="Enter Group Name" required="" aria-required="true">
				
			</div>
			</div>
			
		    <div class="file-field input-field">
			  <div class="btn">
				<span>File</span>
				<input type="file" name="file">
			  </div>
			  <div class="file-path-wrapper">
				<input class="file-path validate" type="text">
			  </div>
			</div>
						
				<center>		
					<button class="waves-effect waves-light btn green" type="submit" name="importSubmit">Import</button>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a class="waves-effect waves-light btn btn-floating  pulse blue btn tooltipped" data-position="right" data-delay="50" data-tooltip="Sample CSV file" href="../CSV/members.csv"><i class="material-icons" download>live_help</i></a>
				</center>
				
			</div>
		</div>
	</form>
 </div>
  <div id="test-swipe-3" class="col s12">
  <form action="#" id="idForm">
	  <div class="container">
	  <div class="container">
	  <center>		
			  <div class="row align-center">
	  
		    <div class="input-field inline ">
		    
				<select id="select" class="col s6" name="department"  readonly>
							<option value="it">Information Technology</option>
				<option value="cse">Computer Science Engineering</option>
				<option value="software">Software Engineering</option>
				</select>
			</div>
			
	
					
			<button type="submit" name="submit" class="waves-effect waves-light btn green" >Submit</button>
					</div>
		</center>
	
	  </div>
	  </div>
	  </form>

	  <form id="enrollndel" >

		<div id="txtHint">
	
		</div>
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
$("#checkAll").change(function(){  //"select all" change 
    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
});
		  </script> 
	
	</body>
  </html>