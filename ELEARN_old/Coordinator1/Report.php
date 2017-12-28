<?php
session_start();
require_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8"><title>Report</title>
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
<script src="../dist/js/jquery-1.3.2.min.js" type="text/javascript"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
		      <li class="treeview">
          <a href="#">  
            <i class="fa fa-tasks"></i>
          <span> My Course</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="MyCourse.php"><i class="fa fa-tasks"></i> My Course</a></li>
            <li><a href="courseupload.php"><i class="fa fa-upload"></i> Content Upload</a></li>
       
           </ul>
        </li> 
        <li class="active treeview">
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
	
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard active"></i> Report</a></li>
    
      </ol>
    </section>

    <!-- Main content -->

  

    <!-- /.content -->
    <section class="content">

	<form class="form-horizontal" id="idForm">
		<div class="form-group">
		<label class="control-label col-sm-4" for="select">Department:</label>
		<div class="col-sm-4">
		<select class="form-control" disabled  id="select">

		<option value="<?php echo $_SESSION['department']; ?>"><?php echo $_SESSION['department']?></option>

		</select>
		</div>
		</div>
		
		<div class="form-group">
		<label class="control-label col-sm-4" for="select">Course</label>
		<div class="col-sm-4">
		<select class="form-control" disabled id="course">
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
		<div class="form-group">
		<label class="control-label col-sm-4" for="select">Faculty</label>
		<div class="col-sm-4">
		<select class="form-control" name="search" onchange="historyChanged(this);"  id="faculty">
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
		
	<div class="col-sm-4"></div>

<div class="col-sm-3">
<input name="submit" class="btn btn-info"  type="submit" value="Submit" ></span>
	</div>	
	
	</div>
 </div> 
</form>
	
				
	  
		

		

	 <div id="txtHint">
	 <table class="table table-hover table-responsive">
<th>Course ID</th>
<th>Course Name</th>
<th>U1</th>
<th>U2</th>
<th>U3</th>
<th>U4</th>
<th>U5</th>
</div>

	 
	

				
	  
		


	 </section>
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
    <!-- /.content -->
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

<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

</body>
</html>
