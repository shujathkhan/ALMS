<?php
session_start();
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
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<script type="text/javascript" src="../dist/js/table_script1.js"></script>
<script type="text/javascript" src="../dist/js/ex.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
        <li class="treeview">
          <a href="Adduser.php">
            <i class="fa fa-user-plus"></i>
            <span> User Creation</span>
		
            
          </a>
       
        </li>
        <li class="active treeview">
          <a href="AddCourse.php">
            <i class="fa fa-edit"></i> <span> Course Creation</span>
	
            
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Course Creation</a></li>
        <li class="active">Add Course</li>
      </ol>
    </section>

    <!-- Main content -->
	<ul class="nav nav-tabs ">
    <li class="active"><a data-toggle="tab" href="#home">Add Course</a></li>
    <li><a data-toggle="tab" href="#menu1">Add Bulk Course</a></li>
    <li><a data-toggle="tab" href="#menu2">Manage Course</a></li>
    
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <section class="content">
		<script text="javascript">
		function validateForm() {
			
			var y = document.forms["AddCourse"]["optctype"].value;
			if (y == "") {
				alert("Please select your course type");
				return false;
			}
			
		}
		</script>
		<form class="form-horizontal" method="POST" action="addcourseform.php" name="AddCourse" onsubmit="return validateForm()">
		<div class="form-group">
		  <label class="control-label col-sm-4" for="coursename">Course Name:</label>
		  <div class="col-sm-3">
			<input type="text" class="form-control" id="coursename" name="coursename"  placeholder="Enter Course Name" required>
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="courseid">Course ID:</label>
		  <div class="col-sm-3">
			<input type="text" class="form-control" id="courseid" name="courseid" placeholder="Enter Course ID" required>
		  </div>
		</div>
		
		<div class="form-group">
		<label class="control-label col-sm-4" for="department">Department:</label>
		<div class="col-sm-3">
		<select class="form-control" id="department"  name="department">
		<option>Select Department</option>
		<option>Information Technology</option>
		<option>Computer Science Engineering</option>
		<option>Software Engineering</option>
		</select>
		</div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="optradio">Course Type:</label>
		  <div class="col-sm-6">
			<label class="radio-inline col-sm-4"><input type="radio" id="optradio" value="Department course" name="optradio">Department course</label>
			<label class="radio-inline col-sm-4"><input type="radio" id="optradio" value="offering course" name="optradio">Offering course</label>
		  </div>
		</div>
		 

		<div class="form-group"> 
		  <div class="col-sm-offset-2 col-sm-10"/>
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
    <div id="menu1" class="tab-pane fade">
       <!-- Main content -->
    <section class="content">
				<script text="javascript">
		function validateForm() {
			var x = document.forms["AddBulkCourse"]["select"].value;
			if (x == "Select Department") {
				alert("Please Select your Department ");
				return false;
			}					
		}
		</script>
		
		<form class="form-horizontal" action="addbulkcourse.php" method="POST" name="AddBulkCourse" onsubmit="return validateForm()">

		<div class="form-group">
		<label class="control-label col-sm-4" for="department">Department:</label>
		<div class="col-sm-3">
		<select class="form-control" id="department" name="department" required>
		<option>Select Department</option>
		<option>Information Technology</option>
		<option>Computer Science Engineering</option>
		<option>Software Engineering</option>
		</select>
		</div>
		</div>


		<div class="form-group">
		  <label class="control-label col-sm-4" for="groupname">Group Name:</label>
		  <div class="col-sm-3">
				<input type="text" class="form-control" id="groupname" name="groupname" placeholder="Enter Group Name" required>
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="file">Upload:</label>
		   <div class="col-sm-3">
				<input type="file" class="btn btn-default" id="file" name="file" required>
		   </div>
		</div>
		
		<div class="form-group"> 
		  <div class="col-sm-offset-2 col-sm-10"/>
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
	<section>
	<br>
	<form class="form-horizontal"  action="enrollcourse.php" action="managecourse.php"  method="POST">
	  
   
	
		<div class="form-group">
	
	<label class="control-label col-sm-2" for="select">Department:</label>
	<div class="col-sm-4">
	<select class="form-control" id="select" name="select">
    <option>Select Department</option>
    <option>Information Technology</option>
    <option>Computer Science Engineering</option>
    <option>Software Engineering</option>
	</select>
	</div>	
		<span class="for-group col-sm-3">
	
	<input type="search" name="search" class="form-control" placeholder="Search">
	
	</span>
	</div>

