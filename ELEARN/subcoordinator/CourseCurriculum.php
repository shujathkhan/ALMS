<?php


$courseid = @$_POST['courseid'];
$courserationale = @$_POST['courserationale'];
$courseoutcome = @$_POST['courseoutcome'];


// Get the name of text file where data will be store
$filename = "../coursecurriculum.txt";

// Marge all the variables with text in a single variable.
$f_data= ''.$courseid.'~'.$courserationale.'~'.$courseoutcome.'';
$file = fopen($filename, "w");
fwrite($file,$f_data);
fclose($file);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-LEARN | Course Curriculum</title>
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
  <link rel="styleshee<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
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
      <!-- Navbar Right Menu -->
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
  </header><!-- Left side column. contains the logo and sidebar -->
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
        

    
        <li class="active treeview">
          <a href="#">  
            <i class="fa fa-tasks"></i>
          <span> My Course</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="MyCourse.php"><i class="fa fa-tasks"></i> My Course</a></li>
            <li class="active treeview"><a href="courseupload.php"><i class="fa fa-upload"></i> Content Upload</a></li>
       
           </ul>
        </li> 
		<li class="treeview">
          <a href="Report.php">
            <i class="fa fa-laptop"></i>
            <span> Report</span>
            
          </a>
         </li>
        <li class="treeview">
          <a href="#">
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
	&nbsp;&nbsp;<div class="page-header">
      <h1>
        Course Curriculum
      
      </h1>
	  </div>
      <ol class="breadcrumb">
        <li><a href="MyCourse.htl"><i class="fa fa-dashboard"></i> My Course</a></li>
		<li><a href="Courseupload.php"><i class="fa fa-dashboard"></i> Content Upload</a></li>
		<li class="active">Course Curriculum</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      	<br>
	<form method="POST" class="form-horizontal">
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="cID">Course ID:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="courseid" id="cID" placeholder="Enter Course ID" required>
      </div>
    </div>
	
    <div class="form-group">
      <label class="control-label col-sm-2" for="Crationale">Course Rationale:</label>
      <div class="col-sm-4">
        <textarea type="text" name="courserationale" class="form-control" placeholder="Enter Course Rationale" rows="6" cols="8" style="margin: 0px -277px 0px 0px; width: 500px; height: 135px;" id="Crationale"  required></textarea>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="Coutcome">Course Outcome:</label>
      <div class="col-sm-4">
        <textarea type="text" class="form-control" rows="6" cols="8" style="margin: 0px -277px 0px 0px; width: 500px; height: 135px;" id="Coutcome" name="courseoutcome" placeholder="Enter Course Outcome" required></textarea>
      </div>
    </div>	

	<div class="form-group">
	  <label class="control-label col-sm-2" for="sup">Syllabus Upload:</label>
	   <div class="col-sm-4">
			<input type="file" class="btn btn-default" id="sup" required>
	   </div>
	</div>
	
	<div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"/>
    </div
	<div class="form-group">
      <div class="col-sm-offset-4 col-sm-10">
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
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

<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

</body>
</html>
