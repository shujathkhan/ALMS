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
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {
        $('#idForm').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 

          $.ajax({
            type: 'POST',
            url: 'manage.php',
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
        $('#savndel').on('submit', function (event) {

event.preventDefault();// using this page stop being refreshing 
		var tc = $(this).find("input[type=submit]:focus").val();
		if(tc == 'Delete'){
          $.ajax({
            type: 'POST',
            url: 'deleteuser.php',
            data: $('#savndel').serialize(),
            success: function (data) {
              alert(data);
            }
		});
		}
		else if(tc == 'Save'){
          $.ajax({
            type: 'POST',
            url: 'save.php',
            data: $('#savndel').serialize(),
            success: function (data) {
              alert(data);
            }
		});
		}

        });
      });
    </script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-LEARN | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
  <script type="text/javascript" src="../dist/js/table_script2.js"></script>
<script type="text/javascript" src="../dist/js/ex.js"></script>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Latest compiled and  minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2m CWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="../dist/js/jquery-1.3.2.min.js" type="text/javascript"></script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="../dist/img/srm_logo.png" style="width:90%" class="img-circle" alt="SRM Logo"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E</b>LEARN</span>
			
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

	<!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">

	  <ul class="nav navbar-nav">

          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">       
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Welcome <?php echo $_SESSION['username']; ?></span>
            </a>  
          </li>
          
          <li class="dropdown user user-menu">
			  <a href="logout.php" ><i>Sign out</i></a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span> Dashboard</span>
            </a>
        </li>
        <li class="active treeview">
        <li class="active treeview">
		
          <a href="AddUser.php">
            <i class="fa fa-user-plus"></i>
            <span> User Creation</span></li>
         
            
          </a>
         
        </li>
       
              <li class="treeview">
          <a href="#">  
            <i class="fa fa-tasks"></i>
          <span> My Courses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="MyCourse.php"><i class="fa fa-tasks"></i> Courses</a></li>
            <li><a href="courseupload.php"><i class="fa fa-upload"></i> Content Upload</a></li>
       
           </ul>
        </li>
        <li class="treeview">
          <a href="Report.php">
            <i class="fa fa-laptop"></i>
            <span> Report</span>
            
          </a>
         </li>
        <li class="treeview">
          <a href="Notification.php">
            <i class="fa fa-exclamation-circle"></i> 
			<span> Notification</span>
            
          </a>
    
        </li>
        <li class="treeview">
          <a href="ChangePwd.php">
            <i class="fa fa-edit"></i>
            <span> Change Password</span>
            
          </a>
         </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <ol class="breadcrumb">
        <li><a href="AddUser.php"><i class="fa fa-dashboard"></i> User Creation</a></li>
        <li class="active">Add User</li>
      </ol>
    </section>
	<!-- Main content -->
	<br><br>
	   <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><p style="color:darkgreen;">'.$statusMsg.'</div>';
    } ?>