<br>
<br>
	
	<div class="form-group">
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal">Submit</button>
      </div>
    </div>
  </form>


      <table cellspacing=2 cellpadding=5  id="dataTable" class="table table-hover">
   
	<tr>
<th></th>	    
        <th>Department</th>
		<th>Course ID</th>
        <th>Course name</th>
        <th>Course Type</th>
		<th><input type="submit" onclick="deleteRow('dataTable')"  value="Delete" name="bulk_delete_submit" class="btn btn-danger" ></th>
		
      </tr>
		 <?php
	//echo faculty and course details

$check="SELECT table_name FROM information_schema.tables WHERE table_schema='public'";
$select="";
$result =mysqli_query($conn,$check);
$query = sprintf("SELECT courseid,coursename,coursetype,department FROM course WHERE courseid NOT IN ($check)");
$result =mysqli_query($conn,$query); 
$query1 = sprintf("SELECT firstname, staffid FROM overallfaculty");
$result1 =mysqli_query($conn,$query1); 

if($result){
//$select.='<table  class="table table-hover">';
$count=0;
$count1=0;
while($row=mysqli_fetch_array($result)){
$count+=1;
$count1+=1;
$select.='<tr id="row'.$count.'" display="none">';
//$select.='<td><input type="checkbox" onclick="selectRow(this)"  name="mul" value="head"></td>';
$select.='<td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" onclick="selectRow(this)"  value='.$row[0].' "/> ';

$select.='<td id="name_row1">'.$row[3].'</td>
<td id="country_row1">'.$row[0].'</td>
<td id="age_row1">'.$row[1].'</td>
<td id="sage_row1">'.$row[2].'</td>';
$select.='<td><input type="button" class="btn btn-warning" data-toggle="modal" data-target="#efmodal'.$count.'"  value="Enroll Course">
</td>';
$select.='</tr>';
$select.='
  
  <!-- Modal -->
	<div class="modal fade" id="efmodal'.$count.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enroll Faculty</h4><br><br>
        
<div class="form-group">
<label class="control-label col-sm-4" for="department">Department:</label>
<div class="col-sm-5">
<input type="text" class="form-control" id="department" name="department" value="'.$row[3].'" >
</div></div>
<div class="form-group">
<label class="control-label col-sm-4" for="department">Course id:</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="courseid" value="'.$row[0].'" >
</div></div>
<div class="form-group">
<label class="control-label col-sm-4" for="department">Course name:</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="coursename" value="'.$row[1].'" >
</div></div>
<div class="form-group">
<label class="control-label col-sm-4" for="department">Course Type:</label>
<div class="col-sm-5">
<input type="text" class="form-control" name="coursetype" value="'.$row[2].'" >
</div></div><br>';

$select.='<div class="form-group">
<label class="control-label col-sm-4" for="department">Select Coordinator:</label>
<div class="col-sm-5"><select  class="form-control" id="choice"  name="staffid">';

while($row=mysqli_fetch_array($result1)){
$select.='<option value="'.$row[0].'-'.$row[1].'" >'.$row[0].'-'.$row[1].'</option>';
}

$select.='</select></div></div><br>';
$select.='<br><div class="form-group"><label class="control-label col-sm-4" for="department">                       </label><div class="col-sm-5"><a href="#" data-dismiss="efmodal"><input type="submit" name="enroll" class="btn btn-default" value="Enroll"/></a></div></div>
        </div>
     
      </div>
      
    
  </div>
  
</div>';
}
//$select.='</table>';

echo $select;
}
//delete part 

?>
	<tbody>

      </tbody>
	  </table>
	 
    
</form>
</section>
	</div>
	</div>
	  
  </div>
  <!-- /.content-wrapper -->
 
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
