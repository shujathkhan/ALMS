<?php 
session_start();
/*if($_SESSION['logged']==false)
    { 
      header("Location: ../log.html");
    }*/
require_once 'dbconfig.php';
?>

<!DOCTYPE html>
<html>
<head>
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
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
               
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         
              <span class="hidden-xs">Welcome <?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
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
        <li>
        <li class="treeview">
          <a href="AddCourse.php">
            <i class="fa fa-edit"></i> <span> Course Creation</span></li>
            
            
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
            <li><a href="Courses.php"><i class="fa fa-tasks"></i> Courses</a></li>
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
		<form class="form-horizontal"  method="POST" action="demoADMINalladduser.php" onsubmit="return validateForm()">
		<div class="form-group">
		<label class="control-label col-sm-4" for="select">Department:</label>
		<div class="col-sm-4">
		<select class="form-control" id="select" name="select">
		<option>Select Department</option>
		<option value="it">Information Technology</option>
		<option value="cse">Computer Science Engineering</option>
		<option value="software">Software Engineering</option>
		</select>
		</div>
		</div>

		<div class="form-group">
		<label class="control-label col-sm-4" for="select1">Role:</label>
		<div class="col-sm-4">
		<select class="form-control" id="select1" name="select1">
		<option>Select Role</option>
	
		<option>Department Admin</option>
		<option>Coordinator</option>
		<option>Sub-Coordinator</option>
		<option>Faculty</option>
		<option>Students</option>
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
		  <label class="control-label col-sm-4" for="contact">Contact No:</label>
		  <div class="col-sm-4">
			<input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter Contact No." required>
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
		<form class="form-horizontal" method="POST" action="adduserform2sameasadduserform.php" name="AddBulkUser" onsubmit="return validateForm()">
		<div class="form-group">
		<label class="control-label col-sm-4" for="department">Role:</label>
		<div class="col-sm-4">
		<select class="form-control" id="department" name="department">
		<option>Select Role</option>
		
		<option>Department Admin</option>
		<option>Course Coordinator</option>
		<option>Course Sub-coordinator</option>
		<option>Faculty</option>
		<option>Students</option>
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
		<div class="form-group">
		  <div class="col-sm-offset-5 col-sm-10">
				<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary" >
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
	<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	
		<div class="form-group">
	
	<label class="control-label col-sm-2" for="select">Department:</label>
	<div class="col-sm-4">
	<select class="form-control" id="select" name="department">
			<option>Select Department</option>
			<option value="it">Information Technology</option>
			<option value="cse">Computer Science Engineering</option>
			<option value="software">Software Engineering</option>
			</select>
		</div>	
	<span class="form-group col-sm-3">
	
	<input class="form-control" type="search" name="search" placeholder="Search">
	
	</span>
	</div>
		<div class="form-group">
		<label class="control-label col-sm-2" for="select">Role:</label>
		<div class="col-sm-4">
		<select class="form-control" id="select1"  name="role">
		<option>Select Role</option>

		<option>Department Admin</option>
		<option>Course Coordinator</option>
		<option>Course Sub-coordinator</option>
		<option>Faculty</option>
		<option>Students</option>
		</select>
		</div>
		</div>
<br>
<br>

	<div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"/>
    </div>
	<div class="form-group">
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" name="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal">Submit</button>
      </div>
    </div>
 
</div>


         <table cellspacing=2 cellpadding=5  id="dataTable" class="table table-hover table-responsive">
    <thead>
    </thead>
	<tr>
<th></th>	    
        <th>Department</th>
        <th>First name</th>
        <th>Last name</th>
		<th>Role</th>
		<th>Staff ID</th>
		<th>Email ID</th>
		<th>Contact No</th>
		<th>Username</th>
		<th>Password</th>
		<th><input type="button" onclick="deleteRow('dataTable')" value="Delete" name="bulk_delete_submit" class="btn btn-danger" ></th>
      </tr>
<?php
if(isset($_POST['submit'])){
$dept=$_POST["department"];
$role=$_POST["role"];

if($role=='Students'){
$table='overallstudent';
$id='studentid';
}else{
$table='overallfaculty';
$id='staffid';
}
$check="SELECT table_name FROM information_schema.tables WHERE table_schema='public'";
$select="";
$result =mysqli_query($conn,$check);
$query1 = sprintf("SELECT firstname, staffid FROM overallfaculty");
$result1 =mysqli_query($conn,$query1); 
$query=sprintf("SELECT firstname,lastname,role,$id,emailid,contactno,username,password FROM $table where role='$role' ");
$result = mysqli_query($conn,$query);
if($result){

$count=0;
while($row=mysqli_fetch_array($result)){
$count+=1;
$select.='<tr id="row'.$count.'" display="none">';
$select.='<td><input type="checkbox" onclick="selectRow(this)"  name="checkbox[]" id="checkbox[]" value='.$row[0].' ></td>';
$select.='<td id="name_row1">'.$row[3].'</td>
<td id="country_row1">'.$row[0].'</td>
<td id="age_row1">'.$row[1].'</td>
<td id="sage_row1">'.$row[2].'</td>
<td id="sname_row1">'.$row[3].'</td>
<td id="ename_row1">'.$row[4].'</td>
<td id="cname_row1">'.$row[5].'</td>
<td id="uname_row1">'.$row[6].'</td>
<td id="pname_row1">'.$row[7].'</td>
<td>
<input type="button" id="edit_button1" value="Edit"  class="btn btn-warning" onclick="edit_row("1")">
<input type="button" id="save_button1" value="Save"  class="btn btn-success" onclick="save_row("1")">
</td>';


}

echo $select;
echo $role;
}else{
echo 'try again';
}
}
?>
      </tbody>
	  </table>
	 
 </form>
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