<ul class="nav nav-tabs ">
    <li class="active"><a data-toggle="tab" href="#home">Add User</a></li>
    <li><a data-toggle="tab" href="#menu1">Add Bulk User</a></li>
	<li><a data-toggle="tab" href="#menu2">Manage User</a></li>
	
    
  </ul>
    
	  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <section class="content">
			<script text="javascript">
		function validateForm() {
			var x = document.forms["AddUser"]["select"].value;
			if (x == "Select Department") {
				alert("Please Select your Department ");
				return false;
			}
			var y = document.forms["AddUser"]["select1"].value;
			if (y == "Select Role") {
				alert("Please select your Role");
				return false;
			}
			
		}
		</script>
		<form class="form-horizontal"  method="POST" action="adduserform.php" onsubmit="return validateForm()">
		
			<div class="form-group">
		<label class="control-label col-sm-4" for="select">Department:</label>
		<div class="col-sm-4">
		<select class="form-control" id="select" name="select" readonly>
		
		<option value="<?php $_SESSION['department'] ?>"><?php if($_SESSION['department'] == 'it'){echo "Information Technology";} ?></option>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-sm-4" for="select1">Role:</label>
		<div class="col-sm-4">
		<select class="form-control" id="select1" name="select1">
		<option>Select Role</option>
	
			<option value="subcoordinator">Sub-Coordinator</option>
			<option value="faculty">Faculty</option>
		<option value="student">Student</option>
		</select>
		</div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="fname">First Name:</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
		  </div>
		</div>
		<div class="form-group">
		  <label class="control-label col-sm-4" for="lname">Last Name:</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required>
		  </div>
		</div>
		<div class="form-group">
		  <label class="control-label col-sm-4" for="sID">Staff ID:</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" id="sID" name="sID" placeholder="Enter Staff ID" required>
		  </div>
		</div>
		<div class="form-group">
		  <label class="control-label col-sm-4" for="email">Email ID:</label>
		  <div class="col-sm-4">
			<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ID" required>
		  </div>
		</div>

		<div class="form-group">
		  <label class="control-label col-sm-4" for="uname">Username:</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username" required>
		  </div>
		</div>
		<div class="form-group"> 
		  <label class="control-label col-sm-4" for="pwd">Password:</label>
		  <div class="col-sm-4">
			<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" required>
		  </div>
		</div>
	
	
		<div class="form-group"> 
		  <div class="col-sm-offset-2 col-sm-10"/>
		</div>
		<br>
		<div class="form-group">
		  <div class="col-sm-offset-5 col-sm-8">
				<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary" >
		  </div>
		</div>
	  </form>
    </section>
	</div>
	  <div id="menu1" class="tab-pane fade">
	   <section>
				<script text="javascript">
		function validateForm() {
			var x = document.forms["AddBulkUser"]["select"].value;
			if (x == "Select Role") {
				alert("Please Select Role ");
				return false;
			}					
		}
		</script>
		 

		<br>
		<form class="form-horizontal" action="addbulkuser.php" method="post" enctype="multipart/form-data" id="importFrm" name="AddBulkUser" onsubmit="return validateForm()">
		<div class="form-group">
		<label class="control-label col-sm-4" for="department">Role:</label>
		<div class="col-sm-4">
		<select class="form-control" id="role" name="role" required>
		<option>Select Role</option>
		<option value="faculty">Faculty</option>
		<option value="student">Student</option>
		</select>
		</div>
		</div>


		<div class="form-group">
		  <label class="control-label col-sm-4" for="groupname">Group Name:</label>
		  <div class="col-sm-4">
				<input type="text" class="form-control" id="groupname" name="groupname" placeholder="Enter Group Name" required>
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="file">Upload:</label>
		   <div class="col-sm-4">
				<input type="file" class="btn btn-default" id="file" name="file" required>
		   </div>
		</div>
		
		<div class="form-group"> 
		  <div class="col-sm-offset-4 col-sm-10"/>
		</div>
			<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip(); 
			});
			</script>
		<div class="form-group">
		  <div class="col-sm-offset-5 col-sm-10">
				<input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="book1.csv" data-toggle="tooltip" title="Care, for a Sample CSV ?" download><i class="fa fa-question-circle" ></i></a>
		  </div>
		</div>
	
	  </form>

    </section>
    <!-- /.content -->
  </div>
<div id="menu2" class="tab-pane fade">
  <section class="content">
	<script text="javascript">
	function validateForm() {
			var x = document.forms["ManageUser"]["select"].value;
			if (x == "Select Department") {
				alert("Please Select your Department ");
				return false;
			}
			var y = document.forms["ManageUser"]["select1"].value;
			if (y == "Select Role") {
				alert("Please select your Role");
				return false;
			}
			
		}
		</script>	    
  	<br>
	<form class="form-horizontal" id="idForm">
	
		<div class="form-group">
	
	<label class="control-label col-sm-2" for="select">Department:</label>
	<div class="col-sm-4">
	<select class="form-control validate" id="department" name="department" readonly>
			<option>Select Department</option>
			<option value="<?php $_SESSION['department'] ?>"><?php if($_SESSION['department'] == 'it'){echo "Information Technology";} ?></option>
			</select>
		</div>	
	
	</div>
		<div class="form-group">
		<label class="control-label col-sm-2" for="select">Role:</label>
		<div class="col-sm-4">
		<select class="form-control" name="users">
		<option>Select Role</option>

		<option value="faculty">Faculty</option>
		<option value="student">Student</option>
		</select>
		</div>
		</div>
		<center>
		        <input name="submit" class="btn btn-info"  type="submit" value="Submit">
				

		</center>
<br>
<br>

    </form>
	
<br>
<form id="savndel" >
<div id="txtHint"></div>
</form>
		<th></th>	    
       
	 

    </section>
  </div>
  <!-- /.content-wrapper -->
 </div>

 <!--ADD THAT CONTROL SIDEBAR STUFF OVER HERE-->
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>



<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

</body>
</html>
