

<!DOCTYPE html>
<html>
<head>



  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-LEARN | Dashboard</title>
    <script src="dependencies/RGraph.common.core.js" type="text/javascript" ></script>
	<script src="dependencies/RGraph.common.tooltips.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.common.dynamic.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.drawing.circle.js" type="text/javascript" ></script>
    <script src="dependencies/jquery-3.1.0.min.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.pie.js" type="text/javascript"></script>
	
    <script src="script.js" type="text/javascript"></script>
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
   <style>
        body {
            font-family: sans-serif,serif,monospace;
         
        }

        .container {
            display: flex;
            flex-direction: column;
            align-content: center;
            align-items: center;
        }

        #SubmitButton {
            float: right;
        }

        canvas {
            margin-top: 50px;
        }


    </style>
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
         
              </li>
				<!-- Menu Footer-->
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
          <a href="AddUser.php">
            <i class="fa fa-user-plus"></i>
            <span> User Creation</span>
           
            
          </a>
      
        </li>
		   <li class="treeview">
          <a href="AddCourse.php">
            <i class="fa fa-user-plus"></i>
            <span> Course Creation</span>
           
            
          </a>
      
        </li>
  
       
        <li class="active treeview">
          <a href="#">  
            <i class="fa fa-tasks"></i>
          <span> My Courses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Courses.php"><i class="fa fa-tasks"></i> Courses</a></li>
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
	&nbsp;&nbsp;<div class="page-header">
      <h1>
        Content Upload
      
      </h1>
	  </div>
      <ol class="breadcrumb">
        <li><a href="MyCourse.php"><i class="fa fa-dashboard"></i> My Course</a></li>
         <li class="active">Content Upload</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      	<br>
	<form class="form-horizontal">
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="select">Department:</label>
	<div class="col-sm-4">
	<select class="form-control" id="select">
    <option>Select Department</option>
    <option>Information Technology</option>
    <option>Computer Science Engineering</option>
    <option>Software Engineering</option>
	</select>
	</div>
	</div>
	
	
    <div class="form-group">
      <label class="control-label col-sm-2" for="cname">Course Name:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="cname" name="cname" placeholder="Enter Course Name" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="cID">Course ID:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="cID" name="cID" placeholder="Enter Course ID" required>
      </div>
    </div>
	
	<div class="form-group">
	<label class="control-label col-sm-2" for="select">Total No. of Units:</label>
	<div class="col-sm-4">
	<select class="form-control" id="select" disabled>
    <option>5</option>
    <option>4</option>
    <option>3</option>
    <option>2</option>
	<option>1</option>
	</select>
	</div>
	</div>
  
			<div class="form-group">
			<label class="control-label col-sm-2" for="subject">Subject ID : </label>
			<div class="col-sm-4">
           <input type="text" id="subject"  name="subject"  title="subject" value="1"><br>

			</div>
			</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="unit_1">Unit 1 : </label>
			<div class="col-sm-4">
            <input type="text" class="form-control col-sm-4" name="unit_1" id="unit_1" title="Unit_1" value="5" > 
			</div>
			</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="unit_2">Unit 2 : </label>        
			<div class="col-sm-4">
			<input type="text" class="form-control col-sm-4" name="unit_2" id="unit_2" title="Unit_2" value="5"> 
            </div>
            </div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="unit_3">Unit 3 : </label>
		    <div class="col-sm-4">
			<input type="text" class="form-control col-sm-4" name="unit_3" id="unit_3" title="Unit_3" value="5"> 
            </div>
            </div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="unit_4">Unit 4 : </label>
			<div class="col-sm-4">
			<input type="text" class="form-control col-sm-4" name="unit_4" id="unit_4" title="Unit_4" value="5">
            </div>
            </div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="unit_5">Unit 5 : </label>
			<div class="col-sm-4">
			<input type="text" class="form-control col-sm-4" name="unit_5" id="unit_5" title="Unit_5" value="5"> 
			</div>
			</div>
			<div class="col-sm-offset-4">
			<div class="btn-group">
		<button type="submit" id="SubmitButton" name="submit" onclick=click();" class="btn btn-info" >Preview</button>	
		<button type="submit" id="submit" name="submit" class="btn btn-info" >Submit</button>	
		</div>
		</div>
		<script>
		function click(){
		alert("Once changes made, cannot be changed")}
		</script>
		</form>
		<!-- Trigger the modal with a button -->
      

       <canvas id="rgraph_canvas" height="800" width="800"></canvas>
   
	
     
    
   
   
 

      </section>

      <!-- /.content -->
	
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

<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

</body>
</html>
