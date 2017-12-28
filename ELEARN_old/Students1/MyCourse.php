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
 <script src="dependencies/RGraph.common.core.js" type="text/javascript" ></script>
	<script src="dependencies/RGraph.common.tooltips.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.common.dynamic.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.drawing.circle.js" type="text/javascript" ></script>
    <script src="dependencies/jquery-3.1.0.min.js" type="text/javascript" ></script>
    <script src="dependencies/RGraph.pie.js" type="text/javascript"></script>
	
    <script src="script.js" type="text/javascript"></script>
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

    <style>
		// Classes
	.show {
	  display: block !important;
	}
	.hidden {
	  display: none !important;
	}
	.invisible {
	  visibility: hidden;
	}

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
            <span> My Course</span>
          
          </a>
        
        </li>
        <li class="treeview">
          <a href="Report.php">
            <i class="fa fa-clipboard"></i>
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
        <li><a href="Report.php"><i class="fa fa-dashboard active"></i> Report</a></li>
    
      </ol>
    </section>

    <!-- Main content -->

  

    <!-- /.content -->
    <section class="content">
   	<br>
	<br>
	<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
<?php
$selct='';
$department=$_SESSION['department'];
require_once 'dbconfig.php';
$id = $_SESSION['id'];
$tablelist=array();
$row='';
//tablename of coordinator
$sql="SELECT CONCAT( GROUP_CONCAT(table_name) , ',' ) FROM information_schema.tables WHERE table_schema = '$department' AND table_name LIKE 'student_%' AND table_name LIKE '%$id' AND table_name NOT IN ('student_$id')";
$result= mysqli_query($conn,$sql);
$row = mysqli_fetch_row($result);
$tablename=$row[0];
$tablename=substr($tablename,0,-1);
$tablelist=explode(",",$tablename);
$courselist=array();
//print_r($tablelist);
for($i=0;$i<sizeof($tablelist);$i++)
{
$a=str_replace("student_",NULL,$tablelist[$i]);
$b=str_replace("_$id",NULL,$a);
$courselist[$i]=$b;
}
//echo "courselist=";
//print_r($courselist);

$asd=sprintf("SELECT courseid,coursename,coursetype from course WHERE courseid in ('".implode("','",$courselist)."') ")	;
$res=mysqli_query($conn,$asd);
//-----
if($res)
{
$select='<form class="form-horizontal">
<div class="form-group">
		<label class="control-label col-sm-2" for="select">Course:</label>
		<div class="col-sm-4">
<select class="form-control" name="cid" id="cid">';
$count=0;
while($row=mysqli_fetch_row($res)){
$count+=1;
//echo $row[0];
$select.='<option value='.$row[0].'>'.$row[1].'-'.$row[0].'</option>';
	}
	$select.='</select><br>';
	$select.='<center><div class="col-sm-4"><input type="submit" name="submit" class="form-control col-sm-4 btn btn-primary submit" value="Submit"></div></center>
	</div></div>
	</form><br><br>';	
}

echo $select;
?>
	
<?php 

if($_POST)
{
$id = $_POST['cid'];  
$_SESSION['courseid'] = $id;
$select='<table  class="table table-hover">';
$select=' </br></br><table  id="myTable" class="table table-hover table-responsive">
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Course name</th>
        <th>Course Type</th>
		<th>Department</th>
      </tr>
    </thead>
  
	<tbody> 
';

$query = sprintf("SELECT courseid,coursename,coursetype,department FROM course WHERE courseid ='$id'");
$result =mysqli_query($conn,$query); 
if($result){
$count=0;
while($row=mysqli_fetch_array($result)){
$count+=1;
$select.='<tr id="row'.$count.'" display="none">';
$select.='
<td id="country_row1"><input type="hidden" name="courseid" value="'.$row[0].'">'.$row[0].'</td>
<td id="age_row1">'.$row[1].'</td>
<td id="age_row1">'.$row[2].'</td>
<td id="sage_row1">'.$row[3].'</td>';

$select.='
		</div>
     
      </div>
      
    </div>
  </div>
  
</div>
</tbody>
  </table>	';
}
}


echo $select;
$query=sprintf("select u1,u2,u3,u4,u5,courserefid from course where courseid='$id'");
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$select1='<canvas id="rgraph_canvas" height="800" width="800"></canvas>
<div id="coursecircle" class="col-sm-2" style="display:none;">
		<div class="form-group">
		 
		  		<label class="control-label" for="subject">Subject_ID: </label>
        <input type="text" id="subject" title="subject" value="'.$row[5].'"><br>
		</div>

		<label class="control-label" for="unit_1">Unit 1 : </label>
            <input type="text" class="form-control" name="unit_1" id="unit_1" title="Unit_1" value="'.$row[0].'" /> <br>
			<label class="control-label" for="unit_2">Unit 2 : </label>        
			<input type="text" class="form-control" name="unit_2" id="unit_2" title="Unit_2" value="'.$row[1].'"/> <br>
            <label class="control-label" for="unit_3">Unit 3 : </label>
		    <input type="text" class="form-control" name="unit_3" id="unit_3" title="Unit_3" value="'.$row[2].'"/> <br>
            <label class="control-label" for="unit_4">Unit 4 : </label>
			<input type="text" class="form-control" name="unit_4" id="unit_4" title="Unit_4" value="'.$row[3].'"/> <br>
            <label class="control-label" for="unit_5">Unit 5 : </label>
			<input type="text" class="form-control" name="unit_5" id="unit_5" title="Unit_5" value="'.$row[4].'"/> <br>
        
<button type="submit" id="SubmitButton" >Generate</button>
	</div>	
		';
echo $select1;
}
?>	
</div>

		<script>
$("#coursecircle").addClass('hidden');

</script>

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


<script src="../dist/js/app.min.js"></script>
</body>
</html>
