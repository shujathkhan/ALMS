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
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
<script type="text/javascript" src="table_script1.js"></script>
<script type="text/javascript" src="../dist/js/ex.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
        <li class="treeview">
          <a href="AddUser.php">
            <i class="fa fa-user-plus"></i>
            <span> User Creation</span>
		
            
          </a>
       
        </li>
        <li class="treeview">
          <a href="AddCourse.php">
            <i class="fa fa-edit"></i> <span> Course Creation</span>
	
            
          </a>
		
        </li>
        <li class="treeview">
          <a href="Courses.php">
            <i class="fa fa-tasks"></i>
            <span> My Courses</span>
          </a>
      
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
        <li><a href="#">
		<i class="fa fa-dashboard"></i> <?php echo $_SESSION['username']?></a></li>
      </ol>
    </section>
	<section class="content">

		<form class="form-horizontal"  method="POST" action="deptadminadduser.php" onsubmit="return validateForm()">
		
			<div class="form-group">
		<label class="control-label col-sm-4" for="select">Department:</label>
		<div class="col-sm-4">
		<?php 
		if($_SESSION['department'] == 'it'){echo "Information Technology";} ?>
		
		</div>
		</div>

		<div class="form-group">
		  <label class="control-label col-sm-4" for="fname">Role:</label>
		  <div class="col-sm-4">
			<?php echo $_SESSION['role']?>
			</div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="fname">First Name:</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" value="<?php echo $_SESSION['firstname']?>" id="fname" name="fname" placeholder="Enter First Name" required>
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="lname">Last Name:</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" value="<?php echo $_SESSION['lastname']?>" id="lname" name="lname" placeholder="Enter Last Name" required>
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="uname">Username:</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" value="<?php echo $_SESSION['username']?>" id="uname" name="uname" placeholder="Enter Username" required>
		  </div>
		</div>
		
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="sID">Staff ID:</label>
		  <div class="col-sm-4">
			<input type="text" class="form-control" value="<?php echo $_SESSION['staffid']?>" id="sID" name="sID" placeholder="Enter Staff ID" required>
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="sID">DOB:</label>
		  <div class="col-sm-4">
			<input type="date" class="form-control" id="dob" name="dob" placeholder="Enter DOB" required>
		  </div>
		</div>
		
		<div class="form-group">
		  <label class="control-label col-sm-4" for="email">Email ID:</label>
		  <div class="col-sm-4">
			<input type="email" class="form-control" value="<?php echo $_SESSION['emailid']?>" id="email" name="email" placeholder="Enter Email ID" required>
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
	
	
	</div>
	 
</div>
  
  <!-- /.content-wrapper -->
 
<!--ADD THAT CONTROL SIDEBAR STUFF OVER HERE-->

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
</section>

</body>
</html>
