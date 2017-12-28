<?php
session_start();
require_once('dbconfig.php');
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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
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
 
        <li class="active treeview">
          <a href="MyCourse.php">
            <i class="fa fa-tasks"></i>  
            <span> My Course</span></a>
                
        
    
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
		 </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
	&nbsp;&nbsp;<div class="page-header">
      <h1>
        Course Curriculum
      
      </h1>
	  </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> My Course</a></li>
		
		<li class="active">Course Curriculum</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      	<br>
	<form class="form-horizontal" method="POST" action="coursecurriculum.php">
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="courseid">Course ID:</label>
	  
      <div class="col-sm-4" name="courseid">
        <?php
		
/*$file_handle = fopen("../coursecurriculum.txt","rw");

while (!feof($file_handle) ) {
    $line_of_text = fgets($file_handle);
    $parts = explode('~', $line_of_text);
	echo "<p>$parts[0]</p>"*/
	$courseid = $_SESSION['courseid'];
    echo $courseid;
	?> 
	</div>
    </div>
	
    <div class="form-group">
      <label class="control-label col-sm-2" for="courserationale">Course Rationale:</label>
      <div class="col-sm-4" name="courserationale">
  <?php 
    //echo "<p>$parts[1]</p>";
	$rationale=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT rationale FROM course WHERE courseid='$courseid' ")));
    echo $rationale[0]; 
	
?>
  
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="courseoutcome">Course Outcome:</label>
      <div class="col-sm-4" name="courseoutcome">
<?php
  /*      echo "<p>$parts[2]</p>";
	}
fclose($file_handle);*/

$outcome=mysqli_fetch_row(mysqli_query($conn,sprintf("SELECT outcome FROM course WHERE courseid='$courseid' ")));
    echo $outcome[0]; 
?>
   
      </div>
    </div>	
<br>
	<div class="form-group">
	  
	   <div class="col-sm-offset-2 col-sm-4">
			<input type="button" value="Download" class="btn btn-primary" id="file" name="syllabusdownload"/>
	   </div>
	</div>
	
	
	
  </form>
    </section>
    <!-- /.content -->
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

<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

</body>
</html>
