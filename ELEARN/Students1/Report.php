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
  <!-- bootstrap wysihtml5 - text editor -->

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
          <a href="MyCourse.php">
            <i class="fa fa-tasks"></i> <span> My Course</span>
            </a>
        </li>
		
      <li class="active treeview">
          <a href="Report.php">
            <i class="fa fa-clipboard"></i> <span> Report</span>
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Report</a></li>
  
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th>Course ID</th>
        <th>Course name</th>
        <th>Unit-1</th>
        <th>Unit-2</th>
        <th>Unit-3</th>
        <th>Unit-4</th>
        <th>Unit-5</th>
        <th>Quiz</th>
      </tr>
    </thead>
    <tbody>
<?php
$dept=$_SESSION["department"];
$conn=mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,$dept) or die(mysqli_connect_error());
$id=$_SESSION["id"];
$studenttable="student_".$id;
$courselist=sprintf("select courseid from $studenttable");
//echo $courselist;
$result123=mysqli_query($conn,$courselist);
if($result123){
while($row=mysqli_fetch_row($result123)){
$table="student_".$row[0]."_".$id;
//echo $table;
$course=$row[0];
$value=[];
$result1=[];
$result2=[];
for($i=1;$i<=5;$i++){
  $query="SELECT COUNT(*) FROM $table WHERE sid LIKE '%U$i%' AND status='1' ";
  //echo $query;
  $res=mysqli_query($conn,$query);
  if($res){
  $result1=mysqli_fetch_row($res);
  //print_r($result1);
  }
  else
  {$result1[0]=0;}  
 $querytot="SELECT u$i FROM course WHERE courseid = '$course' ";
  $res2=mysqli_query($conn,$querytot);
  if($res2)
  {$result2=mysqli_fetch_row($res2);
  // print_r($result2);
  }
  else
  {$result2[0]=0;}	  
  if($result2[0]!=0)
  {$value[$i]=($result1[0]/$result2[0])*100;}
  else
  {$value[$i]=0;} 
}
$query=sprintf("UPDATE $studenttable SET u1='$value[1]',u2='$value[2]',u3='$value[3]',u4='$value[4]',u5='$value[5]' WHERE courseid='$course'");
$result=mysqli_query($conn,$query);
}
}
//displaying now
$courselist=sprintf("select courseid,coursename,u1,u2,u3,u4,u5 from $studenttable");
$result=mysqli_query($conn,$courselist);
if($result)
{
while($row=mysqli_fetch_row($result)){
echo '<tr>
		<td>'.$row[0].'</td>
		<td>'.$row[1].'</td>
		<td>'.$row[2].'%</td>
		<td>'.$row[3].'%</td>
		<td>'.$row[4].'%</td>
		<td>'.$row[5].'%</td>
		<td>'.$row[6].'%</td>
		<td>'.$row[6].'%</td>
		</tr>';	
}
}
?>
    </tbody>
  </table>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

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
