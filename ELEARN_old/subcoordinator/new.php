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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="dependencies/RGraph.common.core.js" type="text/javascript" ></script>
	<script src="dependencies/RGraph.common.tooltips.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.common.dynamic.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.drawing.circle.js" type="text/javascript" ></script>
    <script src="dependencies/jquery-3.1.0.min.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.pie.js" type="text/javascript"></script>
	
    <script src="script.js" type="text/javascript"></script>
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="../dist/js/jquery-1.3.2.min.js" type="text/javascript"></script>
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
              <!-- Menu Footer-->
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
          <a href="Adduser.php">
            <i class="fa fa-user-plus"></i>
            <span> User Creation</span>
		
            
          </a>
       
        </li>
  
  
        <li class="active treeview">
          <a href="MyCourse.php">  
            <i class="fa fa-tasks"></i>
          <span> My Course</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active treeview"><a href="MyCourse.php"><i class="fa fa-tasks"></i> My Course</a></li>
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
        <li><a href="Report.php"><i class="fa fa-dashboard active"></i> Report</a></li>
    
      </ol>
    </section>

    <!-- Main content -->

  

    <!-- /.content -->
    <section class="content">

	
      	<form class="form-horizontal">
	<br>
	<br>
	 <table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Course name</th>
        <th>Course Type</th>
        <th>Enroll Students</th>
        <th>Corona</th>
		
      </tr>
    </thead>
    <tbody>
	<?php
	$check="SELECT table_name FROM information_schema.tables WHERE table_schema='public'";
$select="";
$result =mysqli_query($conn,$check);
$query1 = sprintf("SELECT firstname, staffid FROM overallfaculty");
$result1 =mysqli_query($conn,$query1); 
$query = sprintf("SELECT courseid,coursename,coursetype,department FROM course WHERE courseid NOT IN ($check)");
$result =mysqli_query($conn,$query); 
if($result){
//$select.='<table  class="table table-hover">';
$count=0;
while($row=mysqli_fetch_array($result)){
$count+=1;
$select.='<tr id="row'.$count.'" display="none">';
$select.='
<td id="country_row1">'.$row[0].'</td>
<td id="age_row1">'.$row[1].'</td>
<td id="sage_row1">'.$row[2].'</td>';

$select.='<td><input type="button" class="btn btn-warning" data-toggle="modal" data-target="#efmodal'.$count.'" 	  value="Enroll Faculty">
</td>';
$select.='<td><input type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2"  value="View Corona">
</td>';
$select.='</tr>';
$select.='<div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="efmodal'.$count.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enroll Staff</h4><br><br>';
$query1 = sprintf("SELECT firstname, staffid FROM overallfaculty");
$result1 =mysqli_query($conn,$query1); 
$select.='<form method="POST" action="democoordinatorenrollfaculty.php">
<select name="staffid">
<option>101010</option>
<option>101010</option>
<option>10101</option>
<option>1010</option>
</select>';




$select.='<br><input type="submit" name="enroll"/>
</form>
      </div>
      
    </div>
  </div>
  
</div>';
}
echo $select;
}   ?>
 </tbody>
  </table>


	 	<div id="myModal2" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg" >

    <!-- Modal content-->
			
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		
			  
		
					<canvas id="rgraph_canvas" height="800" width="800"></canvas>
			 </div>

		</div>
	</form>	
	
	 
	 <div id="coursecircle" class="col-sm-2">
		<div class="form-group">
		 
		  		<label class="control-label" for="subject">Subject_ID: </label>
        <input type="text" id="subject" title="subject" value="1"><br>
		</div>

   
		<label class="control-label" for="unit_1">Unit 1 : </label>
            <input type="text" class="form-control" name="unit_1" id="unit_1" title="Unit_1" value="5" /> <br>
			<label class="control-label" for="unit_2">Unit 2 : </label>        
			<input type="text" class="form-control" name="unit_2" id="unit_2" title="Unit_2" value="5"/> <br>
            <label class="control-label" for="unit_3">Unit 3 : </label>
		    <input type="text" class="form-control" name="unit_3" id="unit_3" title="Unit_3" value="5"/> <br>
            <label class="control-label" for="unit_4">Unit 4 : </label>
			<input type="text" class="form-control" name="unit_4" id="unit_4" title="Unit_4" value="5"/> <br>
            <label class="control-label" for="unit_5">Unit 5 : </label>
			<input type="text" class="form-control" name="unit_5" id="unit_5" title="Unit_5" value="5"/> <br>
        </form>
<button type="submit" id="SubmitButton" >Generate</button>
	</div>	
		<script>
$("#coursecircle").addClass('hidden');

</script>

   
	

	<script>
	function Enrollfaculty(){
	document.getElementById("enrollcourse").innerHTML = '<div><label class="control-label col-sm-offset-1 col-sm-4" for="selected"><input type="text" id="facultynum"></label><span class="col-sm-offset-1 col-sm-4"><input type="button" id="selected" class="form-control col-sm-4 btn btn-primary " value="Select Faculty" onclick="generate()"></span></div>'
	}
	</script>
	

    <script>
    function generate() {

        var a = parseInt(document.getElementById("facultynum").value);
        var selector = document.getElementById("selector");

        for (i = 0; i < a; i++) {
		
			toAppend = "<br><center><div class='row' ><div class='col-sm-5'>. <select class='form-control col-sm-offset-9	 id='selectfaculty'><option>Select Faculty</option></select></div></center><br>"; 
		selector.innerHTML=selector.innerHTML+toAppend; 

            
        }
				return;
    }
    </script>
	</section>
    <!-- /.content -->
    </div>
	
	</div>
	  
 
  <!-- /.content-wrapper -->
 
<!--ADD THAT CONTROL SIDEBAR STUFF OVER HERE-->
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
